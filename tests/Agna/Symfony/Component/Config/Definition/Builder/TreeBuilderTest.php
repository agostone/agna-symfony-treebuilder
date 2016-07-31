<?php

namespace Agna\Symfony\Component\Config\Definition\Builder;

use PHPUnit\Framework\TestCase;
use Agna\Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\NodeBuilder as SymfonyNodeBuilder;

class TreeBuilderTest extends TestCase
{
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage $builder argument should be an instance of Agna\Symfony\Component\Config\Definition\Builder\NodeBuilder!
     */
    public function testRootInvalidArgumentException()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('exception', 'array', new SymfonyNodeBuilder());
    }

    public function testRoot()
    {

        $treeBuilder = new TreeBuilder();
        
        $root = $treeBuilder->root('root', 'scalar');
        $this->assertInstanceOf('Agna\Symfony\Component\Config\Definition\Builder\ScalarNodeDefinition', $root);

        $root = $treeBuilder->root('root');
        $this->assertInstanceOf('Agna\Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition', $root);
        

//        $this->assertInstanceOf('Agna\Symfony\Component\Config\Definition\Builder\TreeBuilder', $converted);

//        $this->assertEquals('integer', $converted->getRootDefinition()->getChildDefinition('integer')->getName());
//        $this->assertEquals('scalar', $converted->getRootDefinition()->getChildDefinition('scalar')->getName());
        
        return $treeBuilder;
    }
    
    /**
     * @depends testRoot
     */
    public function testGetRootDefinition(TreeBuilder $treeBuilder)
    {
        $root = $treeBuilder->getRootDefinition();
        $this->assertInstanceOf('Agna\Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition', $root);
    }
}