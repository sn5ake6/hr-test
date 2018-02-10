<?php
use PHPUnit\Framework\TestCase;

final class BracketsTest extends TestCase
{
    public function test()
    {
        $expected = ['NO', 'NO', 'NO', 'YES', 'YES', 'YES'];
        $values = [
            '(',
            ')',
            '(}',
            '()',
            '{()}',
            '()(){}'
        ];
        $this->assertEquals($expected, Brackets::process($values));
    }
}
