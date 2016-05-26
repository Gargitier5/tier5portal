$(document).ready(function(){



   

});
function delete_event(ev_id)
{
	//alert(ev_id);
	var conf=confirm("You Want To Delete This Event !");
	if(conf)
	{
        var res= $.ajax({
        type : 'post',
        url : 'admin_control/admin/deleteevent',
        data : 'ev_id='+ev_id,
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

