<html>
<head>
	<title>Add a Review</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src='/assets/js/book_search.js'></script>
<script type="text/javascript" src='/assets/js/ratings.js'></script>
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
	.gray {
		-webkit-filter: grayscale(100%); 
		filter: grayscale(100%);
	}
	.star_color {
		height: 30px;
	}
	#result_titles, #result_authors {
		margin-top: 20px;
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

	<div class='container review_form'>
		<div class='row'>
			<div class='col-md-12'>
				<div class='row'>
					<div class='col-md-6'>
						<h4>Add a new review</h4>
					</div>
				</div>
<?php  
		if($this->session->flashdata('errors'))
		{
			foreach($this->session->flashdata('errors') as $error)
			{ ?>
				<p><?= $error ?></p>
<?php	}
		}

?>

				<div class='row new_review'>
					<div class='col-md-12'>
						<!-- form to add review-->
						<form id='review_form' class='form-horizontal' action='/books/add_review' method='post'>
							
							<!-- book title form group -->
							<div class="form-group">
					      <label class="control-label col-md-1" for="book_title">Book Title:</label>
					      <div class="col-md-6">
					      	<!-- book title input -->
					        <input id='book_title' type="text" name='book_title' class="form-control">
					      </div>
					      	<!-- partial for book titles -->
					      <div class='col-md-6'>
					        <div id='result_titles'></div>
					      </div>
							</div>

							<!-- book author form group -->
							<div class="form-group">
					      <label class="control-label col-md-1" for="book_author">Author:</label>
					      <div class="col-md-6 book_author_result">
					      	<!-- book author input -->
					        <input id='book_author' type="text" name='book_author' class="form-control">
					      </div>
					      <!-- partial for book authors -->
					      <div class='col-md-6 col-md-offset-1'>
					      	<div id='result_authors'></div>
					      </div>
							</div>

							<!-- book review form group -->
							<div class="form-group">
					      <label class="control-label col-md-1" for="review">Review:</label>
					      <div class="col-md-6">
					     		<textarea class="form-control" name='book_review' rows="5" id="review" ></textarea>
					      </div>
							</div>

							<!-- book rating form group -->
							<div class="form-group">
					      <label class="control-label col-md-1" for="rating">Rating:</label>
					      <div class="col-md-6">
					     		<img class='star gray star1' src="/assets/img/star.ico" value='1'>
					     		<img class='star gray star2' src="/assets/img/star.ico" value='2'>
					     		<img class='star gray star3' src="/assets/img/star.ico" value='3'>
					     		<img class='star gray star4' src="/assets/img/star.ico" value='4'>
					     		<img class='star gray star5' src="/assets/img/star.ico" value='5'>
					      </div>
							</div>
							<div class="form-group">
					      <div class="col-md-6 col-md-offset-1">
					     		<input class='btn btn-primary pull-right' type='submit' value='Submit Review'>
									<input id='rating' name='book_rating' type='hidden' value=''>
									<input type='hidden' name='user_id' value='<?= $this->session->userdata('user')['id'] ?>'>
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