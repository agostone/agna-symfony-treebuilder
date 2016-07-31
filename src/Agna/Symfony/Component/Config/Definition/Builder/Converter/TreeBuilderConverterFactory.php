<?php

namespace Agna\Symfony\Component\Config\Definition\Builder\Converter;

/**
 * TreeBuilderConverterFactory class.
 *
 * @author shards
 */
class TreeBuilderConverterFactory
{
    /**
     * Creates a TreeBuilderConverter instance.
     *
     * @param array $replacerConfigurations
     * @return \Agna\Symfony\Component\Config\Definition\Builder\Converter\TreeBuilderConverter
     */
    public static function create(array $replacerConfigurations = [])
    {
        $treeBuilderConverter = new TreeBuilderConverter();

        foreach ($replacerConfigurations as $replacer => $arguments) {
            $treeBuilderConverter->configureReplacer($replacer, $arguments);
        }

        return $treeBuilderConverter;
    }
}