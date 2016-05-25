<?php
require('lib/FizzBuzz.php');

class FizzBuzzTest extends PHPUnit_Framework_TestCase
{
  public function test_3入れたらFizz()
  {
    $this->assertEquals('Fizz', FizzBuzz::check(3));
  }

}
