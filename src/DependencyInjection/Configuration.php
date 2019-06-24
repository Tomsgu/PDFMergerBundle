<?php
declare(strict_types=1);

namespace Tomsgu\PdfMergerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Tomas
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('tomsgu_pdf_merger');

        // BC for symfony < 4.3
        if (method_exists($treeBuilder, 'getRootNode') === false) {
            $treeBuilder->root('tomsgu_pdf_merger');
        }

        return $treeBuilder;
    }
}
