<?php
require_once('lib/Validator.php');

class ValidatorTest extends PHPUnit_Framework_TestCase
{
  public function test_数字が入力されたらOK()
  {
    $this->assertTrue(Validator::valid_number('1'));
  }

  public function test_アルファベットを含む数字が入力されたらNG()
  {
    $this->assertFalse(Validator::valid_number('123abc'));
  }

  public function test_アルファベットが入力されたらNG()
  {
    $this->assertFalse(Validator::valid_number('abc'));
  }
}
