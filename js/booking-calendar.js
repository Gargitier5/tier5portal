(function($){
	
	var Booking_Calendar = function(year, month){
		$.ajax({
			url: BASE_URL + 'ajax/requests/booking_calendar',
			type: 'POST',
			data: {year: year, month: month},
			success: function(html){
				$('#calendar_div').html(html);
			}
		});
	}
	$(function(){		
		$(document).delegate('.cal-navi', 'click', function(){
            var year = $(this).data('year');
            var month = $(this).data('month');
            Booking_Calendar(year, month);
        });

        $(document).delegate('.month_dropdown', 'change', function(){
            var year = $('.year_dropdown').val();
            var month = $('.month_dropdown').val();
            Booking_Calendar(year, month);
        });

        $(document).delegate('.year_dropdown', 'change', function(){
            var year = $('.year_dropdown').val();
            var month = $('.month_dropdown').val();
            Booking_Calendar(year, month);
        });

        $(document).delegate('.date_cell', 'click', function(){
            if($('.date_cell').hasClass('end')){
                $('.date_cell').removeClass('start');
                $('.date_cell').removeClass('end');
                $('.date_cell').removeClass('date-selected');
            }
            if($('.date_cell').hasClass('date-selected')){
                $(this).addClass('date-selected end');
                var start = new Date($('.start').data('date')).getTime();
                var end = new Date($('.end').data('date')).getTime();
                if(start > end){
                    $("li.start").prevUntil("li.end").addClass('date-selected');
                    var start = $('.end').data('date');
                    var end = $('.start').data('date');
                }else if(start < end){
                    $("li.start").nextUntil("li.end").addClass('date-selected');
                    var start = $('.start').data('date');
                    var end = $('.end').data('date');
                }
                if($('.date-selected').hasClass('bc-booked')){
                    $('.date_cell').removeClass('start');
                    $('.date_cell').removeClass('end');
                    $('.date_cell').removeClass('date-selected');
                    $('.bc-booked').removeClass('date-selected');
                }else{
                    //console.log('Check in: ' + start);
                    //console.log('Check out: ' + end)
                    var event_id = $(this).data('event');
                   // alert(event_id);
                    /*var modal = $('#booking_modal');*/
                    /*modal.modal();*/                           
                    $.ajax({
                        url: BASE_URL + '/ajax/requests/get_event',
                        type: 'POST',
                        data: {event_id: event_id},
                        success: function(response){
                          
                           console.log(response);
                           response = $.parseJSON(response);
                            var modal = $('#booking_modal');
                           /* modal.find('form input[type=hidden][name=checkinHidden]').val(start);
                            modal.find('form input[type=hidden][name=checkoutHidden]').val(end);
                            modal.find('form input[type=hidden][name=villaidHidden]').val(villa.id);
                            modal.find('form input[type=hidden][name=villaMinPriceHidden]').val(villa.min_price);
                            modal.find('form input[type=text][name=check_in]').val(moment(start).format('MMMM DD, YYYY'));
                            modal.find('form input[type=text][name=check_out]').val(moment(end).format('MMMM DD, YYYY'));
                            modal.find('form .estimate').text('Total: $' + response);*/
                            modal.find('#emp_name').text(response.data.name);
                            modal.find('#event_info').text(response.data.event_informations);
                            modal.modal();
                        }
                    });
                }
            }else{
                $(this).addClass('date-selected start');
            }
        });
	});
})(jQuery);