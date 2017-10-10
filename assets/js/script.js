$('document').ready(function(){

	
	$('.login-div form').on('click','button.user-login',function(){


		var username = $('#login-form-username').val();
		var password = $('#login-form-password').val();

		var btn = $(this);

		$.ajax({

			url : ajax_url+'login/login',
			type: 'POST',
			data : {username:username,password:password},
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

	$('.otp-submit').on('click',function(){

		var otp = $('.one-time-otp').val();
		var btn = $(this);


		if (otp=='') {

			$('.otp-error').html('Please enter the OTP');
			return false;
		}

		$.ajax({

			type : 'POST',
			url : ajax_url+"login/check_otp",
			data :{otp:otp},
			beforeSend : function() {
				btn.html('wait...');
			},
			success : function(html) {
				console.log(html);

				if (html=='success') {

					window.location = ajax_url+'dashboard';

				} else {

					$('.otp-error').html('Incorrect OTP');

				}
			}
		});

		return false;
	});


	$('.create-user').on('click',function(){

		var btn = $(this);


		var form = $('#user-signup');

		var form_data = form.serialize();

		// console.log(form_data);


		$.ajax({

			type : 'POST',
			url  : ajax_url+'signup/create_user',
			data : form_data,
			beforeSend : function() {
				btn.attr('disabled','disabled');
				btn.html('Please Wait...');
				
				$('.error').hide();
			},
		error : function(jqXHR,exception) {
				console.log(jqXHR.responseText);
				var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404]';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {
		            msg = 'Requested JSON parse failed.';
		        } else if (exception === 'timeout') {
		            msg = 'Time out error.';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        alert(msg);
			},
			success : function(html) {

				$('.error').show();

				console.log(html);

				 btn.removeAttr('disabled');
				btn.html('Create Account');
				
				var data = $.parseJSON(html);

				if (data.status=='false') {

					$('.username-error').html(data.username);	
					$('.email-error').html(data.email);	
					$('.phone-error').html(data.phone);	
					$('.password-error').html(data.password);	
					$('.retype-error').html(data.retype);	
					

				} else {

					window.location = ajax_url+'login/verify_login';
				}

			}
		});
		return false;


	});


	$('.crypto-coin').on('click',function(){

		var coin = $(this).val();

			$.ajax({

			url : ajax_url+'dashboard/change_wallet',
			type: 'POST',
			data : {coin:coin},
			beforeSend : function(){

				$('.loading').show();
			},
			success : function(html) {	

				$('.loading').hide();
				console.log(html);

				
				var data = $.parseJSON(html);

				if (data.status=='success') {

						$('.crypto-type .value').html('1.'+data.coin);
						$('.crypto-price .value').html('$'+data.price+' USD');
						$('.left-sidebar-wllet').html(data.coin);
						$('.curr-wallet').html(data.coin);
						$('.transfer-to').attr('data-crypto',data.coin);
						$('.left-sidebar-price').html('$'+data.price+' USD');
						$('.price-hidden').val(data.price);
						$('.wallet-popup .wallet-address').html(data.wallet_address);
						$('.change-w').attr('data-crypto',data.coin);
						$('.current-balance').val(data.balance);
						
						if (data.balance==0) {
							$('.main-error').html("In sufficient balance !");
							$('.my-btn-check').addClass('disabled').removeClass('next-step');
							
							$('.send-crypto-btn').addClass('disabled');
						} else {
							$('.main-error').html("");
							$('.my-btn-check').removeClass('disabled').addClass('next-step');
							$('.change-w').attr('data-valid','true');
							$('.send-crypto-btn').removeClass('disabled');

						}

						$('#wallet-qrcode').empty();
						 var qrcode = new QRCode("wallet-qrcode",{
					          text: data.wallet_address,
					          width: 128,
					          height: 128,
					          colorDark : "#000000",
					          colorLight : "#ffffff",
					          correctLevel : QRCode.CorrectLevel.H
					      });

				} 
				// else {

				// 	alert('Could not find the price !');

				// }
			}

		});

		

	});


	$('.send-crypto-btn').on('click','',function(){

		var btn     = $(this);
		var pass    = $('.wallet-password').val();
		var address = $('.transfer-to').val();
		var amount  = $('.transfer-amount').val();
		var wallet  = $('.transfer-to').attr('data-crypto');
			if(!btn.hasClass('next-step')){

				$.ajax({

						url : ajax_url+'dashboard/do_transaction',
						type: 'post',
						data : {pass:pass,address:address,amount:amount,wallet:wallet},
						beforeSend : function(){
							btn.html('Please wait..');
							$('.transfer-success').html('');
						},
						success : function(html){
							btn.html('Proceed');
							console.log(html);
							var data  = $.parseJSON(html);

							if (data.status=='success') {

								 $('.transfer-success').html('Successfully sent !');
								 $('.wallet-password').val('');
								 $('.transfer-to').val('');
								 $('.transfer-amount').val('');
								 $('.send-div-2').slideUp();
								 $('.send-div-one').slideDown();
								 $('.usd-price').val('');

								 
							} else {

								$('.main-error').html("Error Occured, Try later !"); 
							}

						} 
				});
			}

	});

	$('.validate-pass').on('keyup',function(){

		var pass  = $(this);
		var password = pass.val();

		$.ajax({

			type : 'POST',
			url  : ajax_url+'login/check_password',
			data : {password:password},
			beforeSend : function(){
				pass.addClass('loading');
			},
			success : function(html){
				pass.removeClass('loading');
				$('.password-error').html('');
				if (html=='success') {
					pass.addClass('ok');
				} else {

					$('.password-error').html('Password length should be 8 character and should contain atleast one Uppercase, one lowercase, one digit and one special character');	
				}

			}
		});

	});

	$('.transfer-to').blur(function(){

		var address  =  $(this).val();
		var crypto = $(this).attr('data-crypto');
		// console.log('blur');
		
		check_address(address,crypto,ajax_url+'dashboard/checkaddress');

	});

	$('.modal-footer').on('click','.next-step',function(){
		
		var btn             = $(this);
		var valid           = btn.attr('data-valid');

		var transfer_amount = $('.transfer-amount').val();
		$('.main-error').html('');

		if (valid=='false' || transfer_amount==0) {

			 $('.main-error').html('Please enter valid details!');


		} else {


			$('.send-div-one').slideUp();
			$('.send-div-2').slideDown();
			btn.hide();
			$('.send-crypto-btn').show();
			
		
		}
		return false;
	});

	$('.transfer-amount').on('keyup',function(){

		var curr_rate = $('.price-hidden').val();
		var transfer_amount = $(this).val();

		var total = curr_rate*transfer_amount;
		// console.log(total);

		$('.usd-price').val(total);
	});
	

	$('input.copy-to-clipboard').click(function() {
		 $(this).focus();
		 $(this).select();
		 document.execCommand('copy');
		 $(".copied").text("Copied to clipboard").show().fadeOut(1200);
	});


	

	$('table tr a.change-pwd').on('click',function(){
		
		//$('tr.actionRow1').toggleClass('hideRow');
		$('.profile-msg').remove();
		$('.ajax-loader').remove();
		var btn = $(this);
		$.ajax({
			
			type : 'POST',
			url:  ajax_url+'dashboard/send_otp',
			data : {'send_otp':'otp'},
			beforeSend : function() {
				btn.attr('disabled','disabled');
				btn.after('<img class="ajax-loader" src="'+ajax_url+'assets/img/ajax-loader.gif" />');
			},
			success : function(html){
				btn.removeAttr('disabled');
				$('.ajax-loader').hide();
				console.log(html);
				if (html=='success') {

					$('tr.actionRow1').toggleClass('hideRow');
					btn.after('<span class="text-success profile-msg">&nbsp;&nbsp;OTP Sent</span>');

				} else {

					btn.after('<span class="text-danger profile-msg">&nbsp;&nbsp;Error occured !, try later</span>');
				}
			}


		});
	});

	$('.verify-otp').on('click',function(){

		var otp = $('.profile-otp').val();
		var btn = $(this);
		$.ajax({

			type : "POST",
			url : ajax_url+'dashboard/check_sent_otp',
			data:{otp:otp},
			beforeSend : function(){
				btn.val('Please wait..');
			},
			success : function(html) {
				
				btn.val('Submit');

				if (html=='success') {

					$('.actionRow1').addClass('hideRow');
					$('.actionRow2').removeClass('hideRow2');

				} else {

					btn.after('<span class="text-danger profile-msg">'+html+'</span>');
				}
			}
		});
	});

	$('.otp-submit').on('click',function(){

		var otp = $('.one-time-otp').val();
		$('.profile-msg').remove();
		var btn = $(this);
		$.ajax({

			type : "POST",
			url : ajax_url+'login/check_otp_forgot',
			data:{otp:otp},
			beforeSend : function(){
				btn.val('Please wait..');
			},
			success : function(html) {
				
				btn.val('Submit');

				console.log(html);

				if (html=='success') {

					$('.row1').slideUp();
					$('.row2').slideDown();

				} else {

					btn.after('<span class="text-danger profile-msg">'+html+'</span>');
				}
			}
		});
	});


	$('.submit-password').on('click',function(){

		var password = $('.profile-password').val();
		var retype   = $('.profile-retype').val();

		$('.profile-msg').remove();
			// console.log(password+" "+retype);

		if (password != retype) {

			$('.profile-password').after('<span class="text-danger profile-msg">Password did not matched !</span>')
			return false;
		}

		var btn = $(this);
		$.ajax({

			type : "POST",
			url : ajax_url+'dashboard/change_password',
			data:{password:password},
			beforeSend : function(){
				btn.val('Please wait..');
			},
			success : function(html) {
				
				btn.val('Submit');

				if (html=='success') {

					$('.actionRow1').addClass('hideRow');
					$('.actionRow2').addClass('hideRow2');

					$('.table-striped').after('<p class="text-success">Successfully changed password !</p>')

				} else {

					btn.after('<span class="text-danger profile-msg">Error occured, try later !</span>');
				}
			}
		});
	});


	$('.submit-fpassword').on('click',function(){

		var password = $('.new-pwd').val();
		var retype   = $('.new-retype').val();

		$('.profile-msg').remove();
			// console.log(password+" "+retype);

		if (password != retype) {

			$('.submit-fpassword').after('<span class="text-danger profile-msg">Password did not matched !</span>')
			return false;
		}

		var btn = $(this);
		$.ajax({

			type : "POST",
			url : ajax_url+'login/change_password',
			data:{password:password},
			beforeSend : function(){
				btn.val('Please wait..');
			},
		error : function(jqXHR,exception) {
				console.log(jqXHR.responseText);
				var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404]';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {
		            msg = 'Requested JSON parse failed.';
		        } else if (exception === 'timeout') {
		            msg = 'Time out error.';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        alert(msg);
			},
			success : function(html) {
				
				btn.val('Submit');

				if (html=='success') {

					window.location = ajax_url+'login';
				} else {

					btn.after('<span class="text-danger profile-msg">Error occured, try later !</span>');
				}
			}
		});
	});

	$('.forgot-pwd').on('click',function(){

		var phone = $('.forgot-number').val();
		var email   = $('.forgot-email').val();
		var btn = $(this);
		
		// $('.profile-msg').hide();

		if (phone=='') {

			$('.profile-msg').html('Please enter phone number');
		
			return false;
		}
		if (email=='') {

			$('.profile-msg').html('Please enter email address');
		
			return false;
		}
	
		$.ajax({

			type : "POST",

			url : ajax_url+'login/check_forgotUser',

			data:{phone:phone,email:email},

			beforeSend : function(){

				btn.html('Please wait..');

			},
			success : function(html){
				
				btn.html('Submit');
				console.log(html);

				if (html=='success') {
	
					window.location = ajax_url+'login/otp_form';

				} else {

					btn.after('<span class="text-danger profile-msg">Error occured, try later !</span>');
				}
			}
		});
		return  false;
	});



});



function check_address(address,crypto,site_url) {

	$.ajax({

		url : site_url,
		type: 'POST',
		data : {address:address,crypto:crypto},
		beforeSend : function(){
			$('.address-loader').show();
			$('.main-error').html('');
		},
		error : function(jqXHR,exception) {
				console.log(jqXHR.responseText);
				var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404]';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {
		            msg = 'Requested JSON parse failed.';
		        } else if (exception === 'timeout') {
		            msg = 'Time out error.';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        alert(msg);
			},
		success : function(html){
			$('.address-loader').hide();
			console.log(html);
			var data = $.parseJSON(html);

			if (data.status =='false') {

			  $('.main-error').html('Invalid address !');
			  $('.next-step').attr('data-valid','false');
			} else{
			  $('.next-step').attr('data-valid','true');


			}


		}
	});

}

function check_session() {

	$.ajax({

		url : ajax_url+'dashboard/session_check',
		type : 'GET',
		data: {},
		
		success : function(html) {

			if (html !='success') {

				location.reload();
			}

		}


	});

}