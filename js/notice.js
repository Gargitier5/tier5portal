/*$(document).ready(function(){

	alert('hi');

});*/

function delete_notice(noticeid)
{
  //alert(noticeid);
  var conf=confirm("You Want To Delete This Notice !");
	if(conf)
	{
        var res= $.ajax({
        type : 'post',
        url : 'admin_control/admin/deletenotice',
        data : 'noticeid='+noticeid,
        async : false,
        success : function(msg)
	        {
	            if(msg)
	            {
	                window.location.reload();   	 	
	            } 
	        }
        });

	}

}


function edit_notice(noticeid,date,subject,notice)
{
   $('#edit_note').show();
   $('#noticeid').val(noticeid);
   $('#subject').val(subject);
   $('#notice').val(notice);
   
}

function change_status(noticeid,status)
{
	if(status ==0)
	{
		newstatus=1;
	}
	else
	{
		newstatus=0;
	}

	var res= $.ajax({
        type : 'post',
        url : 'admin_control/admin/change_notice',
        data : 'newstatus='+newstatus+'& noticeid='+noticeid,
        async : false,
        success : function(msg)
	        {
	            if(msg)
	            {
	                window.location.reload();   	 	
	            } 
	        }
        });
}