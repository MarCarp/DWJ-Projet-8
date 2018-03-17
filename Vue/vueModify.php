<?php
$this->title = 'testModify';
?>

<div class="single">
	 <div class="container">
		  <div class="col-md-8 single-main">				 
			  <div class="single-grid">
			  	<h2>Modifier</h2>
			  	<form action="index.php?" method="post" enctype="multipart/form-data">
			  		 <p>
			  		 	Formulaire d'envoi de fichier :<br />
			  		 	<input type="file" name="createImage" /><br />
			  		 	<input type="submit" value="Envoyer le fichier" />
			  		 	<img src="Content/Images/Default.jpg" alt=""/>
			  		 	<textarea class="tinymce"><?= $post['content']?></textarea>
			  		 </p>
			  	</form>
			  </div>
			</div>
		  <div class="clearfix"></div>
		  </div>
	  </div>
</div>