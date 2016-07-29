<?php

namespace Agna\Symfony\Component\Config\Definition\Builder;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Builder\TreeBuilder as SymfonyTreeBuilder;
use Agna\Symfony\Component\Config\Definition\Builder\Converter\TreeBuilderConverter;

class TreeBuilderTest extends TestCase
{
    public function testConvert()
    {
        $treeBuilder = new SymfonyTreeBuilder();
        $treeBuilder->root('test')
            ->children()
            ->integerNode('integer')->end()
            ->scalarNode('scalar')->end();

        $converter = new TreeBuilderConverter();
        $converted = $converter->convert($treeBuilder);

        $this->assertInstanceOf('Agna\Symfony\Component\Config\Definition\Builder\TreeBuilder', $converted);

        $this->assertEquals('integer', $converted->getRootDefinition()->getChildDefinition('integer')->getName());
        $this->assertEquals('scalar', $converted->getRootDefinition()->getChildDefinition('scalar')->getName());
    }



    /**
     * Converts a symfony treebuilder to agna treebuilder.
     *
     * @param SymfonyTreeBuilder $sourceTreeBuilder
     * @return TreeBuilderTest
     */
    public static function covert(SymfonyTreeBuilder $sourceTreeBuilder)
    {
        $treeBuilder = new TreeBuilderTest();



        return $treeBuilder;
    }

}