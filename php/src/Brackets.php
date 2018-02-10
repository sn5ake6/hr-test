<?php
class Brackets
{
    private static function processBracket($stack, $bracket)
    {
        $bracket_map = ['{' => '}', '[' => ']', '(' => ')'];
        if (array_key_exists($bracket, $bracket_map)) {
          $stack[] = $bracket;
        } else {
          $open_bracket = array_search($bracket, $bracket_map);
          $last_bracket = array_pop($stack);
          if ($last_bracket != $open_bracket) {
              $stack[] = $last_bracket;
              $stack[] = $bracket;
          };
        };
        return $stack;
    }

    private static function parse($item)
    {
        $stack = array_reduce(str_split($item), 'self::processBracket', []);
        return count($stack) == 0 ? 'YES' : 'NO';
    }

    public static function process($values)
    {
        return array_map('self::parse', $values);
    }
}
