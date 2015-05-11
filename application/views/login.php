<html>
<head>
	<title>Book Review</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src='/assets/js/login_reg_validations.js'></script>
<link rel="stylesheet" type="text/css" href="/assets/css/login.css">
</head>

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
				
				<!-- register -->
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
			     		<input id='register_button' class='btn btn-primary pull-right' type='submit' value='Register' disabled>
							<input type='hidden' name='action' value='register'>
			      </div>
					</div>

				</form>
			</div>


			<!-- login -->
			<div class='login col-md-6 col-sm-6 col-xs-12'>
				<form action='/users/login' class='form-horizontal' method='post'>
					<h5>Log In</h5>
					<!-- email input -->
					<div class='form-group'>
						<label class='control-label col-md-2' for='email'>Email:</label>
						<div class='col-md-6'>
							<input id='email' type="text" name='email' class="form-control login_email">
						</div>
					</div>
					<!-- password input -->
					<div class='form-group'>
						<label class='control-label col-md-2' for='password'>Password:</label>
						<div class='col-md-6'>
							<input id='password' type="password" name='password' class="form-control login_password">
						</div>
					</div>
					<!-- submit input -->
					<div class='form-group'>
						<div class='col-md-8'>
							<input id='login_button' class='btn btn-primary pull-right' type='submit' value='Login' disabled>
							<input type='hidden' name='action' value='login'>
						</div>
					</div>
				</form>
			</div>

		</div>

	</div>



</body>
</html>