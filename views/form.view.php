<div class="alert alert-info">
  <i class="fa fa-floppy-o"></i> Everything you write in fields below will be stored in browser's local storage for your next return.
</div>





<div class="row">
  
  
  
  
  
  <div class="col-md-6">
    <h2 class="color-xls">
      <i class="fa fa-sign-in"></i> Excel Input
    </h2>
    
    
    <form action="#" method="post" id="form-main">  
      <label for="excel-input">Copy 'n' paste your Excel table here:</label>
      <textarea name="excel_input" id="excel-input" class="form-control form-save"><?php echo @$_POST['excel_input']; // Prints input after form submitting ?></textarea>

      <div class="center">
        <button type="submit" class="btn btn-primary btn-lg">
          <i class="fa fa-database"></i> Gimme SQL!
        </button>
      </div>
    </form>
  </div>
  
  
  
  
  
  <div class="col-md-6">
    <h2>
      <i class="fa fa-sign-out"></i> SQL Output
    </h2>
    
    <label for="sql-output">Voilà, here is your SQL insert queries:</label>
    <textarea name="sql_output" id="sql-output" class="form-control form-save" readonly><?php if(is_a($this->data, 'models\Table')) echo $this->data->toSql(); // Generated SQL queries ?></textarea>

    
    <?php if(!empty($this->data->rows)){ // If there are any processed data rows... ?>
      <div class="right">
        <small>
          Generate <?php echo count($this->data->rows); // Count of data rows ?> queries took <?php echo round(elapsedTime(), 3); // Elapsed time from script start ?> seconds.
        </small>
      </div>
    <?php } ?>
    
    
    <br />
    
    
    <div class="center">
      <div class="btn btn-default" onclick="$('#sql-output').select();">
        <i class="fa fa-i-cursor"></i> Select all SQL
      </div>
    </div>
  </div>
  
  
  
  
  
</div>
