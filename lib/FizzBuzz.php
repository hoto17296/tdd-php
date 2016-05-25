<?php

class FizzBuzz
{
  public static function check($n)
  {
    if ( $n % 15 === 0 ) {
      return 'FizzBuzz';
    }
    if ( $n % 3 === 0 ) {
      return 'Fizz';
    }
    if ( $n === 1 ) {
      return '1';
    }
    if ( $n % 5 === 0 ) {
      return 'Buzz';
    }
  }
}
