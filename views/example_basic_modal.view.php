<div class="modal fade" id="example-basic">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        <h4 class="modal-title">Example: Basic Formatting</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          
          
          
          <div class="col-md-6">
            This should help you understand how to format your Excel table.
            <br /><br />
            Here is some sample data for table <strong>artists</strong> with columns <strong>name</strong>,
            <strong>surname</strong> and <strong>age</strong>. Three rows of data follows.
            <br /><br />
            Go on! Select table on right with cursor and copy it into clipboard then pase it into <strong>Excel Input</strong> field.
            Or use button below which will serve this for you.
          </div>
          
          
          
          <div class="col-md-6">
            <table id="template-xls">
              <thead>
                <tr>
                  <th>artists</th>
                  <th></th>
                  <th></th>
                </tr>
                <tr>
                  <th>name</th>
                  <th>surname</th>
                  <th>age</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Paul</td>
                  <td>Simon</td>
                  <td>73</td>
                </tr>
                <tr>
                  <td>Art</td>
                  <td>Garfunkel</td>
                  <td>73</td>
                </tr>
                <tr>
                  <td>Billie</td>
                  <td>Holiday</td>
                  <td>44</td>
                </tr>
              </tbody>
            </table> 
          </div>
          
          
          
        </div>
      </div>
      
      
      
      
      
      <div class="modal-footer">        
        <button type="button" class="btn btn-success" onclick="use_sample_content('basic');">Use sample table above in form</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>



 
<div id="example-content-basic">artists		
name	surname	age
Paul	Simon	73
Art	Garfunkel	73
Billie	Holiday	44</div>