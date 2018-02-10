<?php
use PHPUnit\Framework\TestCase;

final class PalindromeTest extends TestCase
{
    public function test()
    {
        $expected = [
            'Н',
            'Тест или тсет',
            'т или т',
            '[111}222/111',
        ];
        $values = [
            'Нет',
            'Тест или тсет',
            'Тест или тест тут',
            '[111}222/111',
        ];
        $this->assertEquals($expected, Palindrome::process($values));
    }
}
