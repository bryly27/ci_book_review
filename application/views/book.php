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
<link rel="stylesheet" type="text/css" href="/assets/css/add_review.css">
<script type="text/javascript" src='/assets/js/ratings.js'></script>
</head>
<style type="text/css">
	.book_content {
		margin-top: 75px;
	}
	.review {
		border-bottom: 1px solid silver;
	}
	.avg_star {
		height: 15px;
	}
	.submit_form {
		margin-top: 10px;
	}
	.review_star {
		height: 30px;
	}
	.back_button {
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

	<div class='container book_content'>
		<h1><?= $book['title'] ?></h1>
		<p>Author: <a href="/books/author/<?= $book['author_id'] ?>"><?= $book['name'] ?></a></p>
		<p>
<?php  
		$sum = 0;
		$avg = 0;
		if($reviews)
		{
			foreach ($reviews as $key => $value) 
			{
				$sum += $value['rating'];	
			}
			$avg = ceil($sum/count($reviews));	
				for($i = 1; $i<=$avg; $i++)
				{ ?>
					<img class='avg_star' src="/assets/img/star.ico">
	<?php } ?>

	<?php  
				if(count($reviews)>1)
				{ ?>
					(<?= count($reviews) ?> reviews)
	<?php	}
				else
				{ ?>
					(<?= count($reviews) ?> review)
	<?php	} 
			}
			else
			{ ?>
				<h4>Be the first to review this book</h4>
<?php	} ?>
		</p>
		

		<div class='row'>
			<div class='col-md-6 col-sm-6'>
			<h3>Reviews:</h3>

<?php  
			if($reviews)
			{
				foreach($reviews as $review)
				{ ?>
				<div class='review'>
					<p>Rating: 
	<?php  
					for($i = 1; $i<=$review['rating']; $i++)
					{ ?>
						<img class='review_star' src="/assets/img/star.ico">
	<?php		} ?>


	<?php  
					if($this->session->userdata('user')['id'] === $review['user_id'])
					{ ?>
						<a class='pull-right' href="/books/delete_review/<?= $review['review_id'] ?>/<?= $review['book_id'] ?>">Delete Review</a>
	<?php		} ?>
						</p>
						<p><a href='/users/profile/<?= $review['user_id'] ?>'><?= $review['first_name'] ?></a> says: <?= $review['review'] ?></p>
						<p>Posted on: <?= date('F jS, Y',strtotime($review['created_at'])) ?></p>
					</div>
	<?php	} 
			} ?>
			<a href="/books" class='btn btn-default back_button'>Back</a>
 
			</div>
			<div class='col-md-6 col-sm-6'>

<?php  
					if($this->session->flashdata('errors'))
					{
						foreach($this->session->flashdata('errors') as $error)
						{ ?>
							<p><?= $error ?></p>
<?php				}
					}

?>		
			<div class='col-md-8 col-sm-8'>
				<h3>Add a review:</h3>
				<form action='/books/add_review_from_book/<?= $reviews[0]['book_id'] ?>' method='post'>
					<div class="form-group">
			     	<textarea class="form-control" name='book_review' rows="5" id="review" ></textarea>
					</div>


			    <!-- <div class="col-md-12"> -->
					<label class="control-label" for="rating">Rating:</label>
	     		<img class='star gray star1' src="/assets/img/star.ico" value='1'>
	     		<img class='star gray star2' src="/assets/img/star.ico" value='2'>
	     		<img class='star gray star3' src="/assets/img/star.ico" value='3'>
	     		<img class='star gray star4' src="/assets/img/star.ico" value='4'>
	     		<img class='star gray star5' src="/assets/img/star.ico" value='5'>
			    
			    <!-- submit -->
					<div class="form-group submit_form">
		     		<input class='btn btn-primary' type='submit' value='Submit Review'>
						<input id='rating' name='book_rating' type='hidden' value=''>
						<input type='hidden' name='user_id' value='<?= $this->session->userdata('user')['id'] ?>'>
						<input type='hidden' name='book_id' value='<?= $reviews[0]['book_id'] ?>'>
						<input type='hidden' name='author_id' value='<?= $reviews[0]['author_id'] ?>'>
					</div>
				</form>



		  </div>
				


			</div>



		</div>

		</div>


</body>
</html>