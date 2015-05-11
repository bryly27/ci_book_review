<html>
<head>
	<title>Add a Review</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	.profile {
		margin-top: 75px;
	}
	.profile_content {
		margin-top: 50px;
	}

</style>
<body>	
	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-fixed-top">
	    <div class="container">
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header page-scroll">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand page-scroll" href="/books">Book Review</a>
	        </div>

	        <!-- Collect the nav links, forms, and other content for toggling -->
	        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	            <ul class="nav navbar-nav navbar-right">
	                <li>
	                    <a class="page-scroll" href="/users/profile/<?= $this->session->userdata('user')['id'] ?>"><?= $this->session->userdata('user')['first_name'] ?></a>
	                </li>
	                <li>
	                    <a class="page-scroll" href="/users/logout">Log Out</a>
	                </li>
	            </ul>
	        </div>
	        <!-- /.navbar-collapse -->
	    </div>
	    <!-- /.container-fluid -->
	</nav>

	<div class='container profile'>
		<div class='row'>
			<div class='col-md-12'>
				<div class='row'>
					<div class='col-md-6'>
						<h2><?= $user['first_name'] ?>'s Profile</h2>
					</div>
				</div>
				<div class='row profile_content'>
					<div class='col-md-6'>
						<p>Name: <?= $user['first_name'] ?> <?= $user['last_name'] ?></p>
						<p>Email: <?= $user['email'] ?></p>
						<p>User since: <?= date('F jS, Y',strtotime($user['created_at'])) ?></p>
						<p>Total reviews: <?= count($reviews) ?></p>
					</div>
					<div class='col-md-6'>
						<p>Posted reviews on the following books: </p>
<?php  
					foreach($reviews as $review)
					{ ?>
						<h5><a href='/books/review/<?= $review['id'] ?>'><?= $review['title'] ?></h5>
<?php			} ?>
					</div>
				</div>

			

			</div>


		</div>
	</div>





</body>
</html>