function deleteshop (shopid) 
{
  var conf=confirm("You Want To Delete This Shop !");
  if(conf)
  {
    $.post('admin_control/admin/deleteshop', {shopid:shopid}, function(data){    
      if(data)
      {

      	//alert(data);
      	window.location.reload();
      }     
    });
   }
}


function showeshop (shopid,shopname) 
{
  //alert(shopid);

    $.post('admin_control/admin/showallitem', {shopid:shopid}, function(data){    
      if(data)
      {
      	//window.location.reload();
      	//alert(data);
         
      	$('#itemdiv').show();
      	$('#showallitem').html(data);
      	$('#nameofshop').html(shopname);
      	
      }
           
    });
}

function deleteitem(itemid,parentid)
{
	//alert(itemid);
	var conf=confirm("You Want To Delete This Item !");
    if(conf)
    {
		$.post('admin_control/admin/deleteitem', {itemid:itemid}, function(data){    
	      if(data)
	      {
	      	$('#shop_'+parentid).click();
	      	
	      }     
	    });
    }
}