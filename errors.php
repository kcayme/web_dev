<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error;
			echo "test";
		?></p>
		
  	<?php endforeach ?>
  </div>
<?php  endif ?>