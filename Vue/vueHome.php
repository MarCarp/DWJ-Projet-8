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
						 <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis.</p>
						 <a href="?action=post&id=<?=$post['id']?>"><span></span>VOIR PLUS</a>
						 </div>
					 </div>
					 <?php endforeach; ?>
					 
				 </div>
			  </div>
			  <div class="col-md-4 content-right">
				 <div class="recent">
					 <h3>RECENT POSTS</h3>
					 <ul>
					 <li><a href="#">Aliquam tincidunt mauris</a></li>
					 <li><a href="#">Vestibulum auctor dapibus  lipsum</a></li>
					 <li><a href="#">Nunc dignissim risus consecu</a></li>
					 <li><a href="#">Cras ornare tristiqu</a></li>
					 </ul>
				 </div>
				 <div class="comments">
					 <h3>RECENT COMMENTS</h3>
					 <ul>
					 <li><a href="#">Amada Doe </a> on <a href="#">Hello World!</a></li>
					 <li><a href="#">Peter Doe </a> on <a href="#"> Photography</a></li>
					 <li><a href="#">Steve Roberts  </a> on <a href="#">HTML5/CSS3</a></li>
					 </ul>
				 </div>
				 <div class="clearfix"></div>
				 <div class="archives">
					 <h3>ARCHIVES</h3>
					 <ul>
					 <li><a href="#">October 2013</a></li>
					 <li><a href="#">September 2013</a></li>
					 <li><a href="#">August 2013</a></li>
					 <li><a href="#">July 2013</a></li>
					 </ul>
				 </div>
				 <div class="categories">
					 <h3>CATEGORIES</h3>
					 <ul>
					 <li><a href="#">Vivamus vestibulum nulla</a></li>
					 <li><a href="#">Integer vitae libero ac risus e</a></li>
					 <li><a href="#">Vestibulum commo</a></li>
					 <li><a href="#">Cras iaculis ultricies</a></li>
					 </ul>
				 </div>
				 <div class="clearfix"></div>
			  </div>
			  <div class="clearfix"></div>
		  </div>
	  </div>
</div>

<?php
$contentBody = ob_get_clean();?>