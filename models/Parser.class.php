<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Parse
 *
 * @author jaCUBE
 */

namespace models;

class Parser {
  
  public function parseExcel($excel){
    $rows_parsed = explode("\n", $excel);
    $rows_parsed = array_filter($rows_parsed);
    
    
    $table = new Table();
    
    foreach($rows_parsed as $index => $row){
      
      if($index === 0){
        $table->name = $this->beautifyData($row);
        continue;
      }
      
      
      if($index === 1){
        $table->cols = $this->parseRow($row);
        continue;
      }
      
      $table->rows[$index - 2] = $this->parseRow($row);
      
    }
    
    return $table;
    
    
  }
  
  
  
  public function beautifyData($data){
    $data = trim($data);
    
    return $data;
  }
  
  
  public function parseRow($row_raw){
    $row_value = explode("\t", $row_raw);
    
    foreach($row_value as $i => $value){
      $row_value[$i] = $this->beautifyData($value);
    }
    
    return $row_value;
  }
}
