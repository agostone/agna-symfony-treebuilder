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
     * @return mixed|null
     */
    public function getChildDefinition($name)
    {
        return isset($this->children[$name]) ? $this->children[$name] : null;
    }

    /**
     * {@inheritDoc}
     * @see \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition::getNodeBuilder()
     */
    protected function getNodeBuilder()
    {
        if (null === $this->nodeBuilder) {
            $this->nodeBuilder = new NodeBuilder();
        }

        return $this->nodeBuilder->setParent($this);
    }
}
