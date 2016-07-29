<?php

namespace Agna\Symfony\Component\Config\Definition\Builder;

/**
 * NodeDefinition trait.
 *
 * + Setting the name is possible.
 *
 * @author shards
 */
trait NodeDefinitionTrait
{
    /**
     * Sets the node definition name.
     *
     * @param string $name
     * @return \Agna\Symfony\Component\Config\Definition\Builder\NodeDefinition
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    /**
     * Returns with the node definiton name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}