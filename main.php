<?php

while (true) {
  $stdin = trim(fgets(STDIN));
  if ( ! is_numeric($stdin) ) { continue; }

  switch ($stdin) {
    case 0:
      exit;
  }
}
