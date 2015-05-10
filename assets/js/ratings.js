$(document).ready(function(){

		var rating = null;

		function check_rating(){
			if(rating !== null){

				if(rating === 1){
					$('.star1').removeClass('gray');
					$('.star2, .star3, .star4, .star5').addClass('gray');
				}else if(rating === 2){
					$('.star1, .star2').removeClass('gray');
					$('.star3, .star4, .star5').addClass('gray');
				}else if(rating === 3){
					$('.star1, .star2, .star3').removeClass('gray');
					$('.star4, .star5').addClass('gray');
				}else if (rating === 4){
					$('.star1, .star2, .star3, .star4').removeClass('gray');
					$('.star5').addClass('gray');
				}else if (rating === 5){
					$('.star1, .star2, .star3, .star4, .star5').removeClass('gray');
				}


			}else{
				$('.star').addClass('gray');
			}
			
		}

		$('.star1').on({
	    mouseover: function(){
	        $(this).removeClass('gray');
	        $('.star2, .star3, .star4, .star5').addClass('gray');
	    },
	     mouseleave: function(){
	        check_rating();
	    },
	    click: function(){
	      $('#rating').val(1);
				rating = 1;
				check_rating();
	    }
		});

		$('.star2').on({
	    mouseover: function(){
	        $('.star1, .star2').removeClass('gray');
	        $('.star3, .star4, .star5').addClass('gray');
	    },
	     mouseleave: function(){
	        check_rating();
	    },
	    click: function(){
	      $('#rating').val(2);
				rating = 2;
				check_rating();
	    }
		});

		$('.star3').on({
	    mouseover: function(){
	        $('.star1, .star2, .star3').removeClass('gray');
	        $('.star4, .star5').addClass('gray');
	    },
	     mouseleave: function(){
	        check_rating();
	    },
	    click: function(){
	      $('#rating').val(3);
				rating = 3;
				check_rating();
	    }
		});

		$('.star4').on({
	    mouseover: function(){
	        $('.star1, .star2, .star3, .star4').removeClass('gray');
	        $('.star5').addClass('gray');
	    },
	     mouseleave: function(){
	        check_rating();
	    },
	    click: function(){
	      $('#rating').val(4);
				rating = 4;
				check_rating();
	    }
		});

		$('.star5').on({
	    mouseover: function(){
	        $('.star1, .star2, .star3, .star4, .star5').removeClass('gray');
	    },
	     mouseleave: function(){
	        check_rating();
	    },
	    click: function(){
	      $('#rating').val(5);
				rating = 5;
				check_rating();
	    }
		});









	})