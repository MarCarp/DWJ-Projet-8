<?php
$this->_title = 'testIndex';
extract($pages);
?>

<div class="content">
	 <div class="container">
		 <div class="content-grids">
			 <div class="col-md-8 content-main">
				 <div class="content-grid">
				 	<div id="message"></div>
				 	<?php
				 	if(isset($_SESSION['admin']))
				 	{
				 	?>
				 		<div class="content-grid-info">
				 			<div class="post-info" id="newPost">
				 				<a href="?action=create"><span class="create"></span>NOUVEAU BILLET (Admin)</a>
				 			</div>
				 		</div>
				 	<?php
				 	}
				 	foreach($posts AS $post): ?>
					 <div class="content-grid-info">
						 <img src="Content/Images/<?= $post['image']?> " alt=""/>
						 <div class="post-info">
						 <h4><a href="?action=post&id= <?=$post['id'] .'">' .  $post['title'] . '</a>' . $post['datefr'] . ' / ' . $post['coms'] .' Commentaires</h4>'?>
						 <p><?= $post['content'] ?></p>
						 <a href="?action=post&id=<?=$post['id']?>"><span></span>VOIR PLUS</a><br />
						 <?php
						 if(isset($_SESSION['admin'])){
						 	echo '<a href="?action=modify&id=' . $post['id'] . '"><span class="modify"></span>MODIFIER (Admin)</a><br />';
						 	echo '<a href="?action=delete&id=' . $post['id'] . '"><span class="delete"></span>SUPPRIMER (Admin)</a>';
						}?>
						 </div>
					 </div>
					 <?php endforeach;?>
					 <div id="htPagination">
					 	<a href="?page=0"> << </a>
					 	<a href="?page=<?= $pPrec ?>"> < </a>
					 	<span>Page <?= $pActu . ' / ' . ($pTotal+1) ?></span>
					 	<a href="?page=<?= $pSuiv ?>"> > </a>
					 	<a href="?page=<?= $pTotal ?>"> >> </a>
					 </div>
				 </div>
			  </div>
			  <?= $contentSide ?>
			  <div class="clearfix"></div>
		  </div>
	  </div>
</div>