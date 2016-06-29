<?php
require('lib/Command.php');
require('lib/Logger.php');
require('test/StdinStub.php');
require('test/StdoutSpy.php');

class CommandTest extends PHPUnit_Framework_TestCase
{
  private function setUpForMode1()
  {
    $this->spy = new StdoutSpy();
    $this->logger = new Logger();
    $this->command = new Command(new StdinStub('3'), $this->spy, $this->logger);
  }

  public function test_1を入力するとFizzBuzzが動く()
  {
    $this->setUpForMode1();

    $this->command->run('1');

    $this->assertEquals(['Fizz'], $this->spy->result());
  }

  public function test_1を入力すると履歴が保存される()
  {
    $this->setUpForMode1();

    $this->command->run('1');

    $this->assertEquals(['3: Fizz'], $this->logger->get());
  }

  public function test_想定されていない数値を入力すると何もしない()
  {
    $wrong_mode = '100';
    $spy = new StdoutSpy();
    $command = new Command(null, $spy, null);
    $command->run($wrong_mode);

    $this->assertEquals([], $spy->result());
  }

  public function test_数値以外を入力すると何もしない()
  {
    $wrong_input = 'a';
    $stub = new StdinStub($wrong_input);
    $spy = new StdoutSpy();
    $command = new Command($stub, $spy, null);
    $command->run('1');

    $this->assertEquals([], $spy->result());
  }

  public function test_1を複数回実行してからに2を入力するとすべての履歴が表示される()
  {
    // setup
    $spy = new StdoutSpy();
    $logger = new Logger();
    $command = new Command(null, $spy, $logger);
    $logger->add('3: Fizz');
    $logger->add('5: Buzz');

    // exercise
    $command->run('2');

    // verify
    $this->assertEquals(["3: Fizz", "5: Buzz"], $spy->result());
  }
}
