<?php

/**
 * @package       Excel2SQL
 * @subpackage    Models
 * 
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class Parser
 * @brief Parses Excel table input for PHP built table.
 */

namespace models;

class Parser {

  /**
   * @brief Regex for exploding rows of input
   * @var string $regex_explode
   */
  public $regex_explode;
  
  
  
  
  
  
  
  
  
  
  
  /**
   * @brief Parsing Excel table into PHP class Table.
   * @param string $excel Form input with Excel table
   * @return \models\Table Table with parsed data
   */
  
  public function parseExcel($excel){
    $rows_parsed = $this->explodeExcelRows($excel); // Exploding rows of input
    
    
    $table = new Table(); // Creating new table
    
    $table->name = trim($rows_parsed[0]); // The first row is table name
    $table->cols = $this->parseCols($rows_parsed[1]); // The second row are table columns
    
    unset($rows_parsed[0]); // Delete the first row
    unset($rows_parsed[1]); // Delete the second row (remain data rows only)
    
    
    foreach($rows_parsed as $index => $row){ // Browsing each data row...
      $table->rows[] = $this->parseRow($row); // Parsing column values of one row
    }
    
    
    $table->clearWrongRows(); // Clearing rows with wrong number of columns
    
    
    return $table; // Returning whole table with parsed data
  }
  
  
  
  
  
  /**
   * @brief Exploding Excel input rows by regex.
   * @param string $excel Excel input
   * @return string Array of strings where each element means one row of Excel tale
   */
  
  private function explodeExcelRows($excel){
    $this->setLineBreakRegex($excel); // Checks if there's force line break (if any, sets different regex)
    
    $rows_parsed = preg_split($this->regex_explode, $excel); // Input splitting by regex
    $rows_parsed = array_filter($rows_parsed); // Removing empty elements
    
    return $rows_parsed; // Returns parsed rows
  }

  

  
  
  /**
   * @brief Parsing the row of Excel input with columns' names and their parameters.
   * @param string $cols_row Row with columns names and parameters
   * @return Column Array of columns for building the table
   */
  
  private function parseCols($cols_row){
    $cols = Array(); // Initiates empty array for result columns
    
    $cols_name = preg_split('/\t/', $cols_row); // Splitting row for column strings by tabulator
    
    foreach($cols_name as $col_string){ // Browsing each element of exploded row...
      $cols[] = new Column($col_string); // Creating column with current column string
    }
    
    return $cols; // Returns all columns for the tabl
  }
  
  
  
  
  
  /**
   * @brief Parses values of coluns for one data row.
   * @param string $row One data row
   * @return string Array of values where each element means one column
   */
  
  private function parseRow($row){
    return preg_split('/\t/', $row); // Splitting row for column values by tabulator
  }
  
  
  
  
  
  /**
   * @brief Sets regex for splitting Excel table input by rows.
   * @param string $excel Input Excel table
   * @return void
   */

  private function setLineBreakRegex($excel){
    $this->regex_explode = '/\n/'; // Default regex is just new line: \n

    if(preg_match('/\t%line_break/', $excel)){ // If Excel input contains %line_break...
      $this->regex_explode = '/\t%line_break/'; // %line_break will be used for splitting rows instead of \n
    }
  }
    
  
}