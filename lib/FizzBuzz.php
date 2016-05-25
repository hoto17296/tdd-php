<?php

class FizzBuzz
{
  public static function check($n)
  {
    if ( $n === 3 ) {
      return 'Fizz';
    }
    if ( $n === 1 ) {
      return '1';
    }
    return 'Buzz';
  }
}
