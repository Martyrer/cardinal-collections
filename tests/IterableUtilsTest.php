<?php

use PHPUnit\Framework\TestCase;
use CardinalCollections\IterableUtils;
use CardinalCollections\Mutable\Map;

final class IterableUtilsTest extends TestCase
{
    public function testLastKeyOnArray(): void
    {
        $a = [];
        $a[] = 'foo';
        $a[] = 'bar';
        $a[] = 'baz';
        $last = IterableUtils::lastKey($a);
        $this->assertEquals(2, $last);
    }

    public function testLastKeyOnMap(): void
    {
        $a = new Map();
        $a[] = 'foo';
        $a[] = 'bar';
        $a[] = 'baz';
        $last = IterableUtils::lastKey($a);
        $this->assertEquals(2, $last);
    }

    public function testKeysOnArray(): void
    {
        $a = ['foo', 'bar', 'baz'];
        $keys = IterableUtils::keys($a);
        $this->assertEquals([0, 1, 2], $keys);
    }

    public function testKeysOnMap(): void
    {
        $map = new Map(['foo', 'bar', 'baz']);
        $keys = IterableUtils::keys($map);
        $this->assertEquals([0, 1, 2], $keys);
    }

    public function testValuesOnArray(): void
    {
        $a = ['foo', 'bar', 'baz'];
        $values = IterableUtils::values($a);
        $this->assertEquals(['foo', 'bar', 'baz'], $values);
    }

    public function testValuesOnMap(): void
    {
        $map = new Map(['foo', 'bar', 'baz']);
        $values = IterableUtils::values($map);
        $this->assertEquals(['foo', 'bar', 'baz'], $values);
    }

    public function testIterableValuesReduce(): void
    {
        $a = [1, 2, 3];
        $sum = IterableUtils::iterable_values_reduce($a, function($acc, $x) {
           return $acc + $x;
        });
        $this->assertEquals(6, $sum);
    }

    public function testIterableReduce(): void
    {
        $a = [1, 2, 3];
        $sum = IterableUtils::iterable_reduce($a, function($acc, $k, $v) {
            return $acc + $k + $v;
        }, 0);
        $this->assertEquals(9, $sum);
    }
}
