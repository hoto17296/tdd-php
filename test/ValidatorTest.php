<?php
require_once('lib/Validator.php');

class ValidatorTest extends PHPUnit_Framework_TestCase
{
  public function test_数字が入力されたらOK()
  {
    $this->assertTrue(Validator::valid_number(1));
  }
  /*
   * 数字
   * アルファベット
   * 日本語
   * 記号含む
   * 空文字列
   * めちゃ長い
  */
}
