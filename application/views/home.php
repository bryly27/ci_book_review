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
	body {
		padding: 5px;
	}
	.header {
		border-bottom: 1px solid black;
	}
	.header a {
		vertical-align: bottom;
	}
	.home_content {
		margin-top: 75px;
	}
	.home_review {
		margin-left: 20px;
	}
	.star {
		height: 30px;
	}
	.other_reviews {
		border: 1px solid silver;
		overflow: scroll;
		overflow-y: auto;
		height: 300px
	}
	.other_reviews::-webkit-scrollbar {
    -webkit-appearance: none;
    width: 7px;
	}
	.other_reviews::-webkit-scrollbar-thumb {
    background-color: rgba(0,0,0,.5);
    -webkit-box-shadow: 0 0 1px rgba(255,255,255,.5);
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
						<div class='home_review'>
							<p>Rating: 
<?php  
							for($i = 1; $i<=$review['rating']; $i++)
							{ ?>
								<img class='star' src="/assets/img/star.ico">
<?php					} ?>
								
							</p>
							<p><a href="/books/users/<?= $review['user_id'] ?>"><?= $review['first_name'] ?></a> says: <?= $review['review'] ?>
							</p>
							<p><?= $review['created_at'] ?></p>
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
								<p><a href="">Harry Potter</a><p>
								<p><a href="">Twilight</a></p>
								<p><a href="">Matilda</a></p>
								<p><a href="">Harry Potter</a><p>
								<p><a href="">Twilight</a></p>
								<p><a href="">Matilda</a></p>
								<p><a href="">Harry Potter</a><p>
								<p><a href="">Twilight</a></p>
								<p><a href="">Matilda</a></p>
								<p><a href="">Harry Potter</a><p>
								<p><a href="">Twilight</a></p>
								<p><a href="">Matilda</a></p>
								<p><a href="">Harry Potter</a><p>
								<p><a href="">Twilight</a></p>
								<p><a href="">Matilda</a></p>
								<p><a href="">Harry Potter</a><p>
								<p><a href="">Twilight</a></p>
								<p><a href="">Matilda</a></p>
								<p><a href="">Harry Potter</a><p>
								<p><a href="">Twilight</a></p>
								<p><a href="">Matilda</a></p>
								<p><a href="">Harry Potter</a><p>
								<p><a href="">Twilight</a></p>
								<p><a href="">Matilda</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>


</body>
</html>