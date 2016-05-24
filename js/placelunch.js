$(document).ready(function() {




$('#selectshop_id').on('change', function() {
  var shopid= $("#selectshop_id").val();
  //alert(shopid);
  if(shopid)
  {
   $.post('admin_control/admin/getitembyshop',{shopid:shopid}, function(data){
     $('#item_of_employee').html(data);
      //alert(data)
    });
  }
  else
  {
    $('#item_of_employee').html("");
  }
});



window.addorremove = function(id,cost)
  {

      var btnvalue=$('#btnadd_'+id).val();
          var item=$('#item_name_'+id).text();
          var limit=$('#item_limit_'+id).val();
          var cost=$('#item_cost_'+id).text();
      if(btnvalue=='Add')
      {

          
          //calculation of cost
          var total_costof_lunch=parseInt($('#total_cost_lunch').text());
          var totalcost_per_item=parseInt(limit*cost);
          var cost_total=parseInt(total_costof_lunch+totalcost_per_item);
          //calculation of item
          var total_itemof_lunch=$('#total_item_lunch').text();
          var item_total=total_itemof_lunch+item+"["+limit+"]";
          //$('#total_item_lunch').html(item_total);
          $('#total_item_lunch').append('<span id="itemqty_'+id+'">'+item+'</span><span id="itm_'+id+'">('+limit+')</span>');
          
          
          $('#total_cost_lunch').html(cost_total);
          $('#total_cost_lunch1').val(cost_total);
          $('#btnadd_'+id).val('Remove');
          $('#item_limit_'+id).prop('disabled', true);

      }
      else
      {

           var total_costof_lunch=parseInt($('#total_cost_lunch').text());
           var totalcost_per_item=parseInt(limit*cost);
           var cost_total=parseInt(total_costof_lunch-totalcost_per_item);
           


           $('#itm_'+id).remove();
           $('#itemqty_'+id).remove();
           $('#total_cost_lunch').html(cost_total);
           $('#btnadd_'+id).val('Add');
           $('#item_limit_'+id).prop('disabled', false);
      }
     
  }

$('#submit_lunch').click(function(){

var emp_id=$('#emp_name').val();
var shop=$('#selectshop_id').val();
var data1=shop.split(",");  
var shop_id=data1[0];
var shop_name=data1[1];
var total_item=$.trim($('#total_item_lunch').text());
var total_cost=$('#total_cost_lunch').text();

if(emp_id && shop_id && shop_name && total_item && total_cost)
{
	

	
	$.post('admin_control/admin/sublorder',{emp_id:emp_id,shop_id:shop_id,shop_name:shop_name,total_item:total_item,total_cost:total_cost}, function(data){
       window.location.reload();
    });
}


});


});