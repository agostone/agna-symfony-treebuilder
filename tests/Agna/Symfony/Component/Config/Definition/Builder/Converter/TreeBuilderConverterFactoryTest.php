<?php

namespace Agna\Symfony\Component\Config\Definition\Builder\Converter;

use PHPUnit\Framework\TestCase;

class TreeBuilderConverterFactoryTest extends TestCase
{
    public function testCreate()
    {
        $treeBuilderConverter = TreeBuilderConverterFactory::create();
        $this->assertInstanceOf(TreeBuilderConverter::class, $treeBuilderConverter);

        $replacer = 'Agna\Symfony\Component\Config\Definition\Builder\Converter\ObjectReplacer';
        $replacerConfiguration = [
            $replacer => [
                ['newConfiguration1'],
                ['newConfiguration2']
            ]
        ];
        $treeBuilderConverter = TreeBuilderConverterFactory::create($replacerConfiguration);
        $configuration = $treeBuilderConverter->getReplacerConfiguraiton($replacer);
        $this->assertEquals($replacerConfiguration[$replacer][0][0], $configuration[0][0]);
        $this->assertEquals($replacerConfiguration[$replacer][1][0], $configuration[1][0]);
    }
}