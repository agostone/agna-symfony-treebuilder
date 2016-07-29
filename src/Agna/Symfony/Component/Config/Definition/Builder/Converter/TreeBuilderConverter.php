<?php

namespace Agna\Symfony\Component\Config\Definition\Builder\Converter;

use Symfony\Component\Config\Definition\Builder\TreeBuilder as SymfonyTreeBuilder;
use Agna\Symfony\Component\Config\Definition\Builder\TreeBuilder;

class TreeBuilderConverter
{
    protected $replacers = [
        'Agna\Symfony\Component\Config\Definition\Builder\Converter\ObjectReplacer' =>
            [
                [
                    'Symfony\Component\Config\Definition\Builder\TreeBuilder',
                    'Symfony\Component\Config\Definition\Builder\NodeBuilder',
                    'Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition',
                    'Symfony\Component\Config\Definition\Builder\BooleanNodeDefinition',
                    'Symfony\Component\Config\Definition\Builder\EnumNodeDefinition',
                    'Symfony\Component\Config\Definition\Builder\FloatNodeDefinition',
                    'Symfony\Component\Config\Definition\Builder\IntegerNodeDefinition',
                    'Symfony\Component\Config\Definition\Builder\ScalarNodeDefinition',
                    'Symfony\Component\Config\Definition\Builder\VariableNodeDefinition'
                ],
                [
                    'Agna\Symfony\Component\Config\Definition\Builder\TreeBuilder',
                    'Agna\Symfony\Component\Config\Definition\Builder\NodeBuilder',
                    'Agna\Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition',
                    'Agna\Symfony\Component\Config\Definition\Builder\BooleanNodeDefinition',
                    'Agna\Symfony\Component\Config\Definition\Builder\EnumNodeDefinition',
                    'Agna\Symfony\Component\Config\Definition\Builder\FloatNodeDefinition',
                    'Agna\Symfony\Component\Config\Definition\Builder\IntegerNodeDefinition',
                    'Agna\Symfony\Component\Config\Definition\Builder\ScalarNodeDefinition',
                    'Agna\Symfony\Component\Config\Definition\Builder\VariableNodeDefinition'
                ]
            ]
    ];

    /**
     * Configures a replacer
     *
     * @param string $replacer
     * @param array $arguments
     * @param boolean $merge
     * @return \Agna\Symfony\Component\Config\Definition\Builder\TreeBuilderConverter
     */
    public function configureReplacer($replacer, array $arguments, $merge = true)
    {
        if (!is_string($replacer)) {
            throw \InvalidArgumentException('$replacer value should be a valid classname!');
        }

        $replacerReflection = new \ReflectionClass($replacer);
        if (!$replacerReflection->isSubclassOf(ReplacerInterface::class)) {
            throw \InvalidArgumentException(
                sprintf('$replacer class should implement \'%s\'!', ReplacerInterface::class)
            );
        }

        if (!$merge) {
            $this->replacers[$replacer] = $arguments;
        } else {

            if (!isset($this->replacers[$replacer])) {
                $this->replacers[$replacer] = [];
            }

            $this->replacers = array_replace_recursive($this->replacers[$replacer], $arguments);
        }

        return $this;
    }

    /**
     * Converts a symfony treebuilder to agna treebuilder.
     *
     * @param SymfonyTreeBuilder $sourceTreeBuilder
     * @return \Agna\Symfony\Component\Config\Definition\Builder\TreeBuilder
     */
    public function convert(SymfonyTreeBuilder $sourceTreeBuilder)
    {
        if (!$sourceTreeBuilder instanceof TreeBuilder) {

            $serialized = serialize($sourceTreeBuilder);

            file_put_contents('F:/workspace_i/before_serialize.txt', $serialized);

            foreach ($this->replacers as $class => $arguments) {
                array_splice($arguments, 0, 0, $serialized);
                $serialized = call_user_func_array($class . '::replace', $arguments);
            }

            file_put_contents('F:/workspace_i/after_serialize.txt', $serialized);

            $sourceTreeBuilder = unserialize($serialized);
        }

        return $sourceTreeBuilder;
    }
}
