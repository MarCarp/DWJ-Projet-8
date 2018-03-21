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
			  		 	<input type="hidden" name="id" value="<?=$post['id']?>">
			  		 	<label>Titre : </label><br />
			  		 	<input id="create" type="text" name="title" size="80" value="<?= $post['title']?>"required><br />
			  		 	<label>Image actuelle : </label><br />
			  		 	<img src="Content/Images/<?=$post['image']?>" alt=""/><br />
			  		 	<label>Changer l'image : </label><br />
			  		 	<input type="file" name="image" /><br />
			  		 	<label>Contenu du billet : </label><br />
			  		 	<textarea class="tinymce" name="content"><?= $post['content']?></textarea>
			  		 	<input class="create" type="submit" value="VALIDER" formaction="index.php?action=update"/>
			  		 	<input class="create" type="submit" value="APERÇU" formaction="index.php?action=preview&mode=modify"/>
			  		 </p>
			  	</form>
			  </div>
			</div>
		  <div class="clearfix"></div>
		</div>
</div>