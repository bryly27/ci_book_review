var first_name_valid = false;
var last_name_valid = false;
var email_valid = false;
var password_valid = false;
var confirm_password_valid = false;
var login_email_valid = false;
var login_password_valid = false;

var name_regex = /^[a-zA-Z]+$/;
var email_regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
var password_regex = /^[\w ]+$/;

function check_valid(){
	if(first_name_valid === true && last_name_valid === true && email_valid === true && password_valid === true && confirm_password_valid === true){
		$('#register_button').attr('disabled', false);
	}else{
		$('#register_button').attr('disabled', true);
	}
}

function check_login_valid(){
	if(login_email_valid === true && login_password_valid === true){
		$('#login_button').attr('disabled', false);
	}else{
		$('#login_button').attr('disabled', true);
	}
}



$(document).ready(function(){

	// first name validations
	$('.register_first_name').keyup(function(){

		var first_name = $(this).val();
	
		if(!first_name.match(name_regex)){
			$(this).removeClass('valid');
			$(this).addClass('invalid');
			first_name_valid = false;
		}else if(first_name.length < 2){
			$(this).removeClass('valid');
			$(this).addClass('invalid');
			first_name_valid = false;
		}else{
			$(this).removeClass('invalid');
			$(this).addClass('valid');
			first_name_valid = true;
		}
			check_valid();
	})

	// last name validations
	$('.register_last_name').keyup(function(){

		var last_name = $(this).val();

		if(!last_name.match(name_regex)){
			$(this).removeClass('valid');
			$(this).addClass('invalid');
			last_name_valid = false;
		}else if(last_name.length < 2){
			$(this).removeClass('valid');
			$(this).addClass('invalid');
			last_name_valid = false;
		}else{
			$(this).removeClass('invalid');
			$(this).addClass('valid');
			last_name_valid = true;
		}
			check_valid();
	})

	// email validation
	$('.register_email').keyup(function(){

		var email = $(this).val();

		if(!email.match(email_regex)){
			$(this).removeClass('valid');
			$(this).addClass('invalid');
			email_valid = false;
		}else if(email.length < 2){
			$(this).removeClass('valid');
			$(this).addClass('invalid');
			email_valid = false;
		}else{
			$(this).removeClass('invalid');
			$(this).addClass('valid');
			email_valid = true;
		}
			check_valid();

	})

	//password validation
	$('.register_password').keyup(function(){

		var password = $(this).val();
		var confirm_password = $('.register_confirm_password').val();

		if(!password.match(password_regex)){
			$(this).removeClass('valid');
			$(this).addClass('invalid');
			password_valid = false;
		}else if(password.length < 5){
			$(this).removeClass('valid');
			$(this).addClass('invalid');
			password_valid = false;
		}else{
			$(this).removeClass('invalid');
			$(this).addClass('valid');
			password_valid = true;
		}

		if(password === confirm_password && password !== ''){
			$('.register_confirm_password').removeClass('invalid');
			$('.register_confirm_password').addClass('valid');
		}else{
			$('.register_confirm_password').addClass('invalid');
			$('.register_confirm_password').removeClass('valid');
		}
			check_valid();

	})

	// confirm password validation
	$('.register_confirm_password').keyup(function(){
		var confirm_password = $(this).val();
		var password = $('.register_password').val();
		if(confirm_password !== password || confirm_password === ''){
			$(this).removeClass('valid');
			$(this).addClass('invalid');
			confirm_password_valid = false;
		}else{
			$(this).removeClass('invalid');
			$(this).addClass('valid');
			confirm_password_valid = true;
		}
			check_valid();
	})


	// confirm login email validation
	$('.login_email').keyup(function(){
		var email = $(this).val();

		if(!email.match(email_regex)){
			$(this).removeClass('valid');
			$(this).addClass('invalid');
			login_email_valid = false;
		}else if(email.length < 2){
			$(this).removeClass('valid');
			$(this).addClass('invalid');
			login_email_valid = false;
		}else{
			$(this).removeClass('invalid');
			$(this).addClass('valid');
			login_email_valid = true;
		}
			check_login_valid();
	})

	$('.login_password').keyup(function(){

		var password = $(this).val();

		if(!password.match(password_regex)){
			$(this).removeClass('valid');
			$(this).addClass('invalid');
			login_password_valid = false;
		}else if(password.length < 5){
			$(this).removeClass('valid');
			$(this).addClass('invalid');
			login_password_valid = false;
		}else{
			$(this).removeClass('invalid');
			$(this).addClass('valid');
			login_password_valid = true;
		}
			check_login_valid();

	})

});