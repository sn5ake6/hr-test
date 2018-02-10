<?php
function processBracket($stack, $bracket)
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

function parse($item) {
    $stack = array_reduce(str_split($item), 'processBracket', []);
    return count($stack) == 0 ? 'YES' : 'NO';
}

function process($values) {
    return array_map('parse', $values);
}
