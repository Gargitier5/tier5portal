function getname()
{
	var getname=$('#name').val();
	//alert(getname);
	var getdate=$('#sdate').val();
	$.post('admin_control/admin/getbdmbyname', {getname:getname}, function(data){
     //alert(data);
     $('#bdmact').html(data);
	});

}

function getdate()
{
	var getdate=$('#sdate').val();
	$.post('admin_control/admin/getbdmbydate', {getdate:getdate}, function(data){
     //alert(data);
     $('#bdmact').html(data);
	});
	//alert(getdate);
}

function getvalue()
{
	var search=$('#search').val();
	if(search)
	{
		$.post('admin_control/admin/searchbox', {search:search}, function(data){
           //alert(data);
           $('#bdmact').html(data);
	    });
	}
}

function changestep1(act_id)
{
	
	var radios = document.getElementsByName('contact');

   for (var i = 0, length = radios.length; i < length; i++)
   {
    if (radios[i].checked) {
        
       var step1=(radios[i].value);
       $.post('admin_control/admin/changestep1', {step1:step1,id:act_id}, function(data){
          if(data)
          {
          window.location.reload();
          }
       });
       
    }
   }
}

function changestep2(act_id)
{
	
	var radios = document.getElementsByName('status2');
    for (var i = 0, length = radios.length; i < length; i++)
   {
    if (radios[i].checked) {
        
       var step2=(radios[i].value);
       
       $.post('admin_control/admin/changestep2', {step2:step2,id:act_id}, function(data){
          if(data)
          {
          window.location.reload();
          }
       });
       
    }
   }
}

function changestep3(act_id)
{
	
	var radios = document.getElementsByName('status3');
    for (var i = 0, length = radios.length; i < length; i++)
   {
    if (radios[i].checked) {
        
       var step3=(radios[i].value);
       
       $.post('admin_control/admin/changestep3', {step3:step3,id:act_id}, function(data){
         //alert(data);

          if(data)
          {
          window.location.reload();
          }
       });
       
    }
   }
}


