//http://stackoverflow.com/questions/34876998/how-to-continue-timer-after-page-is-refreshed
$(document).ready(function(){




setInterval(function(){ chk_time() }, 1000);


function chk_time()
{
  var time_remains=$('.break_span').text();
  var data2=time_remains.split(':'); 
  //alert(time_remains);
  if(time_remains!='')
  {
 
    if(data2[0]=="00" && data2[1]=="00" && data2[2]=="00")
    {
         //alert('hi');
       //clearInterval(time_remains);
       $('.break_span').html("");
      $.post('employee_control/employee/breakcheck',function(data){

      if(data)
      {
          var dataa=data.split('+');
          $('#clockout_btn').attr('disabled','disabled');
          var data1=dataa[0].split(','); 
          $('#breakstart_'+data1[1]).text("Work");
          var data2=data1[0].split(':');         
            
         if(data1[1]==1)
          {
            $('#breakstart_2').attr('disabled', 'disabled');
            $('#breakstart_3').attr('disabled', 'disabled');   
          }
          else if(data1[1]==2)
          {
            $('#breakstart_1').attr('disabled', 'disabled');
            $('#breakstart_3').attr('disabled', 'disabled'); 
          }
          else if(data1[1]==3)
          {
            $('#breakstart_1').attr('disabled', 'disabled');
            $('#breakstart_2').attr('disabled', 'disabled');  
          }
          else
          {
            $('#breakstart_1').removeAttr('disabled');
            $('#breakstart_2').removeAttr('disabled');
            $('#breakstart_3').removeAttr('disabled');
          }

          if(dataa[1]==0)
          {
                $('#hm_timer'+data1[1]).countdowntimer({
                hours : data2[0],
                minutes :data2[1],
                seconds:data2[2],
                pauseButton : 'breakstart_'+data1[1]

                });
          }
          else
          {
                 var counter = dataa[2],
                 cDisplay = document.getElementById('counterr'+data1[1]);
                 format = function(t) {
                 var minutes = Math.floor(t/60);
                     if(minutes>59)
                     {
                       minutes=Math.floor(minutes % 60);
                     }
                     seconds = Math.floor(t % 60);
                     hours=Math.floor(t/3600);
                     hours = (hours < 10) ? "0" + hours.toString() : hours.toString();
                     minutes = (minutes < 10) ? "0" + minutes.toString() : minutes.toString();
                     seconds = (seconds < 10) ? "0" + seconds.toString() : seconds.toString();
                     cDisplay.innerHTML = hours + ":" +minutes + ":" + seconds ;
                 };
                setInterval(function() {
                   counter++;
                   format(counter);
                },1000);
               
          }
      }  
  



});
      
       
    }
  }
}
 $.post('employee_control/employee/wmodecheck',function(data){
      if(data) 
      {
       var data1=data.split(",");  
        //var totalSeconds = data1[3];
        var counter = data1[3],
                 cDisplay = document.getElementById('timerr');
                 format = function(t) {
                 var minutes = Math.floor(t/60);
                     if(minutes>59)
                     {
                       minutes=Math.floor(minutes % 60);
                     }
                     seconds = Math.floor(t % 60);
                     hours=Math.floor(t/3600);
                     hours = (hours < 10) ? "0" + hours.toString() : hours.toString();
                     minutes = (minutes < 10) ? "0" + minutes.toString() : minutes.toString();
                     seconds = (seconds < 10) ? "0" + seconds.toString() : seconds.toString();
                     cDisplay.innerHTML = hours + ":" +minutes + ":" + seconds ;
                 };
                setInterval(function() {
                   counter++;
                   format(counter);
                },1000);
      }  
    
 


 });



 $.post('employee_control/employee/breakcheck',function(data){

      if(data)
      {
          var dataa=data.split('+');
          $('#clockout_btn').attr('disabled','disabled');
          var data1=dataa[0].split(','); 
          $('#breakstart_'+data1[1]).text("Work");
          var data2=data1[0].split(':');         
            
         if(data1[1]==1)
          {
            $('#breakstart_2').attr('disabled', 'disabled');
            $('#breakstart_3').attr('disabled', 'disabled');   
          }
          else if(data1[1]==2)
          {
            $('#breakstart_1').attr('disabled', 'disabled');
            $('#breakstart_3').attr('disabled', 'disabled'); 
          }
          else if(data1[1]==3)
          {
            $('#breakstart_1').attr('disabled', 'disabled');
            $('#breakstart_2').attr('disabled', 'disabled');  
          }
          else
          {
            $('#breakstart_1').removeAttr('disabled');
            $('#breakstart_2').removeAttr('disabled');
            $('#breakstart_3').removeAttr('disabled');
          }

          if(dataa[1]==0)
          {
                $('#hm_timer'+data1[1]).countdowntimer({
                hours : data2[0],
                minutes :data2[1],
                seconds:data2[2],
                pauseButton : 'breakstart_'+data1[1]

                });
          }
          else
          {
                 var counter = dataa[2],
                 cDisplay = document.getElementById('counterr'+data1[1]);
                 format = function(t) {
                 var minutes = Math.floor(t/60);
                     if(minutes>59)
                     {
                       minutes=Math.floor(minutes % 60);
                     }
                     seconds = Math.floor(t % 60);
                     hours=Math.floor(t/3600);
                     hours = (hours < 10) ? "0" + hours.toString() : hours.toString();
                     minutes = (minutes < 10) ? "0" + minutes.toString() : minutes.toString();
                     seconds = (seconds < 10) ? "0" + seconds.toString() : seconds.toString();
                     cDisplay.innerHTML = hours + ":" +minutes + ":" + seconds ;
                 };
                setInterval(function() {
                   counter++;
                   format(counter);
                },1000);
               
          }
      }  
  



});

$.post('employee_control/employee/breakdis',function(data){
      var data1=data.split(",");
      for(i=0; i<data1.length-1; i++)
      { 
        data2= data1[i];
        for(x=1; x<=data2; x++)
        {
        $('#breakstart_'+x).attr("disabled", 'disabled');
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
             $('#item_limit_'+id).attr('disabled', 'disabled');
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
           $('#item_limit_'+id).removeAttr('disabled');

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
            $('#breakstart_2').attr('disabled', 'disabled');
            $('#breakstart_3').attr('disabled', 'disabled');
            $('#clockout_btn').attr('disabled', 'disabled');
          }
          else if(breakid==2)
          {
            $('#breakstart_1').attr('disabled', 'disabled');
            $('#breakstart_3').attr('disabled', 'disabled');
            $('#clockout_btn').attr('disabled', 'disabled');
            
          }
          else if(breakid==3)
          {
            $('#breakstart_1').attr('disabled', 'disabled');
            $('#breakstart_2').attr('disabled', 'disabled');
            $('#clockout_btn').attr('disabled', 'disabled');
          }
          else
          {
            $('#breakstart_1').removeAttr('disabled');
            $('#breakstart_2').removeAttr('disabled');
            $('#breakstart_3').removeAttr('disabled');
            $('#clockout_btn').removeAttr('disabled');

          }
        
        }               
    });

     $.post('employee_control/employee/checkwork',function(data){
     
    window.location.reload();   

    }); 
  }
  else
  {
      $.post('employee_control/employee/checkstastuswork',function(data){
         
      });

     $.post('employee_control/employee/endbreak', {breakid:breakid},function(data){//inserting 0 in breakstatus column in attendence table 
        if(data)
        { 

          window.location.reload();       
        }



     });
  }
}

       /* var totalSeconds = 0;
        var hoursLabel = document.getElementById("hours");
        var minutesLabel = document.getElementById("minutes");
        var secondsLabel = document.getElementById("seconds");
      function workingmode()
      {
        
      
        setInterval(setTime, 1000);
      }

        function setTime()
        {
            ++totalSeconds;
            secondsLabel.innerHTML = pad(totalSeconds%60);
            minutesLabel.innerHTML = pad(parseInt(totalSeconds/60));
            hoursLabel.innerHTML = pad(parseInt(totalSeconds/3600));
            
        }

        function pad(val)
        {
            var valString = val + "";
            if(valString.length < 2)
            {
                return "0" + valString;
            }
            else
            {
                return valString;
            }
        }*/



