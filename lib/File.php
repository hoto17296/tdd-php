<?php

class File
{
  function __construct($filename)
  {
    $this->filename = $filename;
  }

  public function write($data)
  {
    $data = implode("\n", $data);
    file_put_contents($this->filename, $data);
  }

  public function read()
  {
    if ( ! file_exists($this->filename) ) {
      return [];
    }
    return file($this->filename, FILE_IGNORE_NEW_LINES);
  }
}
