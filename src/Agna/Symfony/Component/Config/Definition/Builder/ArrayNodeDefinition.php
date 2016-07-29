<?php

namespace Agna\Symfony\Component\Config\Definition\Builder;

/**
 * Extended ArrayNodeDefinition class.
 *
 * + Setting the name is possible.
 * + Getting child definitions is possible.
 *
 * @author shards
 */
class ArrayNodeDefinition extends \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition
{
    use NodeDefinitionTrait;

    /**
     * Returns with a child definition.
     *
     * @param string $name
     * @return mixed
     */
    public function getChildDefinition($name)
    {
        return !isset($this->children[$name]) ?: $this->children[$name];
    }
}
