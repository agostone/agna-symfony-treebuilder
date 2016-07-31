<?php

namespace Agna\Test\Symfony\Component\Config\Definition\Builder\Converter;

use Agna\Symfony\Component\Config\Definition\Builder\Converter\ReplacerInterface;

class DummyReplacer implements ReplacerInterface
{
    public static function replace($serializedObject, ...$arguments)
    {
    }
}