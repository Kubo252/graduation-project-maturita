<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles/main.css">

<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
		<div class="alert alert-warning alert-dismissible">
    		<strong>Upozornenie!</strong><p><?php echo $error ?></p>
  		</div>  	  
  	<?php endforeach ?>
  </div>
<?php  endif ?>