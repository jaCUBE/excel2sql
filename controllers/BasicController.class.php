<?php


namespace controllers;

class BasicController {  
  
  public $data;
  
  public function view($view_name){
    ob_start();
    include('views/'.$view_name.'.view.php');
    echo ob_get_clean();
    flush();
  }
}
