<?php

use PHPUnit\Framework\TestCase;
use CardinalCollections\Mutable\Map;

class IteratorTest extends TestCase
{
    /**
     * @dataProvider CardinalCollections\Tests\DataProviders\IteratorImplementationProvider::iteratorClassName
     */
    public function testIterator(string $iteratorClass): void
    {
        $initialArray = [
            'pera' => [
                'name' => 'Pera',
                'email' => 'pera@ddr.ex'
            ],
            'mika' => [
                'name' => 'Mika',
                'email' => 'mika@frg.ex'
            ],
            'lazo' => [
                'name' => 'Lazo',
                'email' => 'lazo@sfrj.ex'
            ]
        ];
        $a = new Map($initialArray, $iteratorClass);
        $keys = '';
        $names = '';
        foreach ($a as $key => $value) {
            $keys .= $key;
            $names .= $value['name'];
        }
        $this->assertEquals('peramikalazo', $keys);
        $this->assertEquals('PeraMikaLazo', $names);
    }
}
