<?php
require_once 'lib/Command.php';
require_once 'lib/Logger.php';
require_once 'lib/File.php';

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

$file = new File(__DIR__ . '/log.dat');
$command = new Command( new Stdin(), new Stdout(), new Logger(), $file );

while (true) {
  $stdin = trim(fgets(STDIN));
  if ( ! is_numeric($stdin) ) { continue; }

  if ( $stdin === '0' ) { exit; }

  $command->run($stdin);
}
