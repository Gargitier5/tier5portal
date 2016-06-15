$(document).ready(function(){

	//alert('hi');

});

function myFunction() {
	var date=$('#demo-1').val();
	$.post('admin_control/admin/productivitymonth', {date:date}, function(data){    
      if(data)
      {
      	
      	//alert(data);
         
      	$('#monthproductivity').html(data);
      	
      }
           
    });

}
