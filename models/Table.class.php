<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Table
 *
 * @author jaCUBE
 */

namespace models;

class Table {
  public $name;
  public $cols;
  public $rows;
  
  public $sql_generator;
  
  
  public function toSql(){
    $this->sql_generator = new SQLGenerator();
    $this->sql_generator->tableToSQL($this);
    
    return $this->sql_generator->sql();
  }
}
