<?php
require_once('lib/Command.php');
require_once('lib/Logger.php');
require_once('lib/File.php');
require_once('test/StdinStub.php');
require_once('test/StdoutSpy.php');

class Command_FileTest extends PHPUnit_Framework_TestCase
{
  private $filename = __DIR__ . '/../test.dat';

  protected function setUp()
  {
    $this->deleteFile();
  }

  protected function tearDown()
  {
    $this->deleteFile();
  }

  private function deleteFile()
  {
    if ( file_exists($this->filename) ) {
      unlink($this->filename);
    }
  }

  public function test_1を実行してから3を入力するとすべての履歴がファイルに保存される()
  {
    // setup
    $spy = new StdoutSpy();
    $logger = new Logger();
    $file = new File($this->filename);
    $command = new Command(null, $spy, $logger, $file);
    $logger->add('3: Fizz');
    $logger->add('5: Buzz');

    // exercise
    $command->run('3');

    // verify
    $this->assertEquals(["3: Fizz", "5: Buzz"], file($this->filename, FILE_IGNORE_NEW_LINES));
  }

  public function test_4を入力すると過去の履歴をファイルから読み込める()
  {
    // setup
    $spy = new StdoutSpy();
    $file = new File($this->filename);
    $file->write(['3: Fizz', '5: Buzz']);
    $command = new Command(null, $spy, null, $file);

    // exercise
    $command->run('4');

    // verify
    $this->assertEquals(["3: Fizz", "5: Buzz"], $spy->result());
  }
}
