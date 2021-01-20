<?php

namespace App\Tools;

class StringUtility
{
    public static function slugify(string $text): string
    {
        if (empty($text)) {
            $text = 'n-a';
        }

        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text) ?: 'n-a';
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text) ?: 'n-a';
        // trim
        $text = trim($text, '-') ?: 'n-a';
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text) ?: 'n-a';
        // lowercase
        $text = strtolower($text) ?: 'n-a';

        return $text;
    }

    public static function getArrayFromString(string $string, string $separator = '.'): array
    {
        return explode($separator, $string);
    }
}
