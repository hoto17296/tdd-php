<?php

class StdinStub
{
  function __construct()
  {
    $this->values = [];
  }

  public function gets()
  {
    return array_shift( $this->values );
  }

  public function set($val) {
    array_push($this->values, $val);
    return $this;
  }
}
