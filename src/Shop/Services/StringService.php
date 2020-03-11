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
     * @param string $bs
     * @return string
     */
    public static function erase(string $s, $bs = '%'): string
    {
      // split string to chars
      $tmp = str_split($s);
      $res = []; // the resulting string

      foreach($tmp as $ltr) {

         // if we have a backspace remove the previous char (if any) and move to the next element
         if ($ltr === $bs) {
            array_pop($res); // does nothing if the array is empty
            continue;

         // otherwise add char to list and keep going
         } else {
            $res[] = $ltr;
         }   
      }   

      // return the stringified result
      return implode('', $res);

    } // function erase

} // class StringService
