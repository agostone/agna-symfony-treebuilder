<?php

namespace Agna\Symfony\Component\Config\Definition\Builder;

use PHPUnit\Framework\TestCase;

class NodeBuilderTest extends TestCase
{
    public function testNodeMapping()
    {
        $nodeBuilder = new NodeBuilder();

        $node = $nodeBuilder->arrayNode('test');
        $this->assertInstanceOf(ArrayNodeDefinition::class, $node);

        $node = $nodeBuilder->booleanNode('test');
        $this->assertInstanceOf(BooleanNodeDefinition::class, $node);

        $node = $nodeBuilder->enumNode('test');
        $this->assertInstanceOf(EnumNodeDefinition::class, $node);

        $node = $nodeBuilder->floatNode('test');
        $this->assertInstanceOf(FloatNodeDefinition::class, $node);

        $node = $nodeBuilder->integerNode('test');
        $this->assertInstanceOf(IntegerNodeDefinition::class, $node);

        $node = $nodeBuilder->scalarNode('test');
        $this->assertInstanceOf(ScalarNodeDefinition::class, $node);

        $node = $nodeBuilder->variableNode('test');
        $this->assertInstanceOf(VariableNodeDefinition::class, $node);
    }

    public function testDefinitionSetGetName()
    {
        $definitions = [
            'variable',
            'scalar',
            'boolean',
            'integer',
            'float',
            'array',
            'enum'
        ];
        $nodeBuilder = new NodeBuilder();
        $oldName = 'test';
        $newName = 'newTest';

        foreach ($definitions as $definition) {
            $definition = $nodeBuilder->{$definition . 'Node'}($oldName);
            $this->assertEquals($oldName, $definition->getName());

            $definition->setName($newName);
            $this->assertEquals($newName, $definition->getName());
        }
    }
}
