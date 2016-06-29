<?php
require_once('lib/File.php');

class FileTest extends PHPUnit_Framework_TestCase
{
  public function test_readでファイルが存在しなかった場合に空配列を返す()
  {
    $file = new File(__DIR__ . '/../notfound.dat');

    $this->assertEquals([], $file->read());
  }
}
