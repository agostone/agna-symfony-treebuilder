<?php

namespace Agna\Symfony\Component\Config\Definition\Builder;

use Symfony\Component\Config\Definition\Builder\TreeBuilder as SymfonyTreeBuilder;
use Symfony\Component\Config\Definition\Builder\NodeBuilder as SymfonyNodeBuilder;

class TreeBuilder extends SymfonyTreeBuilder
{
    /**
     * {@inheritDoc}
     * @see \Symfony\Component\Config\Definition\Builder\TreeBuilder::root()
     */
    public function root($name, $type = 'array', SymfonyNodeBuilder $builder = null)
    {
        if ($builder !== null && !$builder instanceof NodeBuilder) {
            throw new \InvalidArgumentException(
                sprintf('$builder argument should be an instance of %s!', NodeBuilder::class)
            );
        }

        return parent::root($name, $type, $builder ?: new NodeBuilder());
    }

    /**
     * Returns with the root node definition.
     *
     * @return \Agna\Symfony\Component\Config\Definition\Builder\NodeDefinition
     */
    public function getRootDefinition()
    {
        return $this->root;
    }
}