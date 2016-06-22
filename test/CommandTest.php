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

  public function test_数値以外を入力すると何もしない()
  {
    $wrong_input = 'a';
    $stub = new StdinStub($wrong_input);
    $spy = new StdoutSpy();
    $command = new Command($stub, $spy);
    $command->run('1');

    $this->assertEquals(null, $spy->result());
  }
/*
  public function test_1を実行せずに2を入力すると何も表示されない()
  {
  }
*/

  public function test_1を実行してからに2を入力すると履歴が表示される()
  {
    $stub = new StdinStub('3');
    $spy = new StdoutSpy();
    $command = new Command($stub, $spy);
    $command->run('1');
    $command->run('2');

    $this->assertEquals('3: Fizz', $spy->result());
  }
}
