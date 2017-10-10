$('document').ready(function(){

	
	$('.login').on('click',function(){


		var email = $('.email').val();
		var password = $('.password').val();

		var btn = $(this);

		$.ajax({

			url : ajax_url+'login/login',
			type: 'POST',
			data : {email:email,password:password},
			beforeSend : function() {

				btn.attr('disabled','disabled');
				btn.html('wait..');
				$('.form-error').hide();
				$('.form-error').html('');
			},
			success : function(html) {	

				console.log(html);

				btn.removeAttr('disabled');
				btn.html('Login');
				var data = $.parseJSON(html);

				if (data.status=='success') {

					window.location = ajax_url+'dashboard';

				} else {

					$('.form-error').show();

					$('.form-error').html(data.error);

				}
			}

		});


		return false;
	});


	$('.running').on('click',function(){
		var btn = $(this);

		var state = btn.attr('data-state');

		change_mining_status(state,btn);


		return false;

	});



	$('.not-running').on('click',function(){

		var btn = $(this);
		var state = btn.attr('data-state');

		change_mining_status(state,btn);

	});

	$('.show-admin-div').on('click',function(){

		$('.show-hide').toggleClass('send-bdc-div');
	});

	$('#bdc-price').on('keyup',function(){

		var price      = $(this).val();
		var base_price = $(this).attr('data-price');


		if (price=='') {


			$('#bdc-amount').val('');
			return false;

		}
		if (base_price=='') {

			alert("Please do not modify the base price !");
			$('#bdc-amount').val('');
			return false;

		}

		var total_coins = price/base_price;

		$('#bdc-amount').val(total_coins);

	});


	$('.send-bdc-btn').on('click',function(){

		var coins = $('#bdc-amount').val();
		var address = $('#bdc-address').val();
		var btn = $(this);

		if (coins<=0) {

			alert('Pease enter some coin !');
			$('#bdc-price').val();
			return false;
		}
		if (address=='') {

			alert('Pease enter valid BDC Address!');
			return false;
		}

		$.ajax({


			type:'POST',
			url : ajax_url+'dashboard/send_bdc',
			data: {coins:coins,address:address},
			beforeSend:function() {
				btn.html('validating...');
				$('.dbc-error').html('');
				$('.success-msg').hide();


			},
			success:function(html){

				btn.html('Send BDC');

				var data =$.parseJSON(html);
				if (data.status=='success') {

					$('.success-msg').html('Successfully send transaction !');
					$('.success-msg').show();
					$('#bdc-amount').val('');
					$('#bdc-address').val('');
					$('#bdc-price').val('');


				} else {


					$('.dbc-error').html(data.result);
				}

			}


		});


		return false;

	});














});


function change_mining_status(state,btn) {

	$.ajax({

			type: 'POST',
			url : ajax_url+'dashboard/control_mining',
			data : {mining:state},
			beforeSend:function() {
				btn.html('wait...')
			},
			success:function(html) {

				console.log(html);

				if (html=='success') {

					if (state=='running') {
						
						btn.html('Start Mining');
						btn.removeClass('btn-primary');
						btn.removeClass('running');
						btn.addClass('not-running');
						btn.addClass('btn-danger');
						btn.attr('data-state','not-running');
					} else {

						btn.html('Stop mining');
						btn.removeClass('not-running');
						btn.removeClass('btn-danger');
						btn.addClass('btn-primary');
						btn.addClass('running');
						btn.attr('data-state','running');

					}

				} else {

					alert('error occured !, try later');

				}
			}
		});
}





