<ul class="list-group">
<?php  	
			foreach($authors as $author)
			{ ?>
				<li class="list-group-item"><input name='book_author' type="radio" value='<?= $author['name'] ?>'> <?= $author['name'] ?></li>
				<input type='hidden' name='author_id' value='<?= $author['id'] ?>'>
<?php	} ?>
</ul>