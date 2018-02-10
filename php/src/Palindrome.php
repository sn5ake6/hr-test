<?php
class Palindrome {
    private static function normalize($char)
    {
        $lower_char = mb_strtolower($char);
        return preg_replace('/[^a-zа-я\d]/ui', '', $lower_char);
    }

    private static function isPalindrome($chars, $left, $right)
    {
        while($left <= $right) {
            $left_char = self::normalize($chars[$left]);
            if (empty($left_char)) {
                $left++;
                continue;
            };

            $right_char = self::normalize($chars[$right]);
            if (empty($right_char)) {
                $right--;
                continue;
            };

            if($left_char != $right_char) {
                return false;
            }

            $left++;
            $right--;
        }
        return true;
    }

    public static function getMax($string) {
        $max_palindrome = ['start' => 0, 'length' => 0];
        $chars = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);
        $count_chars = count($chars);
        for($left = 0; $left < $count_chars; $left++) {
            for($right = $left + 1; $right < $count_chars; $right++) {
                if(self::isPalindrome($chars, $left, $right)) {
                    $length = $right - $left;
                    if($length > $max_palindrome['length']) {
                        $max_palindrome = ['start' => $left, 'length'=> $length];
                    }
                }
            }
        }
        $start = $max_palindrome['start'];
        $length = $max_palindrome['length'] + 1;
        return mb_substr($string, $start, $length);
    }

    public function process($values)
    {
        return array_map('self::getMax', $values);
    }
}
