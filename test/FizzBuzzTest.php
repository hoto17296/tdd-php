<?php
require('lib/FizzBuzz.php');

class FizzBuzzTest extends PHPUnit_Framework_TestCase
{
  public function test_1入れたら1()
  {
    $this->assertEquals('1', FizzBuzz::check(1));
  }

  public function test_3入れたらFizz()
  {
    $this->assertEquals('Fizz', FizzBuzz::check(3));
  }

  public function test_5入れたらFizz()
  {
    $this->assertEquals('Buzz', FizzBuzz::check(5));
  }

  public function test_15入れたらFizzBuzz()
  {
    $this->assertEquals('FizzBuzz', FizzBuzz::check(15));
  }

}
