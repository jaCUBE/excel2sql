<?php

require 'bootstrap.php';

?>



<!DOCTYPE html>



<html>
  <head>
    <meta charset="UTF-8">
    <title>Excel2SQL</title>
    
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <script src="<?php echo URL; ?>/js/excel2sql.min.js"></script>
    <link href="<?php echo URL; ?>/css/excel2sql.css" rel="stylesheet">
  </head>
  
  
  <body>
    <div id="container">
      <div id="header">
        <div id="logotype">
          <a href="index.php">
            <img src="<?php echo URL; ?>/images/logotype.png" alt="Excel2SQL" />
          </a>
        </div>
      </div>
      
      <div id="content">
        Aloha!<br />
        This simple tools provides you easy way how to convert your current boring Excel table into powerful SQL powered database.
      
        
        <?php $main = new controllers\Excel2SQL(); // Controller of Excel2SQL utility ?>
      </div>
      
      
      <?php if(!empty($_POST)){ // DIV indicating form has been submitted for Javascript ?>
        <div id="submitted" style="display: none;"></div>
      <?php } ?>
      
      
      <div id="footer">
        <hr />
        
        Jakub Rychecky, 2015
      </div>


      
      

    </div>
  </body>
  
</html>
