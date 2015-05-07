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
	.review_form {
		margin-top: 75px;
	}
	.new_review {
		margin-top: 30px;
	}
	.star {
		height: 30px;
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
	                <li class="hidden">
	                    <a href="#page-top"></a>
	                </li>
	                <li>
	                    <a class="page-scroll" href=""><?= $this->session->userdata('user')['first_name'] ?></a>
	                </li>
	                <li>
	                    <a class="page-scroll" href="/users/profile/<?= $this->session->userdata('user')['id'] ?>">Profile</a>
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

	<div class='container review_form'>
		<div class='row'>
			<div class='col-md-12'>
				<div class='row'>
					<div class='col-md-6'>
						<h4>Add a new review</h4>
					</div>
				</div>

				<div class='row new_review'>
					<div class='col-md-12'>
						<form class='form-horizontal'>
							<div class="form-group">
					      <label class="control-label col-md-1" for="title">Book Title:</label>
					      <div class="col-md-6">
					        <input type="text" name='book_title' class="form-control" id="title">
					      </div>
							</div>
							<div class="form-group">
					      <label class="control-label col-md-1" for="author">Author:</label>
					      <div class="col-md-6">
					        <input type="text" name='book_author' class="form-control" id="author">
					      </div>
							</div>
							<div class="form-group">
					      <label class="control-label col-md-1" for="review">Review:</label>
					      <div class="col-md-6">
					     		<textarea class="form-control" name='book_review' rows="5" id="review"></textarea>
					      </div>
							</div>
							<div class="form-group">
					      <label class="control-label col-md-1" for="comment">Rating:</label>
					      <div class="col-md-6">
					     		<img class='star' src="/assets/img/star.ico">
					     		<img class='star' src="/assets/img/star.ico">
					     		<img class='star' src="/assets/img/star.ico">
					     		<img class='star' src="/assets/img/star.ico">
					     		<img class='star' src="/assets/img/star.ico">
					      </div>
							</div>
							<div class="form-group">
					      <div class="col-md-6 col-md-offset-1">
					     		<input class='btn btn-primary pull-right' type='submit' value='Submit Review'>
					      </div>
							</div>
						</form>
					</div>
				</div>

	


			</div>


		</div>
	</div>



</body>
</html>