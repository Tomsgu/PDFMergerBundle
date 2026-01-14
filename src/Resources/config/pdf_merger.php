<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use setasign\Fpdi\Fpdi;
use Tomsgu\PdfMerger\PdfMerger;

return static function (ContainerConfigurator $container) {
    $services = $container->services();

    $services->set('tomsgu_pdf_merger.pdf_merger', PdfMerger::class)
        ->args([service('tomsgu_pdf_merger.fpdi')])
        ->private()
    ;

    $services->set('tomsgu_pdf_merger.fpdi', Fpdi::class)
        ->private()
    ;
};
