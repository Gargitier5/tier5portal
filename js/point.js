/*$(function() {
  $('.monthYearPicker').datepicker({
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'MM yy'
  }).focus(function() {
    var thisCalendar = $(this);
    $('.ui-datepicker-calendar').detach();
    $('.ui-datepicker-close').click(function() {
var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
thisCalendar.datepicker('setDate', new Date(year, month, 1));
    });
  });
});*/


$(function() {
  $('.monthYearPicker').datepicker({
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'MM yy',
    altField: '#datecheck',
    altFormat: 'yy-mm-dd'
  }).focus(function() {
    var thisCalendar = $(this);
    $('.ui-datepicker-calendar').detach();
    $('.ui-datepicker-close').click(function() {
var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
thisCalendar.datepicker('setDate', new Date(year, month, 1));
var start_date=$('#datecheck').val();

var dat_chk=start_date.split('-');

var date = new Date();
var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
var lastDay = new Date(dat_chk[2], dat_chk[1], 0);
var month1=lastDay.getMonth() + 1;
var day1=lastDay.getDate();
if(day1<10)
{
  day1='0'+day1;
}
if(month1<10)
{
  month1='0'+month1;
}
var end_date = year + '-' + (month1) + '-' + (day1);
//$('#end_date').html(end_date);
$('#endofmonth').val(end_date);
          
    });
  });
  
});

function editpoint(po_id)
{
    alert(po_id);
}