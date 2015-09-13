<div class="modal fade" id="example-advanced">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        <h4 class="modal-title">Example: Advanced Formatting</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          
          
          
          <div class="col-md-6">
            In default behavior, every value is surrounded by quotes, so it behaves like text, which
            is fine for <em>text</em> or <em>varchar</em> types in your database.
            
            <br /><br />
            
            However, you may need to use special formatting for some columns. You can use some parameters
            after <strong>%</strong> character in each Excel input column name. Example on the right shows how to do it.

            <br /><br />
            
            <strong>List of column parameters:</strong>
            <ul>
              <li><strong>%int</strong> Value will have no quotes and it will be rounded for <em>int</em> database format (alias: %integer).</li>
              <li><strong>%float</strong> Value will have no quotes and it decimal commas will be replaced with decimal dots for <em>float</em> database format (alias: %real).</li>
              <li><strong>%date</strong> Value will be formatted as MySQL <em>date</em>, (cell value will be parsed by <em>strtotime()</em> PHP function).</li>
              <li><strong>%datetime</strong> Value will be formatted as MySQL <em>datetime</em>, (cell value will be parsed by <em>strtotime()</em> PHP function).</li>
              <li><strong>%time</strong> Value will be formatted as MySQL <em>time</em>, (cell value will be parsed by <em>strtotime()</em> PHP function).</li>
              <li><strong>%null</strong> Empty value will be returned as <em>NULL</em>, instead of empty string like in default way.</li>
              <li><strong>%br</strong> Replaces new lines in column for HTML <em>&lt;br&gt;</em>.</li>
              <li><strong>%brx</strong> Replaces new lines in column for XHTML <em>&lt;br /&gt;</em>.</li>
            </ul>
          </div>
          
          
          
          <div class="col-md-6">
            <table id="template-xls">
              <thead>
                <tr>
                  <th>artists</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
                <tr>
                  <th>name</th>
                  <th>surname</th>
                  <th>band&nbsp;%null</th>
                  <th>birth&nbsp;%date</th>
                  <th>albums&nbsp;%int</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Mark</td>
                  <td>Knopfler</td>
                  <td>Dire Straits</td>
                  <td>12.8.1949</td>
                  <td>8</td>
                </tr>
                <tr>
                  <td>David</td>
                  <td>Bowie</td>
                  <td></td>
                  <td>8 January 1947</td>
                  <td>26</td>
                </tr>
                <tr>
                  <td>David</td>
                  <td>Gilmour</td>
                  <td>Pink Floyd</td>
                  <td>1946/03/06</td>
                  <td>4</td>
                </tr>
              </tbody>
            </table> 
          </div>
          
          
          
        </div>
      </div>
      
      
      
      
    

      
      
      
      
      
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="use_sample_content('advanced');">Use sample table above in form</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>



<div id="example-content-advanced">artists				
name	surname	band %null	birth %date	albums %int
Mark	Knopfler	Dire Straits	12.8.1949	8
David	Bowie		8 January 1947	26
David	Gilmour	Pink Floyd	1946/03/06	4</div>