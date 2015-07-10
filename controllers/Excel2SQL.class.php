<?php

namespace controllers;

class Excel2SQL extends BasicController {
  
  public function __construct(){
    if(!empty($_POST['excel_input'])){
      $this->parse();
    }
    
    $this->index();
  }
  
  
  
  public function index($data = false){
    $this->view('form');
  }
  
  
  public function parse(){
    $parser = new \models\Parser();
    $this->data = $parser->parseExcel($_POST['excel_input']);
  }

  
}
