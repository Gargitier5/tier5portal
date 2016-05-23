$(document).ready(function(){


});


function print_single(orderid1)
{
    	//alert(orderid1);
       $.post('admin_control/admin/Fnsingleprint', {orderid:orderid1}, function(data){
         
          /*if($.trim(data))
              {*/
                $("#printdiv").html(data);
       
                 $('#list_print').hide();
                 $('#new_print').show();
              $('#print_all').show();
              $('#print_all').html(data);
              //}
            
       });
  }

