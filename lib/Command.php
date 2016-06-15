<?php
require_once('lib/FizzBuzz.php');

class Command
{
  function __construct($stdin, $stdout)
  {
    $this->stdin = $stdin;
    $this->stdout = $stdout;
  }

  function run($mode)
  {
    if ( $mode === 1 ) {
      $input = (int)$this->stdin->gets();
      $result = FizzBuzz::check($input);
      $this->stdout->output($result);
    }
  }
}
