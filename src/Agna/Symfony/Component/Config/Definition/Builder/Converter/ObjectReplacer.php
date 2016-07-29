<?php

namespace Agna\Symfony\Component\Config\Definition\Builder\Converter;

class ObjectReplacer implements ReplacerInterface
{
    /**
     * @see ReplacerInterface::replace()
     */
    public static function replace($serializedObject, ...$arguments)
    {
        if (count($arguments) !== 2) {
            throw new \InvalidArgumentException('Insufficient arguments, \'replace\' needs three parameters: $serializedObject, $target, $new!');
        }

        // Target
        if (is_string($arguments[0])) {
            $arguments[0] = [$arguments[0]];
        }

        // New
        if (is_string($arguments[1])) {
            $arguments[1] = [$arguments[1]];
        }

        foreach ($arguments[0] as &$value) {
            $value = sprintf('/O:.[0-9]:"%s"/i', preg_quote($value));
        }

        foreach ($arguments[1] as &$value) {
            $value = sprintf('O:%s:"%s"', strlen($value), $value);
        }

        return preg_replace(
            $arguments[0],
            $arguments[1],
            $serializedObject
        );
    }
}
