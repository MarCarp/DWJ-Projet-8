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
						 <h4><a href="?action=post&id=<?=$post['id'] . '">' . $post['title'] . '</a>' . $post['datefr'] . ' / ' . $comCount['comCount'] .' Commentaires</h4>'?>
						 <p><?= $post['content'] ?></p>
						 <a href="?action=post&id=<?=$post['id']?>"><span></span>VOIR PLUS</a>
						 </div>
					 </div>
					 <?php endforeach; ?>
					 <div id="pagination">
					 	<button disabled><a href="?page=0"> << </a></button>
					 	<button><a href="#"> < </a></button>
					 	<span>Page <?= (1+(int)$_GET['page']) ?></span>
					 	<button><a href="?page=2"> > </a></button>
					 	<button><a href="#"> >> </a></button>
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