<?php

namespace Agna\Symfony\Component\Config\Definition\Builder\Converter;

use PHPUnit\Framework\TestCase;

class TreeBuilderConverterTest extends TestCase
{
    public function testGetReplacerConfugration()
    {
        $treeBuilderConverter = new TreeBuilderConverter();
        $configuration = $treeBuilderConverter->getReplacerConfiguraiton('Agna\Symfony\Component\Config\Definition\Builder\Converter\ObjectReplacer');

        $this->assertInternalType('array', $configuration);
        $this->assertArrayHasKey(0, $configuration);
        $this->assertArrayHasKey(1, $configuration);
        $this->assertInternalType('array', $configuration[0]);
        $this->assertInternalType('array', $configuration[1]);
        $this->assertArrayHasKey(0, $configuration[0]);
        $this->assertArrayHasKey(0, $configuration[1]);

        $this->assertEquals('Symfony\Component\Config\Definition\Builder\TreeBuilder', $configuration[0][0]);
        $this->assertEquals('Agna\Symfony\Component\Config\Definition\Builder\TreeBuilder', $configuration[1][0]);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage $replacer argument should be string!
     */
    public function testConfigureReplacerInvalidArgumentException1()
    {
        $treeBuilderConverter = new TreeBuilderConverter();
        $treeBuilderConverter->configureReplacer(1, []);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage $replacer argument should implement Agna\Symfony\Component\Config\Definition\Builder\Converter\ReplacerInterface!
     */
    public function testConfigureReplacerInvalidArgumentException2()
    {
        $treeBuilderConverter = new TreeBuilderConverter();
        $treeBuilderConverter->configureReplacer('stdClass', []);
    }

    public function testConfigureReplacer()
    {
        $treeBuilderConverter = new TreeBuilderConverter();
        $replacer = 'Agna\Symfony\Component\Config\Definition\Builder\Converter\ObjectReplacer';

        $newConfiguration = [
            ['newConfiguration1'],
            ['newConfiguration2']
        ];
        $treeBuilderConverter->configureReplacer($replacer, $newConfiguration);
        $configuration = $treeBuilderConverter->getReplacerConfiguraiton($replacer);
        $this->assertEquals($newConfiguration[0][0], $configuration[0][0]);
        $this->assertEquals($newConfiguration[1][0], $configuration[1][0]);

        $newConfiguration = ['newConfiguration'];
        $treeBuilderConverter->configureReplacer($replacer, $newConfiguration, false);
        $configuration = $treeBuilderConverter->getReplacerConfiguraiton($replacer);
        $this->assertEquals($newConfiguration, $configuration);
    }
}