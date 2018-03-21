<?php
$this->title = 'Preview';
?>

<div class="single">
	 <div class="container">
		  <div class="col-md-8 single-main">				 
			  <div class="single-grid">
			  	<h2><?= $post['title'] ?></h2>
			  	<img src="Content/Images/<?= $post['image'] ?>" alt=""/>
			  	<p><?= $post['content'] ?></p>
			  </div>
			  <div class="contact-details">
			  	<form method="post" action="index.php" enctype="multipart/form-data">
			  		 <p>
			  		 	<input class="create" type="submit" value="VALIDER" formaction="index.php?action=addNew"/>
			  		 	<input class="create" type="submit" value="MODIFIER" formaction="index.php?action=preview"/>
					</p>
			  	</form>
			</div>
			<div class="clearfix"></div>
		</div>
</div>
