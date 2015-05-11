$(document).ready(function(){
		
		$('#book_title').keyup(function(){
			var book = $(this).val();
			book = book.split(' ').join('_');
			if(book !== ''){
				$.post(
					'/books/get_titles/' + book, function(results){
					$('#result_titles').html(results);
				})
			}else{
				$('#book_author').attr('readonly', false);
			}
		});

		$('#book_author').keyup(function(){
			var author = $(this).val();
			author = author.split(' ').join('_');
			if(author !== ''){
				$.post(
					'/books/get_authors/' + author, function(results){
						$('#result_authors').html(results);
				});
			}
		});

		$(document).on('change', '.title_button', function(){
			var id = $(this).attr('author');
			$.post(
				'/books/get_author_by_id/' + id, function(results){
					$('.book_author_result').html(results);
					console.log()
				}
			)
		})


	});