$(document).ready(function(){

  /*$("#click").click(function(){
        $("#add_div").toggle();
    });*/


  
});

 function changestatus(budget)
 {

   $.post('admin_control/admin/changebudget',{budget:budget}, function(data){
     if(data)
      {
      	//alert(data);
      	window.location.reload();
      }
   });
	
 }

 function edit_badge(budget)
 {
  
  $('#badge_'+budget).hide();
  $('#input'+budget).show();
  $('#sub'+budget).show();
  
    //alert(budget);
 }