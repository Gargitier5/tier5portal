//http://stackoverflow.com/questions/34876998/how-to-continue-timer-after-page-is-refreshed
$(document).ready(function(){


 $.post('employee_control/employee/breakcheck',function(data){
  if(data)
  {
    $('#clockout_btn').prop('disabled', true);
    var data1=data.split(','); 
    $('#breakstart_'+data1[1]).text("Work");
    var data2=data1[0].split(':'); 
    $('#hm_timer'+data1[1]).countdowntimer({
          hours : data2[0],
          minutes :data2[1],
          seconds:data2[2],
          pauseButton : 'breakstart_'+data1[1]
          });


    if(data1[1]==1)
          {
            $('#breakstart_2').prop('disabled', true);
            $('#breakstart_3').prop('disabled', true);

            
          }
          else if(data1[1]==2)
          {
            $('#breakstart_1').prop('disabled', true);
            $('#breakstart_3').prop('disabled', true);
            
          }
          else if(data1[1]==3)
          {
            $('#breakstart_1').prop('disabled', true);
            $('#breakstart_2').prop('disabled', true);
            
          }
          else
          {
            $('#breakstart_1').prop('disabled', false);
            $('#breakstart_2').prop('disabled', false);
            $('#breakstart_3').prop('disabled', false);

          }
  }
});

$.post('employee_control/employee/breakdis',function(data){

    //alert(data);
       $('#clockout_btn').prop('disabled', false);
      var data1=data.split(",");
      for(i=0; i<data1.length-1; i++)
      { 
        data2= data1[i];
        for(x=1; x<=data2; x++)
        {
        $('#breakstart_'+x).prop("disabled", true);
        }
      }
  });




$('#prev').click(function(){
  $('#total_cost').html('00');
  $('#total_item').html('');
  $('#item_display').hide();
  $('#shop_display').show();
});
 

  $('#no-clockout').click(function(event){
      event.preventDefault(); 
      $("#clockout .close").click();
    });


$('#show_lunch').click(function(){
  $('#myModal').modal('show');
   $('#shop_display').show();
    $('#succmsg').html('');
});


    $('#submitorder').click(function(){
     var item=$('#total_item').text();
     var cost=$('#total_cost').text();
     var shopname=$('#shop_name').text();
     var shopid=$('#shop_id').text();

    if(item && cost && shopname && shopid)
    {
      $.post('employee_control/employee/submitlunchorder',{item:item, cost:cost, shopname:shopname, shopid:shopid},function(data){
       if(data)
       {
       $('#total_cost').html('00');
       $('#total_item').html('');
       $('#item_display').hide();

         $('#succmsg').html(data);
         $('#succmsg').css('color','red');
      }
      });
    }


    });




  });

//========On Select Shop=====================

function display_item(shop_id,shopname)
{
	//alert(shop_id);
	$('#shop_display').hide();
	
	   var res= $.ajax({
        type : 'post',
        url : 'employee_control/employee/getitem',
        data : 'shop_id='+shop_id,
        async : false,
        success : function(msg)
	        {
	            $('#itembyshop').html(msg);
	        }
        });
    $('#item_display').show();
    $('#shop_name').html(shopname);
    $('#shop_id').html(shop_id);
}




function add_item(id)
{

      var itemname=$('#item_name_'+id).text();
      var btnvalue=$('#btnadd_'+id).val();
      var itemquantity = $('#item_limit_'+id).val();
      var itemcost = $('#item_cost_'+id).text();
           
      newcost = itemquantity*itemcost;
      totalcost = $('#total_cost').text();
      totalcost = parseInt(totalcost);
      itemquantity=parseInt(itemquantity);
      totalitem = $('#total_item').text();
      
      if(btnvalue=='Add')
      {
                    totalcost = totalcost + newcost;
                    if(totalcost>100)
                    {
                      
                      $('.err_msg').css('color','red');
                      $('.err_msg').html('Your Order Cost Cannot Be More Than 100/-');
                    }
                    else
                    {
                      $('.err_msg').html('');
                    }
              $('#total_cost').text(totalcost);
              $('#btnadd_'+id).val('Remove');
              $('#total_item').append('<span id="itemqty_'+id+'">('+itemquantity+')</span><span id="itm_'+id+'">'+itemname+'</span>');
             $('#item_limit_'+id).prop('disabled', true);
      }

      else
      {
            totalcost = totalcost - newcost;
            if(totalcost<=100)
            {
              $('.err_msg').html('');
            }
            $('#itm_'+id).remove();
            $('#itemqty_'+id).remove();
            $('#btnadd_'+id).val('Add');
           $('#total_cost').text(totalcost);
           $('#item_limit_'+id).prop('disabled', false);

      } 
}



function Start_Break(breakid,duration)
{

  var button=$('#breakstart_'+breakid).text();
  
  if(button=='Start Break')
  {
    $.post('employee_control/employee/startbreak',{breakid:breakid},function(data){//inserting 0 in breakstatus column in attendence table 
      
        if(data)
        {

          var data2=duration.split(':'); 
          $('#hm_timer'+breakid).countdowntimer({
          hours : data2[0],
          minutes :data2[1],
          seconds:data2[2],
          pauseButton : 'breakstart_'+breakid
          });
          

         






          $('#breakstart_'+breakid).text("Work");
          if(breakid==1)
          {  
            $('#breakstart_2').prop('disabled', true);
            $('#breakstart_3').prop('disabled', true);
            $('#clockout_btn').prop('disabled', true);
          }
          else if(breakid==2)
          {
            $('#breakstart_1').prop('disabled', true);
            $('#breakstart_3').prop('disabled', true);
            $('#clockout_btn').prop('disabled', true);
            
          }
          else if(breakid==3)
          {
            $('#breakstart_1').prop('disabled', true);
            $('#breakstart_2').prop('disabled', true);
            $('#clockout_btn').prop('disabled', true);
          }
          else
          {
            $('#breakstart_1').prop('disabled', false);
            $('#breakstart_2').prop('disabled', false);
            $('#breakstart_3').prop('disabled', false);
            $('#clockout_btn').prop('disabled', false);

          }
        
        }               
    });
  }
  else
  {
     $.post('employee_control/employee/endbreak', {breakid:breakid},function(data){//inserting 0 in breakstatus column in attendence table 
        if(data)
        { 

          window.location.reload();       
        }



     });
  }
}