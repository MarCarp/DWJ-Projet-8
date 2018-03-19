<?php
$this->title = 'testCreate';
?>

<div class="single">
	 <div class="container">
		  <div class="col-md-8 single-main">				 
			  <div class="single-grid">
			  	<h2>Créer un nouveau Billet</h2>
			  	<form action="index.php" method="post" enctype="multipart/form-data">
			  		 <p>
			  		 	<label>Titre : </label><br />
			  		 	<input type="text" name="createTitle" size="80" required><br />
			  		 	Image d'en tête :<br />
			  		 	<input type="file" name="createImage" /><br />
			  		 	<textarea class="tinymce" name="createContent" required></textarea>
			  		 	<input type="submit" value="Créer" formaction="index.php?action=addNew"/>
			  		 	<input type="submit" value="Aperçu" formaction="index.php?action=preview"/>
					</p>
			  	</form>
			  </div>
			</div>
		  <div class="clearfix"></div>
		  </div>
	  </div>
</div>