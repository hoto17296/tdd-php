<?php
require_once('lib/Command.php');
require_once('lib/Logger.php');
require_once('test/StdIOMock.php');

class CommandTest extends PHPUnit_Framework_TestCase
{
  private function setUpForMode1()
  {
    $this->stdio = ( new StdIOMock() )->set('3');
    $this->logger = new Logger();
    $this->command = new Command($this->stdio, $this->logger, null);
  }

  public function test_1を入力するとFizzBuzzが動く()
  {
    $this->setUpForMode1();

    $this->command->run('1');

    $this->assertEquals(['Fizz'], $this->spy->result());
  }

//  public function test_1を入力すると履歴が保存される()
//  {
//    $this->setUpForMode1();
//
//    $this->command->run('1');
//
//    $this->assertEquals(['3: Fizz'], $this->logger->get());
//  }
//
//  public function test_想定されていない数値を入力すると何もしない()
//  {
//    $wrong_mode = '100';
//    $spy = new StdoutSpy();
//    $command = new Command(null, $spy, null, null);
//    $command->run($wrong_mode);
//
//    $this->assertEquals([], $spy->result());
//  }
//
//  public function test_数値以外を入力すると何もしない()
//  {
//    $wrong_input = 'a';
//    $stub = ( new StdinStub() )->set($wrong_input);
//    $spy = new StdoutSpy();
//    $command = new Command($stub, $spy, null, null);
//    $command->run('1');
//
//    $this->assertEquals([], $spy->result());
//  }
//
//  public function test_1を複数回実行してからに2を入力するとすべての履歴が表示される()
//  {
//    // setup
//    $spy = new StdoutSpy();
//    $logger = new Logger();
//    $command = new Command(null, $spy, $logger, null);
//    $logger->add('3: Fizz');
//    $logger->add('5: Buzz');
//
//    // exercise
//    $command->run('2');
//
//    // verify
//    $this->assertEquals(["3: Fizz", "5: Buzz"], $spy->result());
//  }
}
