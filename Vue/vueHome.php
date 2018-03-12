<?php
ob_start();?>

<div class="content">
	 <div class="container">
		 <div class="content-grids">
			 <div class="col-md-8 content-main">
				 <div class="content-grid">					 
					 
					 <?php foreach($posts AS $post): ?>
					 <div class="content-grid-info">
						 <img src="Content/Images/<?= $post['image']?> " alt=""/>
						 <div class="post-info">
						 <h4><a href="?action=post&id= <?=$post['id'] .'">' .  $post['title'] . '</a>' . $post['datefr'] . ' / ' . ' Commentaires</h4>'?>
						 <p><?= $post['content'] ?></p>
						 <a href="?action=post&id=<?=$post['id']?>"><span></span>VOIR PLUS</a>
						 <?php
						 if(isset($_SESSION['admin'])){
						 echo '<a href="?action=delete&id=<?=$post[\'id\']?>"><span></span>SUPPRIMER</a>';
						}?>
						 </div>
					 </div>
					 <?php endforeach; ?>
					 <div id="pagination">
					 	<button><a href="?page=0"> << </a></button>
					 	<button><a href="?page=<?= $pPrec ?>"> < </a></button>
					 	<span>Page <?= $pActu . ' / ' . ($pTotal+1) ?></span>
					 	<button><a href="?page=<?= $pSuiv ?>"> > </a></button>
					 	<button><a href="?page=<?= $pTotal ?>"> >> </a></button>
					 </div>
				 </div>
			  </div>
			  <?= $contentSide ?>
			  <div class="clearfix"></div>
		  </div>
	  </div>
</div>

<?php
$contentBody = ob_get_clean();?>