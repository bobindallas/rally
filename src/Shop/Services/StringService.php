<?php namespace Shop\Services;

class StringService
{
    /**
     * Suppose a percent sign (%) represents the backspace key being pressed.
     * Write a function that transforms a string containing % into a string without any %.
     *
     * Examples
     *     erase("he%%l%hel%llo") = "hello"
     *     erase("major% spar%%ks") = "majo spks"
     *     erase("si%%%t boy") = "t boy"
     *     erase("%%%%") = ""
     *
     * Notes:
     *     - In addition to characters, backspaces can also remove whitespaces.
     *     - If the number of percent signs exceeds the previous characters, remove those previous characters entirely (see example #3)
     *     - If only backspaces exist, return an empty string (see example #4).
     *
     *
     * @param string $s
     * @return string
     */
    public static function erase(string $s): string
    {
        // TODO: fill in method and write Unit Tests!
    }
}
