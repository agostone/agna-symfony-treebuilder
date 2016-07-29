<?php

namespace Agna\Symfony\Component\Config\Definition\Builder\Converter;

interface ReplacerInterface
{
    /**
     * Replaces a part of the serialized object string
     *
     * @param string $serializedObject
     * @param mixed ...$arguments
     * @return string
     */
    public static function replace($serializedObject, ...$arguments);
}
