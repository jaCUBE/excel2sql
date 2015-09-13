<div class="row">
  
  
  
  
  
  <div class="col-md-6">
    <h3 class="color-xls">
      <i class="fa fa-list"></i> How to Prepare Excel Table?
    </h3>
    
    <ol>
      <li>Use <strong>the first row</strong> for database <strong>table name</strong> only.</li>
      <li>Use <strong>second row</strong> with names of table <strong>columns</strong>.</li>
      <li>Use <strong>rows 3+</strong> for your desired <strong>data</strong>.</li>
      <li><strong>Finally, copy and paste table into field below and press the big button.</strong></li>
    </ol>    
  </div>
  
  
  
  
  
  <div class="col-md-6">
    <h3 class="color-xls">
      <i class="fa fa-table"></i> Excel Format Table Example
    </h3>
    
    <table id="template-xls">
      <thead>
        <tr>
          <th>table_name</th>
          <th></th>
          <th></th>
        </tr>
        <tr>
          <th>column1_name</th>
          <th>column2_name</th>
          <th>column3_name <em>% commands</em></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>data</td>
          <td>data</td>
          <td>data</td>
        </tr>
        <tr>
          <td>data</td>
          <td>data</td>
          <td>data</td>
        </tr>
      </tbody>
    </table>
    
    <div class="right">
      <div class="btn-group">
        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#example-basic">
          Example of basic formatting
        </button>
        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#example-advanced">
          Parameters (advanced)
        </button>
      </div>
      
    </div>
    
    <?php require 'example_basic_modal.view.php'; ?>
    <?php require 'example_advanced_modal.view.php'; ?>
    
  </div>
  
  
  
  
  
</div>



