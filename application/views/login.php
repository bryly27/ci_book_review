<html>
<head>
	<title>Book Review</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	.invalid {
		background-color: #dd6363;
	}
	.valid {
		background-color: #67bf6d;
	}
</style>

<script type="text/javascript">

	var first_name_valid = false;
	var last_name_valid = false;
	var email_valid = false;
	var password_valid = false;
	var confirm_password_valid = false;

	var name_regex = /^[a-zA-Z]+$/;
	var email_regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	var password_regex = /^[\w ]+$/;

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

		})

		// email validation
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

			if(password === confirm_password){
				$('.register_confirm_password').removeClass('invalid');
				$('.register_confirm_password').addClass('valid');

			}

		})

		// confirm password validation
		$('.register_confirm_password').keyup(function(){
			var confirm_password = $(this).val();
			var password = $('.register_password').val();
			if(confirm_password !== password){
				$(this).removeClass('valid');
				$(this).addClass('invalid');
				confirm_password_valid = false;
			}else{
				$(this).removeClass('invalid');
				$(this).addClass('valid');
				password_valid = true;
			}
		})





	});

</script>



<body>	
	<div class='container'>
			<?php 
					if($this->session->flashdata('errors'))
					{
						foreach($this->session->flashdata('errors') as $value)
						{ ?>
							<p><?= $value ?></p>
		<?php		}
					} ?> 
		<?php 
					if($this->session->flashdata('success'))
					{
						foreach($this->session->flashdata('success') as $value)
						{ ?>
							<p><?= $value ?></p>
		<?php		}
					}
		?>
		<div class='header'>
			<h1>Welcome to Book Review!</h1>
		</div>
		<div class='row'>
				
			<div class='register col-md-6 col-sm-6 col-xs-12'>
				<form action='/users/register' class='form-horizontal' method='post'>
					<h5>Register</h5>

					<!-- first name input -->
					<div class='form-group'>
						<label class='control-label col-md-4' for='first_name'>First Name:</label>
						<div class='col-md-6'>
							<input id='first_name' class="form-control register_first_name" type="text" name='first_name'>
						</div>
					</div>
					<!-- last name input -->
					<div class='form-group'>
						<label class='control-label col-md-4' for='last_name'>Last Name:</label>
						<div class='col-md-6'>
							<input id='last_name' class="form-control register_last_name" type="text" name='last_name'>
						</div>
					</div>
					<!-- email input -->
					<div class='form-group'>
						<label class='control-label col-md-4' for='email'>Email:</label>
						<div class='col-md-6'>
							<input id='email' class="form-control register_email" type="text" name='email' class="form-control">
						</div>
					</div>
					<!-- password input -->
					<div class='form-group'>
						<label class='control-label col-md-4' for='password'>Password:</label>
						<div class='col-md-6'>
							<input id='password' class="form-control register_password" type="password" name='password'>
						</div>
					</div>
					<!-- confirm password input -->
					<div class='form-group'>
						<label class='control-label col-md-4' for='confirm_password'>Confirm Password:</label>
						<div class='col-md-6'>
							<input id='confirm_password' class="form-control register_confirm_password" type="password" name='confirm_password'>
						</div>
					</div>
					<!-- submit button -->
					<div class="form-group">
			      <div class="col-md-9">
			     		<input class='btn btn-primary pull-right' type='submit' value='Register'>
							<input type='hidden' name='action' value='register'>
			      </div>
					</div>

				</form>
			</div>

			<div class='login col-md-6 col-sm-6 col-xs-12'>
				<form action='/users/login' class='form-horizontal' method='post'>
					<h5>Log In</h5>
					<!-- email input -->
					<div class='form-group'>
						<label class='control-label col-md-2' for='email'>Email:</label>
						<div class='col-md-6'>
							<input id='email' type="text" name='email' class="form-control">
						</div>
					</div>
					<!-- password input -->
					<div class='form-group'>
						<label class='control-label col-md-2' for='password'>Password:</label>
						<div class='col-md-6'>
							<input id='password' type="password" name='password' class="form-control">
						</div>
					</div>

	<!-- 				<p>Email: <input name='email' type='text'></p>
					<p>Password: <input name='password' type='password'></p>
					<input type='submit' value='login' class='button'>
					<input type='hidden' name='action' value='login'> -->
				</form>
			</div>

		</div>

	</div>



</body>
</html>