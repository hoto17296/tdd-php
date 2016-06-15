<?php

class StdinStub
{
  function __construct($val)
  {
    $this->value = $val;
  }

  public function gets()
  {
    return $this->value;
  }
}
