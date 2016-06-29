<?php

class StdoutSpy
{
  private $result = [];

  public function output($val)
  {
    $this->result[] = $val;
  }

  public function result()
  {
    return $this->result;
  }
}
