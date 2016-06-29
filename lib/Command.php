<?php
require_once('lib/FizzBuzz.php');
require_once('lib/Validator.php');

class Command
{
  function __construct($stdin, $stdout, $logger, $file)
  {
    $this->stdin = $stdin;
    $this->stdout = $stdout;
    $this->logger = $logger;
    $this->file = $file;
  }

  function run($mode)
  {
    if ( $mode === '1' ) {
      $input = $this->stdin->gets();
      if ( ! Validator::valid_number($input) ) {
        return;
      }
      $this->stdout->output( FizzBuzz::check((int)$input) );
      $this->logger->add( $input . ': ' . FizzBuzz::check((int)$input) );
    }
    if ( $mode === '2' ) {
      foreach ( $this->logger->get() as $line ) {
        $this->stdout->output($line);
      }
    }
    if ( $mode === '3' ) {
      $this->file->write( $this->logger->get() );
    }
    if ( $mode === '4' ) {
      foreach ( $this->file->read() as $line ) {
        $this->stdout->output($line);
      }
    }
  }
}
