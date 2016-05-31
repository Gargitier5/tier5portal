$(document).ready(function(){

      $( ".datepicker" ).datepicker({
      dateFormat: 'yy-mm-dd',
    });



        $( "#printfinalAll" ).bind( "click", function() {
      
      var divContents = $("#print_all").html();
      //alert(divContents);
      var printWindow = window.open('', '', 'height=400,width=800');
      //printWindow.document.write('<html><head><title>DIV Contents</title>');
      //printWindow.document.write('</head><body >');
      printWindow.document.write(divContents);
      //printWindow.document.write('</body></html>');
      printWindow.document.close();
      printWindow.print();
      

    });



   $('#printselected').click(function() {
   
   var arr=[];
  
        $('input[name="print_check[]"]:checked').each ( function() {
        var id= $(this).val();
       
        if(id!='')
        {
          arr.push(id);   
        }  

        });
        if(arr=='')
        {
           $('#smallModal').modal('show');
              $('#no_select').html('Please select atleast one item.');
        }
        else
        {
          if(arr)
          {
            $.post('admin_control/admin/selectprint', {orderid:arr}, function(data){
             //alert(data);
               $('#list_print').hide();
              $('#new_print').show();
              $('#print_all').show();
              $('#print_all').html(data);
              //$('#printorderall').modal('show');
             // $('#print_all').html(data);*/
            });
          }
          
        }

   });


  $('#printorder').click(function() {
 
  var date='';
  date=$('#cur_date').val();

  
   $.ajax({

                type:'POST',
                
                url:'admin_control/admin/FnfetchAllOrder',
                //data:'date='+date,
                success:function(result)
                {
                 //alert(result);
              $('#list_print').hide();
              $('#new_print').show();
              $('#print_all').show();
              $('#print_all').html(result);
                }

             });
});

});


function print_single(orderid1)
{
    	//alert(orderid1);
       $.post('admin_control/admin/Fnsingleprint', {orderid:orderid1}, function(data){
         
         $('#new_print').show();
              $('#print_all').show();
              $('#print_all').html(data);
          
       });
  }




  
      
  function dlt(orderid)
  {
    //alert(orderid);
     $.post('admin_control/admin/dltordr', {orderid:orderid}, function(data){
          window.location.reload();
     });
  }

function checkdate()
{

  var datee=$('#date').val();
  //alert(datee);
  $.post('admin_control/admin/prevlunchorder', {date:datee}, function(data){
            
   $('#lorder').html(data);
  });

}