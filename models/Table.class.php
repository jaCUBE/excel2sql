<?php

/**
 * @package       Excel2SQL
 * @subpackage    Models
 * 
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class Table
 * @brief Represents whole parsed table with its name, columns and rows.
 */

namespace models;

class Table {
  
  /**
   * @brief Table name
   * @var string $name
   */
  public $name;
  
  /**
   * @brief Table columns
   * @var Column $cols
   */
  public $cols;
  
  /**
   * @brief Array of array representing rows and their values
   * @var string $rows
   */
  public $rows;
  

  
  
  
  
  
  
  
  
  
  /**
   * @brief Converting this table into SQL INSERTs queries.
   * @return string SQL query for this table
   */
  
  public function toSql(){
    $sql_generator = new SQLGenerator(); // Class for generating SQL from tables
    
    return $sql_generator->tableToSQL($this); // Converting this table on SQL queries
  }
  
  
  
  
  
  /**
   * @brief Clearing wrong rows (different column values than it's set) from this table.
   * @return void
   */
  
  public function clearWrongRows(){
    $col_count = count($this->cols); // Number of this table columns
    
    foreach($this->rows as $row_i => $row){ // Checking all rows of table...
      if(count($row) != $col_count){ // If number of values in row doesn't equal count of columns...
        unset($this->rows[$row_i]); // Erase this damaged/wrong row 
      }
    }
  }
  
  
}