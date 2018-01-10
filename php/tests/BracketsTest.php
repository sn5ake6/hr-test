<?php
use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../brackets.php';

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
        $this->assertEquals($expected, braces($values));
    }
}
