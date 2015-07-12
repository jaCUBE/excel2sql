$(function(){ // jQuery, let's go! :) 
  

  if($('#submitted').length > 0){ // If form has been submitted...
    save_form(); // ...it saves whole form into local storage
  }else{
    load_form(); // Loads state of form from Javascript local storage (if there's any)
  }
    
    
  $('.form-save').change(save_form); // Every change of form inputs causes saving form into local storage    

});







function use_sample_content(type){
  var content = $('#example-content-'+type).text();
  $('#excel-input').val(content);
  $('#form-main').submit();
}



function save_form(){
  var data = {
    text: {},
    select: {},
    checkbox: {}    
  };
  
  $('.form-save').each(function(){    
    var type = get_storage_type($(this));
    
    switch(type){
      case 'text':
        var value = $(this).val();
        break;
        
      case 'checkbox':
        if($(this).attr('checked')){
          var value = 'checked';
        }else{
          var value = 'unchecked';
        }
        
        break;
        
      case 'select':
        var value = $(this).find(':selected').val();
        break;
    }
    
    data[type][$(this).attr('id')] = value;
  });
  
  localStorage.setItem('excel2sql', JSON.stringify(data));
}





function get_storage_type(element){
  if(element.attr('type') == 'text' || element.attr('type') == 'number'){
    return 'text';
  }
  
  if(element.is('textarea')){
    return 'text';
  }

  if(element.is('select')){
   return 'select';
  }

  if(element.attr('type') == 'checkbox'){
    return 'checkbox';
  } 
}






function load_form(){
  if(localStorage['excel2sql'] == null){
    return false;
  }
  
  var data = JSON.parse(localStorage['excel2sql']);
  
  $.each(data, function(type, form_group){    
    switch(type){
      case 'text': load_form_text(form_group); break;
      case 'checkbox': load_form_checkbox(form_group); break; 
      case 'select': load_form_text(form_group); break; 
    }
  });
  
  return true;
}




function load_form_text(form_text){
  $.each(form_text, function(id, value){
    $('#'+id).val(value);    
  });
}




function load_form_checkbox(form_checkbox){
  $.each(form_checkbox, function(id, value){
    if(value == 'checked'){
      $('#'+id).attr('checked', true);   
    }else{
      $('#'+id).removeAttr('checked');
    }
  });
}