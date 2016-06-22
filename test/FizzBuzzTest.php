<?php
require_once('lib/FizzBuzz.php');

class FizzBuzzTest extends PHPUnit_Framework_TestCase
{
  public function test_3の倍数でも5の倍数でもなければそのまま返す()
  {
    $this->assertEquals('1', FizzBuzz::check(1));
    $this->assertEquals('2', FizzBuzz::check(2));
  }

  public function test_3の倍数を入れたらFizz()
  {
    $this->assertEquals('Fizz', FizzBuzz::check(3));
    $this->assertEquals('Fizz', FizzBuzz::check(6));
  }

  public function test_5の倍数を入れたらFizz()
  {
    $this->assertEquals('Buzz', FizzBuzz::check(5));
    $this->assertEquals('Buzz', FizzBuzz::check(10));
  }

  public function test_15の倍数を入れたらFizzBuzz()
  {
    $this->assertEquals('FizzBuzz', FizzBuzz::check(15));
    $this->assertEquals('FizzBuzz', FizzBuzz::check(30));
  }

}
