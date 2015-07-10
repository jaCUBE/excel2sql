<?php

require 'config.php';
require 'libraries/kint-master/Kint.class.php';

function __autoload($class){
  require $class.'.class.php';
}


?>