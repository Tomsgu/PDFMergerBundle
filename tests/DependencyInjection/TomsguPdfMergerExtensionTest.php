<?php

declare(strict_types=1);

namespace Tomsgu\PdfMergerBundle\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Tomsgu\PdfMergerBundle\DependencyInjection\TomsguPdfMergerExtension;

/**
 * @author Tomas Jakl <tomasjakll@gmail.com>
 */
class TomsguPdfMergerExtensionTest extends TestCase
{
    public function testHasServicesConfigured()
    {
        $configuration = new ContainerBuilder();
        $loader = new TomsguPdfMergerExtension();
        $loader->load([], $configuration);
        $this->assertTrue($configuration instanceof ContainerBuilder);

        $this->assertTrue($configuration->hasDefinition('tomsgu_pdf_merger.pdf_merger'));
        $this->assertTrue($configuration->hasDefinition('tomsgu_pdf_merger.fpdi'));
        $this->assertTrue($configuration->hasAlias('Tomsgu\PdfMerger\PdfMerger'));
    }
}