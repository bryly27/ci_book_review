<ul class="list-group">
<?php  	
			foreach($titles as $title)
			{ ?>
				<li class="list-group-item"><input class='title_button' name='book_title' type="radio" value='<?= $title['title'] ?>' author='<?= $title['author_id'] ?>'> <?= $title['title'] ?> -<?= $title['name'] ?></li>
				<input type='hidden' name='book_id' value='<?= $title['id'] ?>'>
<?php	} ?>
</ul>