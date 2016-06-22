<?php
require_once 'lib/Command.php';

class Stdin
{
  public function gets()
  {
    return trim(fgets(STDIN));
  }
}

class Stdout
{
  public function output($val)
  {
    echo $val . "\n";
  }
}

while (true) {
  $stdin = trim(fgets(STDIN));
  if ( ! is_numeric($stdin) ) { continue; }

  if ( $stdin === '0' ) { exit; }

  $command = new Command( new Stdin(), new Stdout() );

  $command->run($stdin);
}
