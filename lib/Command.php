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
      $result = FizzBuzz::check((int)$input);
      $this->stdout->output($result);
    }
  }
}
