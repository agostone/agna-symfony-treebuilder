<?php

namespace Agna\Symfony\Component\Config\Definition\Builder;

use PHPUnit\Framework\TestCase;

class ArrayNodeDefinitionTest extends TestCase
{
    public function testGetChildDefinition()
    {
        $arrayNodeDefinition = new ArrayNodeDefinition('test');
        $arrayNodeDefinition
            ->children()
                ->scalarNode('foo')->end()
                ->scalarNode('baz')->end()
            ->end();

        $childDefinition = $arrayNodeDefinition->getChildDefinition('foo');
        $this->assertInstanceOf(ScalarNodeDefinition::class, $childDefinition);

        $childDefinition = $arrayNodeDefinition->getChildDefinition('baz');
        $this->assertInstanceOf(ScalarNodeDefinition::class, $childDefinition);
    }
}