<?php

class StdIO
{
  public function gets()
  {
    return trim(fgets(STDIN));
  }

  public function output($val)
  {
    echo $val . "\n";
  }
}
