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
}
