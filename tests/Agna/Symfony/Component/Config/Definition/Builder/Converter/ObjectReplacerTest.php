<?php

namespace Agna\Symfony\Component\Config\Definition\Builder\Converter;

use PHPUnit\Framework\TestCase;
use Agna\Symfony\Component\Config\Definition\Builder\Converter\ObjectReplacer;

class ObjectReplacerTest extends TestCase
{
    public function testReplace()
    {
        $serialized = serialize(new \Exception());
        $replaced = ObjectReplacer::replace($serialized, 'Exception', 'stdClass');
        $replaced = unserialize($replaced);
        $this->assertInstanceOf('stdClass', $replaced);

        $serialized = serialize(new \InvalidArgumentException());
        $replaced = ObjectReplacer::replace($serialized, 'InvalidArgumentException', 'Exception');
        $replaced = unserialize($replaced);
        $this->assertInstanceOf('Exception', $replaced);
    }
}