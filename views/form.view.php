<div class="row">
  
  
  
  
  
  <div class="col-md-6">
    <h2 class="color-xls">
      <i class="fa fa-sign-in"></i> Excel Input
    </h2>
    
    
    <form action="#" method="post" id="form-main">  
      <label for="excel-input">Copy 'n' paste your Excel table here:</label>
      <textarea name="excel_input" id="excel-input" class="form-control form-save"><?php echo $_POST['excel_input']; ?></textarea>

      <div class="center">
        <button type="submit" class="btn btn-primary btn-lg">
          Parse to SQL!
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

    <div class="center">
      <div class="btn btn-default" onclick="$('#sql-output').select();">
        Select all SQL
      </div>
    </div>
  </div>
  
  
  
  
  
</div>