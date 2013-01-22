//Main document ready
$(document).ready(function()
{

    Dialogload('#class_delete_dialog','.delete',400,'delete_input_id');
    Dialogload('#room_insert_dialog','.insert_room',400,'room_hidden_input_id');
   
    form_submit('#table_form','del_class');
    form_submit('#class_insert_form','ins_class');
    form_submit('#room_insert_form','ins_room');
    
    $('#class_modify_dialog').dialog( { autoOpen: false, draggable: false,
        								modal: true, resizable: false,
        								show: { effect: 'drop', direction: "up" } ,
        								width: 400 } );
    $('.modify_class').click(function(){    	
    	$var1=document.getElementById('hidden_class_modify_input_id').value;
    	document.getElementById('class_modify_input_id').value=$var1;
    	$var2=document.getElementById('hidden_class_level_modify_id').value;
    	document.getElementById('class_level_modify_id').value=$var2;
    	$('#class_modify_dialog').dialog('open');
    	return false;
    });    
    
});
// Open dialog function
function Dialogload(dest,butt,Dwidth,hidden_element)
{
    $( dest ).dialog( { autoOpen: false, draggable: false,
                        modal: true, resizable: false,
                        show: { effect: 'drop', direction: "up" } ,
                        width: Dwidth } );

     $(butt).click(function(){
     var element=document.getElementById(hidden_element);
     element.value=this.id;   
     $(dest).dialog('open');
      return false;
  });
}
function form_submit(submit_form,submit_dest)
{
    
     $(submit_form).submit(function()
{
    $.post("http://localhost/alaqsa/home_controller/" + submit_dest,
    $(submit_form).serialize(),
    function(data){
   document.location.replace("http://localhost/alaqsa");
});
    return false;
})
    
}