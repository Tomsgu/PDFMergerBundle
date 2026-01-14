<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use setasign\Fpdi\Fpdi;
use Tomsgu\PdfMerger\PdfMerger;

return static function (ContainerConfigurator $container) {
    $services = $container->services();

    $fpdiServiceId = 'tomsgu_pdf_merger.fpdi';
    // BC for symfony < 5.0
    $fpdiService =  function_exists(__NAMESPACE__ . '\service')
        ? service($fpdiServiceId)
        : ref($fpdiServiceId);

    $services->set('tomsgu_pdf_merger.pdf_merger', PdfMerger::class)
        ->args([$fpdiService])
        ->private()
    ;

    $services->set($fpdiServiceId, Fpdi::class)
        ->private()
    ;
};
