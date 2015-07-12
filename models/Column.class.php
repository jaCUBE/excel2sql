<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Column
 *
 * @author jaCUBE
 */

namespace models;

class Column {
  public $name;
  public $param;
  public $type = 'text';
  public $null = false;
  
  
  
  public function __construct($column_name) {
    $split = explode('%', $column_name);

    $this->name = @trim($split[0]);
    $this->param = @trim($split[1]);
    
    $this->prepareParam();
  }
  
  
  
  
  
  public function prepareParam(){
    if(strpos($this->param, 'number') !== false){
      $this->type = 'number';
    }
    
    if(strpos($this->param, 'date') !== false){
      $this->type = 'date';
    }
    
    if(strpos($this->param, 'null') !== false){
      $this->null = true;
    } 
  }
  
  
  
  
  public function formatValue($value){
    if($this->null AND $value == ''){
      return 'NULL';
    }
    
    switch($this->type){
      case 'text': return "'".$value."'";
      case 'number': return $value;
      case 'date': return "'".date('Y-m-d H:i:s', strtotime($value))."'"; 
    }
  }
  
  
  
}
