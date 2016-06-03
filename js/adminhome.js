$(document).ready(function()
{

firstbreak(); // This will run on page load
setInterval(function(){
    firstbreak() // this will run after every seconds
}, 1000);

secondbreak(); // This will run on page load
setInterval(function(){
    secondbreak() // this will run after every seconds
}, 1000);

thirdbreak(); // This will run on page load
setInterval(function(){
    thirdbreak() // this will run after every seconds
}, 1000);

function firstbreak(){
   $.post('admin_control/admin/firstbreaktimer',function(data){
   	//$('#firstbreak').append(data);
   $('#firstbreak').html(data);
   });
}

function secondbreak(){
   $.post('admin_control/admin/secondbreaktimer',function(data){
   	//$('#firstbreak').append(data);
   $('#secondbreak').html(data);
   });
}

function thirdbreak(){
   $.post('admin_control/admin/thirdbreaktimer',function(data){
   	//$('#firstbreak').append(data);
   $('#thirdbreak').html(data);
   });
}


});