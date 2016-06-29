<?php

class Logger
{
  private $list = [];

  public function add($item)
  {
    $this->list[] = $item;
  }

  public function get()
  {
    return $this->list;
  }

}
