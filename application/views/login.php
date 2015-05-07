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
			<h1>Welcome!</h1>
		</div>
			
			<div class='register'>
				<form action='/users/register' method='post'>
					<h5>Register</h5>
					<p>First Name: <input name='first_name' type='text'></p>
					<p>Last Name: <input name='last_name' type='text'></p>
					<p>Email Address: <input name='email' type='text'></p>
					<p>Password: <input name='password' type='password'></p>
					<p>Confirm Password: <input name='confirm_password' type='password'></p>
					<input type='submit' value='register' class='button'>
					<input type='hidden' name='action' value='register'>
				</form>
			</div>

			<div class='login'>
				<form action='/users/login' method='post'>
					<h5>Log In</h5>
					<p>Email: <input name='email' type='text'></p>
					<p>Password: <input name='password' type='password'></p>
					<input type='submit' value='login' class='button'>
					<input type='hidden' name='action' value='login'>
				</form>
			</div>

	</div>
</body>
</html>