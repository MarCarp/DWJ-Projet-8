<?php
$this->title = 'Create';
?>

<div class="single">
	 <div class="container">
	 	<div class="contact-info">
	 		<h2>Créer un nouveau billet</h2>
	 	</div>
	 	<div class="contact-details">
			  	<form method="post" action="index.php" enctype="multipart/form-data">
			  		 <p>
			  		 	<!--SECTION TITRE-->
			  		 	<label for="title">Titre : </label><br />
			  		 	<input  id="create" type="text" name="title"  required /><br />
			  		 	<!--SECTION IMAGE-->
			  		 	<label for="image">Image d'en tête : </label><br />
			  		 	<input type="file" name="image" /><br />
			  		 	<!--SECTION CONTENU-->
			  		 	<label for="content">Contenu du billet : </label><br />
			  		 	<textarea class="tinymce" name="content"></textarea>
			  		 	<!--SECTION SUBMIT-->
			  		 	<input class="create" type="submit" value="CRÉER" formaction="index.php?action=addNew"/>
			  		 	<input class="create" type="submit" value="APERÇU" formaction="index.php?action=preview"/>
					</p>
			  	</form>
		</div>
		<div class="clearfix"></div>
	</div>
</div>