<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SQLGenerator
 *
 * @author jaCUBE
 */

namespace models;

class SQLGenerator {
  
  public $sql;
  
  public function tableToSQL($table){    
    foreach($table->rows as $i => $row){
      $this->sql[] = 'INSERT INTO '.$table->name.' ('.$this->prepareSQLCols($table).') VALUES('.$this->prepareSQLValues($table, $i).');';
    }
  }
  
  
  public function sql(){
    return implode("\n", $this->sql);
  }
  
  
  
  private function prepareSQLCols($table){
    $cols = Array();
    
    foreach($table->cols as $col){
      $cols[] = "'".$col."'";
    }
    
    return implode(',', $cols);
  }
  
  
  
  private function prepareSQLValues($table, $i){
    $values = Array();
    
    foreach($table->rows[$i] as $i_col => $value){
      $values[] = "'".$value."'";
    }
    
    return implode(',', $values);
  }
  
  
}
