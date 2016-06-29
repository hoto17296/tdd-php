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
    if ( file_exists($this->filename) ) {
      unlink($this->filename);
    }
  }

  protected function tearDown()
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
}
