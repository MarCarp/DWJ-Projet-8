<?php
$this->title = 'testModify';
?>

<div class="single">
	 <div class="container">
		  <div class="contact-info">
		  	<h2>Modifier un Billet</h2>
		  </div>
		  <div class="contact-details">
			  	<form method="post" action="index.php" enctype="multipart/form-data">
			  		 <p>
			  		 	<label>Titre : </label><br />
			  		 	<input id="create" type="text" name="createTitle" size="80" value="<?= $post['title']?>"required><br />
			  		 	<label>Image actuelle : </label><br />
			  		 	<img src="Content/Images/<?=$post['image']?>" alt=""/><br />
			  		 	<label>Changer l'image : </label><br />
			  		 	<input type="file" name="createImage" /><br />
			  		 	<label>Contenu du billet : </label><br />
			  		 	<textarea class="tinymce"><?= $post['content']?></textarea>
			  		 	<input class="create" type="submit" value="Envoyer le fichier" />
			  		 </p>
			  	</form>
			  </div>
			</div>
		  <div class="clearfix"></div>
		</div>
</div>