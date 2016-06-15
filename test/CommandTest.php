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
    $command->run(1);

    $this->assertEquals('Fizz', $spy->result());
  }
}
