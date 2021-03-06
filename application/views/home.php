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
<?php
						if($this->session->userdata("loggedIn") === FALSE)
						{ ?>
            		<a cslass="page-scroll" href="/users">Login or Register</a>
          		</li>

<?php				}
						else
						{ ?>
            		<a class="page-scroll" href="/users/profile/<?= $this->session->userdata('user')['id'] ?>"><?= $this->session->userdata('user')['first_name'] ?></a>
							<li>
							  <a class="page-scroll" href="/users/logout">Log Out</a>
							</li>
<?php				}
?>          	
         
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
	</nav>


	<div class='container home_content'>
		<div class='row'>
			<div class='col-md-6'>
				<div class='row'>
					<div class='col-md-6'>
						<h4>Recent Book Reviews</h4>
					</div>
					<div class='col-md-6'>
						<a class='btn btn-default pull-right' href="/books/add">Add a review</a>
					</div>
				</div>

<?php  
			foreach($recent_reviews as $review)
			{ ?>
				<div class='row reviews'>
					<div class='col-md-12'>
						<h2><a href="/books/review/<?= $review['id'] ?>"><?= $review['title'] ?></a></h2>
						<p>By: <a href='/books/author/<?= $review['author_id'] ?>'><?= $review['name'] ?></a></p>
						<div class='home_review'>
							<p>
<?php  
							for($i = 1; $i<=$review['rating']; $i++)
							{ ?>
								<img class='star' src="/assets/img/star.ico">
<?php					} ?>
								
							</p>
							<p><a href="/users/profile/<?= $review['user_id'] ?>"><?= $review['first_name'] ?></a> says: <?= $review['review'] ?>
							</p>
							<p>Posted on: <?= date('F jS, Y',strtotime($review['created_at'])) ?></p>
						</div>
					</div>
				</div>
<?php	} ?>

			</div>

			<div class='row'>
				<div class='col-md-6'>
					<div class='row container'>
						<div class='col-md-12'>
							<h4>Other books with reviews:</h4>
						</div>
					</div>
					<div class='row container'>
						<div class='col-md-12'>
							<div class='other_reviews col-md-4'>
<?php  
							foreach($books as $book)
							{ ?>
								<p><a href="/books/review/<?= $book['id'] ?>"><?= $book['title'] ?></a><p>
<?php					} ?>

							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>


</body>
</html>