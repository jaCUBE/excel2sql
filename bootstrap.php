<?php


global $_MICROTIME; // Global var for storing microtime from script begin

$_MICROTIME = microtime(true); // Setting current microtime into global variable





require 'config.php'; // Loading configuration of Excel2SQL
require 'libraries/kint-master/Kint.class.php'; // Loading Kint developer tool





/**
 * @brief Auto-loading classes which are unknown for PHP.
 * @param string Class name including namespace
 * @return void
 */

function __autoload($class){
  $class = str_replace("\\", "/", $class); // Replacing backslahes in namespace on / for file directory
  
  require $class.'.class.php'; // Including file where directory is class namespace
}





/**
 * @brief Gives time in microseconds from start of script running.
 * @param boolean $reset Optional. Reset global variable of microtime?
 * @return $result; // Curre* @return float Passed time from start of script
 */

function elapsedTime($reset = false){
  global $_MICROTIME;
  
  $result = microtime(true) - $_MICROTIME; // Result is current microtime - global one
  
  if($reset){ // If reset global microtime...
    $_MICROTIME = microtime(true); // Sets new microtime
  }
  
  return $result; // Current microtime - time from very start of script
}



?>