<?php
$this->title = 'testModify';
?>

<div class="single">
	 <div class="container">
		  <div class="col-md-8 single-main">				 
			  <div class="single-grid">
			  	<h2>Modifier</h2>
			  	<form action="index.php" method="post" enctype="multipart/form-data">
			  		 <p>
			  		 	<label>Titre : </label><br />
			  		 	<input type="text" name="createTitle" size="80" value="<?= $post['title']?>"required><br />
			  		 	<input type="file" name="createImage" /><br />
			  		 	<img src="Content/Images/Default.jpg" alt=""/>
			  		 	<textarea class="tinymce"><?= $post['content']?></textarea>
			  		 	<input type="submit" value="Envoyer le fichier" />
			  		 </p>
			  	</form>
			  </div>
			</div>
		  <div class="clearfix"></div>
		  </div>
	  </div>
</div>