<html>
<head>
	<title>Book Review</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/css/home.css">
</head>
<style type="text/css">
	.book_content {
		margin-top: 75px;
	}
	.review {
		border-bottom: 1px solid silver;
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

	<div class='container book_content'>
		<h1><?= $reviews[0]['title'] ?></h1>
		<p>Author: <a href="/books/author/<?= $reviews[0]['author_id'] ?>"><?= $reviews[0]['name'] ?></a></p>
		

		<div class='row'>
			<div class='col-md-6 col-sm-6'>
			<h3>Reviews:</h3>

<?php  
			foreach($reviews as $review)
			{ ?>
			<div class='review'>
				<p>Rating: 
<?php  
				for($i = 1; $i<=$review['rating']; $i++)
				{ ?>
					<img class='star' src="/assets/img/star.ico">
<?php		} ?>
					</p>
					<p><a href='/users/profile/<?= $review['user_id'] ?>'><?= $review['first_name'] ?></a> says: <?= $review['review'] ?></p>
					<p>Posted on: <?= date('F jS, Y',strtotime($review['created_at'])) ?></p>
				</div>
	<?php	} ?>

 
			</div>
			<div class='col-md-6 col-sm-6'>
				<h3>jsdakfjals</h3>

			</div>


		</div>


	</div>


</body>
</html>