<?php
require_once 'lib/Command.php';
require_once 'lib/Logger.php';

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

$command = new Command( new Stdin(), new Stdout(), new Logger() );

while (true) {
  $stdin = trim(fgets(STDIN));
  if ( ! is_numeric($stdin) ) { continue; }

  if ( $stdin === '0' ) { exit; }

  $command->run($stdin);
}
