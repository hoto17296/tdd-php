<?php
require_once 'lib/FizzBuzz';

while (true) {
  $stdin = trim(fgets(STDIN));
  if ( ! is_numeric($stdin) ) { continue; }

  if ( $stdin === 0 ) { exit; }
}
