<?php

declare(strict_types=1);

namespace Tomsgu\PdfMergerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Alias;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * @author Tomas Jakl <tomasjakll@gmail.com>
 */
class TomsguPdfMergerExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();
        $loader = new Loader\XmlFileLoader($container,
            new FileLocator(__DIR__.'/../Resources/config'));
        $config = $processor->processConfiguration($configuration, $configs);

        $loader->load('pdf_merger.xml');
        $container->setAlias('Tomsgu\PdfMerger\PdfMerger', new Alias('tomsgu_pdf_merger.pdf_merger', false));
    }
}