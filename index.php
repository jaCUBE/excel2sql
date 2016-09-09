<?php

require 'bootstrap.php';

?>



<!DOCTYPE html>



<html>
  <head>
    <meta charset="UTF-8">
    <title>Excel2SQL</title>
    
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
    <script src="<?= URL; ?>/js/excel2sql.min.js"></script>
    <link href="<?= URL; ?>/css/excel2sql.css" rel="stylesheet">
    
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-33858105-10', 'auto');
      ga('send', 'pageview');

    </script>
  </head>
  
  
  <body>
    <div id="container">
      <div id="header">
        <div id="logotype">
          <a href="index.php">
            <img src="<?= URL; ?>/images/logotype.png" alt="Excel2SQL" />
          </a>
        </div>
      </div>
      
      
      
      
      
      <div id="content">
        Aloha!<br />
        This simple tools provides you easy way how to convert your current boring Excel table into powerful SQL powered database.
        Copy and paste your table into input, parse it and get your SQL INSERT commands. No more of annoying CSV or different method of import.
        <br /><br />
        This tool should work with any table editor and even when you are copying table straight from some webpage.
        
         
        <?php require 'views/tutorial.view.php'; ?>
        
        
        
        <?php $main = new controllers\Excel2SQL(); // Controller of Excel2SQL utility ?>
      </div>
      
      
      <?php if(!empty($_POST)){ // DIV indicating form has been submitted for Javascript ?>
        <div id="submitted" style="display: none;"></div>
      <?php } ?>
      
      
        
        
        
      <div id="footer">
        2015
      </div>


      
      

    </div>
  </body>
  
</html>
