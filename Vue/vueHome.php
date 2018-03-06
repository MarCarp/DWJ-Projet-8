<?php
ob_start();?>

<div class="content">
	 <div class="container">
		 <div class="content-grids">
			 <div class="col-md-8 content-main">
				 <div class="content-grid">					 
					 
					 <?php foreach($posts AS $post) :
					 $comCount = $comMng->comCount($post['id']);
					 ?>
					 <div class="content-grid-info">
						 <img src="Content/Images/<?= $post['image']?> " alt=""/>
						 <div class="post-info">
						 <h4><a href="?action=post&id=<?=$post['id'] . '">' . $post['title'] . '</a>' . $post['datefr'] . ' / ' . $comCount['comCount'] .' Commentaires</h4>'?>
						 <p><?= $post['content'] ?></p>
						 <a href="?action=post&id=<?=$post['id']?>"><span></span>VOIR PLUS</a>
						 </div>
					 </div>
					 <?php endforeach; ?>

				 </div>
			  </div>
			  <?= $contentSide ?>
			  <div class="clearfix"></div>
		  </div>
	  </div>
</div>

<?php
$contentBody = ob_get_clean();?>