<?php

/**
 * @package       Excel2SQL
 * @subpackage    Models
 * 
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class Column
 * @brief Stores name and parameters for one column of Excel input. Provides method for formatting output value.
 */

namespace models;

class Column {
  
  /**
   * @brief Column name
   * @var string $name
   */
  public $name;
  
  /**
   * @brief Parameters string (all in name following %)
   * @var string $param
   */
  public $param;
  
  /**
   * @brief Datatype of column (ie. text, number, column
   * @var string $type
   */
  public $type = 'text';
  
  /**
   * @brief Should be empty values of this column converted to NULL instead of ''?
   * @var boolean $null
   */
  public $null = false;
  
  /**
   * @brief Should be new lines in this column converted to any HTML?
   * @var boolean|string $new_line
   */
  public $new_line;
  
  
  
  
  
  
  
  
  
  
  
  /**
   * @brief Constructor takes column string from parser and parse it for name and parameters and prepare all parameters.
   * @param string $column_string Full long column string form parser
   * @return void
   */
  
  public function __construct($column_string){
    $this->parseNameParam($column_string); // Parsing and setting column name and parameter string
    
    $this->paramType(); // Parsing and setting datatype of column
    $this->paramNull(); // Parsing and setting empty values replacing with NULL of column
    
    if($this->param == 'text'){ // Replacing new lines will fit for text columns only...
      $this->paramNewLine(); // Parsing and setting replacing new lines
    }
  }
  
  
  
 
  
  /**
   * @brief Formatting value in method parameter accoring to settings of this column.
   * @param string $value Desired value for formatting
   * @return mixed Output according to settings of this column (i.e.: date, text, NULL etc.)
   */
  
  public function formatValue($value){
    if($this->null AND $value == ''){ // If this column should replace NULL and value is empty...
      return 'NULL'; // ...then value is just NULL
    }
    
    $method_name = 'format'.ucfirst($this->type); // Method name is format*Datatype*()
    
    return $this->$method_name($value); // Returns formatted output of value according to this column datatype
  }
  
  
  
  
  
  /**
   * @brief Parsing and setting name and parameters string for this column.
   * @param string $column_string Full long column string form parser
   * @return void
   */
  
  public function parseNameParam($column_string){
    $split = preg_split('/%/', $column_string); // Spliting column string by %

    $this->name = @trim($split[0]); // The first part is column name
    $this->param = @trim($split[1]); // The second part is column parameter string
  }
 
  
  
  
  
  /**
   * @brief Parsing and setting column data type.
   * @return void
   */
  
  public function paramType(){
    if(preg_match('/(int|integer)/', $this->param)){ // If parameter string includes "int" or "integer"...
      $this->type = 'int'; // Sets column type "int"
    }
    
    if(preg_match('/(float|real|double)/', $this->param)){ // If parameter string includes "float" (or aliases "real" or "double")...
      $this->type = 'float'; // Sets column type "float"
    }
    
    if(preg_match('/date/', $this->param)){ // If parameter string includes "date"...
      $this->type = 'date'; // Sets column type "date"
    }
   
    
    if(preg_match('/time/', $this->param) AND !preg_match('/datetime/', $this->param)){ // If parameter string includes "time" (not "datetime"!)...
      $this->type = 'time'; // Sets column type "time"
    }
    
    if(preg_match('/datetime/', $this->param)){ // If parameter string includes "datetime"...
      $this->type = 'datetime'; // Sets column type "datetime"
    }
  }
  
  
  
  
  
  /**
   * @brief Checking and setting replacing empty values for NULL in column parameter string.
   * @return void
   */
  
  public function paramNull(){
    if(preg_match('/null/', $this->param)){
      $this->null = true;
    } 
  }
  
  
  
  
  
  /**
   * @brief Checking and setting replacing empty values for NULL in column parameter string.
   * @return void
   */
  
  public function paramNewLine(){
    if(preg_match('/br[^x]/', $this->param)){ // If parameter string includes "br" (not "brx")...
      $this->new_line = '<br>'; // String for new line is set to HTML <br>
    } 
    
    if(preg_match('/brx/', $this->param)){ // If parameter string includes "brx"...
      $this->new_line = '<br />'; // String for new line is set to XHTML <br />
    }
  }
  
  
  
  
  
  /**
   * @brief Formatting value for text/varchar column.
   * @param string $value Value to be formatted
   * @return string String output
   */ 
  
  public function formatText($value){
    
    $value = trim($value); // Trimming spaces of value
    $value = $this->replaceNewLine($value); // Replacing new lines for text (if needed)   
    $value = mysql_escape_string($value); // PHP string escaping for SQL
    
    return "'".$value."'"; // Return text in apostrophes for SQL
  }
 
  
  
  
  
  /**
   * @brief Formatting (and rounding) value for integer column.
   * @param string $value Value to be formatted
   * @return integer Integer output
   */ 
  
  public function formatInt($value){
    $value = preg_replace('/\s/', '', $value); // Replacing thousands separator
    $value = round($value); // Rounding number
    
    return (int) $value; // Returning integer
  }
  
  
  
  
  
  /**
   * @brief Formatting value for float column.
   * @param string $value Value to be formatted
   * @return float Float output
   */ 
  
  public function formatFloat($value){
    $value = preg_replace('/,/', '.', $value); // Replacing decimal comma with decimal dot
    $value = preg_replace('/\s/', '', $value); // Replacing thousands separator
    
    return (float) $value; // Returning float
  }
  
  
  
  
  
  /**
   * @brief Formatting value for datetime column.
   * @param string $value Value to be formatted
   * @return string Output datetime
   */
  
  public function formatDatetime($value){
    return "'".date('Y-m-d H:i:s', strtotime($value))."'";  // Return datetime value for datetime database column
  }
  
 
  
  
  
  /**
   * @brief Formatting value for date column.
   * @param string $value Value to be formatted
   * @return string Date output
   */ 
  
  public function formatDate($value){
    return "'".date('Y-m-d', strtotime($value))."'";  // Return date value for date database column
  }
  
  
  
  
  
  /**
   * @brief Formatting value for time column.
   * @param string $value Value to be formatted
   * @return string Time output
   */ 
  
  public function formatTime($value){
        return "'".date('H:i:s', strtotime($value))."'";  // Return time value for time database column
  }

  
  
  
  
  /**
   * @brief Replacing new lines in string value if needed.
   * @param string $value Value for new lines replacing
   * @return string Value with new lines replaced
   */
  
  public function replaceNewLine($value){
    if($this->new_line !== false){ // Should value of this column replace new lines?
      $value = preg_replace('/\n/', $this->new_line, $value); // Replacing new lines with stored string
    }
    
    return $value; // Returning value with new lines replaced
  }
    
  
}