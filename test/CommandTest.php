<?php
require('lib/Command.php');
require('test/StdinStub.php');
require('test/StdoutSpy.php');

class CommandTest extends PHPUnit_Framework_TestCase
{
  public function test_1を入力するとFizzBuzzが動く()
  {
    $stub = new StdinStub('3');
    $spy = new StdoutSpy();
    $command = new Command($stub, $spy);
    $command->run('1');

    $this->assertEquals('Fizz', $spy->result());
  }

  public function test_想定されていない数値を入力すると何もしない()
  {
    $wrong_mode = '100';
    $spy = new StdoutSpy();
    $command = new Command(null, $spy);
    $command->run($wrong_mode);

    $this->assertEquals(null, $spy->result());
  }
}
