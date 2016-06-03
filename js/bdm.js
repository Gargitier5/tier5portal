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