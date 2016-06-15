<?php

class Validator
{
  public static function valid_number($val)
  {
    if ( preg_match('/^\d+$/', $val) ) {
      return true;
    }
    return false;
  }
}
