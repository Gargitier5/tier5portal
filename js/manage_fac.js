$(document).ready(function() {


});
function delbreak(bid)
{
  var conf=confirm("You Want To Delete This Break !");
            if(conf)
            {
             
   var res= $.ajax({
                  type : 'post',
                  url : 'admin_control/admin/deletebrk',
                  data : 'b_id='+bid,
                  async : false,
                  success : function(msg)
                   {
                   	
                   	 if(msg)
                   	 {
                   	 	window.location.reload();
                   	 	
                   	 	$('#msg').html('<font color="green">file deleted successfully</font>');
              
                   	 } 
                   	 else
                   	 {
                   	    window.location.reload();
                        $('#msg').html('<font color="green">file deleted successfully</font>');
                   	 }
                      
                   }
                  });
}
}

function editbreak(bid,bname)
{
	$('#edit_break').show();
	$('#brk_id').val(bid);
    $('#break_name_edit').val(bname);
	//$('#break_name_edit').html(bname);


}

function change_status(bid,status)
{
	var conf=confirm("You Want To Change The Status Of The Break !");
            if(conf)
            {  

               if(status==0)
               {
               	 var newstatus=1;
               }
               else
               {
               	var newstatus=0;
               }

              var res= $.ajax({
                  type : 'post',
                  url : 'admin_control/admin/change_break_status',
                  data : 'b_id='+bid+'& bstatus='+newstatus,
                  async : false,
                  success : function(msg)
                   {
                   
                   	 if(msg)
                   	 {
                   	 	window.location.reload();
              
                   	 } 
                   	 else
                   	 {
                   	    window.location.reload();
                        
                   	 }
                      
                   }
                  });
            }

}

function change_rank()
{
  $('.ranking').show();
}

function changedate()
{
  var date=$('#getdate').val();
  $.post('admin_control/admin/emplatedatecin', {date:date}, function(data){
    $('#lateclockin').html(data);
  });

  $.post('admin_control/admin/empearlyclockout', {date:date}, function(data){
    $('#earlyclockout').html(data);
   //alert(data);
  });

  $.post('admin_control/admin/breaklatedate', {date:date}, function(data){
    $('#latebreak').html(data);
  });

  $.post('admin_control/admin/empabsentdate', {date:date}, function(data){
    $('#absent').html(data);
  });
}