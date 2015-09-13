<?php

/**
 * @package       Excel2SQL
 * @subpackage    Models
 * 
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class SQLGenerator
 * @brief Generates SQL INSERTs for data from table.
 */

namespace models;

class SQLGenerator {
  
  /**
   * @brief All SQL INSERTs in array (element = query)
   * @var string $sql
   */
  public $sql;
  
  
  
  
  
  
  
  
  
  
  
  /**
   * @brief Converts parsed table from input into SQL INSERTs.
   * @param Table $table Table with columns and parsed data rows created from Excel input
   * @param string $delimiter Optional. Delimiter between every SQL query.
   * @return string SQL queries for table in parameter
   */
  
  public function tableToSQL($table, $delimiter = "\n"){  
    $sql_start = 'INSERT INTO '.$table->name.' ('.$this->prepareSQLCols($table).') '; // The first part of SQL with inserts and columns
    
    
    foreach($table->rows as $i => $row){ // Let's generate the rest of SQL query for every data row...
      $sql_data = 'VALUES ('.$this->prepareSQLValues($table, $i).')'; // Generates values for data row #i
      
      $this->sql[] = $sql_start.$sql_data; // Joining SQL together and putting into array
    }
    
    
    return implode($delimiter, $this->sql); // Returns all SQL queries with delimiter
  }
  
  
  
  
  
  /**
   * @brief Prepares the first part of INSERT SQL with list of columns.
   * @param Table $table Table with columns and parsed data rows created from Excel input
   * @return string List of columns for SQL query
   */
  
  private function prepareSQLCols($table){
    $cols = Array(); // Initiates result array
    
    foreach($table->cols as $col){ // Browsing every column of table...
      $cols[] = '`'.$col->name.'`'; // Adding one column name with ` into result array
    }
    
    return implode(',', $cols); // Returns result array of column names separated by commas
  }
  
  
  
  
  
  /**
   * @brief Prepare the second part for INSERT SQL with data of one table row.
   * @param Table $table Table with columns and parsed data rows created from Excel input
   * @param integer $i Number of row to process
   * @return string The second part of SQL with values separated by commas
   */
  
  private function prepareSQLValues($table, $i){
    $values = Array(); // Initiates result array
    
    foreach($table->rows[$i] as $i_col => $value){ // For every column value of the row from parameter...
      $values[] = $table->cols[$i_col]->formatValue($value); // Processes value according to format from current column
    }
    
    return implode(',', $values); // Returns result array of row data separated by commas
  }
  
  
}


?>