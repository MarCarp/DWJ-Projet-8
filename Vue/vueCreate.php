<?php
$this->title = 'testCreate';
?>

<div class="single">
	 <div class="container">
	 	<div class="contact-info">
	 		<h2>Créer un nouveau Billet</h2>
	 	</div>
	 	<div class="contact-details">
			  	<form method="post" action="index.php" enctype="multipart/form-data">
			  		 <p>
			  		 	<!--SECTION TITRE-->
			  		 	<label for="createTitle">Titre : </label><br />
			  		 	<input  id="create" type="text" name="createTitle"  required /><br />
			  		 	<!--SECTION IMAGE-->
			  		 	<label for="createImage">Image d'en tête : </label><br />
			  		 	<input type="file" name="createImage" /><br />
			  		 	<!--SECTION CONTENU-->
			  		 	<label for="createContent">Contenu du billet : </label><br />
			  		 	<textarea class="tinymce" name="createContent"></textarea>
			  		 	<!--SECTION SUBMIT-->
			  		 	<input class="create" type="submit" value="CRÉER" formaction="index.php?action=addNew"/>
			  		 	<input class="create" type="submit" value="APERÇU" formaction="index.php?action=preview"/>
					</p>
			  	</form>
		</div>
		<div class="clearfix"></div>
	</div>
</div>