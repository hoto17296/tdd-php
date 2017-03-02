<?php
require_once 'lib/Command.php';
require_once 'lib/Logger.php';
require_once 'lib/File.php';

$file = new File(__DIR__ . '/log.dat');
$command = new Command( new StdIO(), new Logger(), $file );

while (true) {
  echo 'mode> ';
  $stdin = trim(fgets(STDIN));
  if ( ! is_numeric($stdin) ) { continue; }

  if ( $stdin === '0' ) { exit; }

  $command->run($stdin);
}
