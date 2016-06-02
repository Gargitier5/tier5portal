$(document).ready(function() {

$( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd'});

$('#timepicker').timepicker();
});



function reset_pass(emp_id)
{
 
         $('#newpass_'+emp_id).show();   
         $('#btn_'+emp_id).show();   
}


function reset(emp_id)
{
    var newpas=$('#newpass_'+emp_id).val();
    var res= $.ajax({
        type : 'post',
        url : 'admin_control/admin/restpass',
        data :'emp_id='+emp_id+'& new_password='+newpas,
        async : false,
        success : function(msg)
            {   
               
                 $('#msg').html('Password Reseted Successfully');
              window.location.reload();
                          
            }
        });

}

function change_work_status(emp_id)
{
 
         $('#reason_'+emp_id).show();   
         $('#click_btn_'+emp_id).show(); 
         $( '#datepicker'+emp_id ).show();  
}
function edit_employee(emp_id,name,usename,email,designation,salary)
{
    $('#edit_employee').show();
    $('#name').html(name);
    $('#username').val(usename);
    $('#emid').val(emp_id);
    $('#email').val(email);
    $('#desig').val(designation);
    $('#salary').val(salary);


}

function change_work(emp_id)
{
  var date=$( '#datepicker'+emp_id ).val();
  var reason=$( '#reason_'+emp_id ).val();
   var res= $.ajax({
        type : 'post',
        url : 'admin_control/admin/changeworkingstatus',
        data :'emp_id='+emp_id+'& reason='+reason+'& date='+date,
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

 function edit_clock(cl_id)
 {
  //alert('Hi');
   var time=$('#timepicker_'+cl_id ).val();
  
   var res= $.ajax({
        type : 'post',
        url : 'admin_control/admin/edit_clock',
        data :'cl_id='+cl_id+'& time='+time,
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
function change_clock(cl_id)
{
    $('#timepicker_'+cl_id).show();   
    $('#change_'+cl_id).show();   
}

function dlt(orderid)
{
  //alert(orderid);
  var conf=confirm("You sure you want to delete this!");
            if(conf)
            {

        var res= $.ajax({
        type : 'post',
        url : 'admin_control/admin/dltordr',
        data :'orderid='+orderid,
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

function checkdate()
{

  var showdate=$('#empactivedate').val();
  var res= $.ajax({
        type : 'post',
        url : 'admin_control/admin/getattendence',
        data :'showdate='+showdate,
        async : false,
        success : function(msg)
            {   
              $('#attend').html(msg);  
            }
        });

  var res= $.ajax({
        type : 'post',
        url : 'admin_control/admin/getfbreak',
        data :'showdate='+showdate,
        async : false,
        success : function(msg)
            {   
              $('#fbreak').html(msg);  
            }
        });

 var res= $.ajax({
        type : 'post',
        url : 'admin_control/admin/getsbreak',
        data :'showdate='+showdate,
        async : false,
        success : function(msg)
            {   
              $('#sbreak').html(msg);  
            }
        });

 var res= $.ajax({
        type : 'post',
        url : 'admin_control/admin/getlbreak',
        data :'showdate='+showdate,
        async : false,
        success : function(msg)
            {   
              $('#lbreak').html(msg);  
            }
        });

}

