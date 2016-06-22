<?php
require_once('lib/FizzBuzz.php');
require_once('lib/Validator.php');

class Command
{
  function __construct($stdin, $stdout)
  {
    $this->stdin = $stdin;
    $this->stdout = $stdout;
  }

  function run($mode)
  {
    if ( $mode === '1' ) {
      $input = $this->stdin->gets();
      if ( ! Validator::valid_number($input) ) {
        return;
      }
      $this->stdout->output( FizzBuzz::check((int)$input) );
    }
    if ( $mode === '2' ) {
      $this->stdout->output('3: Fizz');
    }
  }
}
