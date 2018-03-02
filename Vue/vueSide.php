<?php
ob_start();?>

<div class="col-md-4 content-right">
				 <div class="recent">
					 <h3>DERNIERS BILLETS</h3>
					 <ul>
						<?php foreach($topPosts AS $topPost) : ?>
							<li><a href="?action=post&id=<?= $topPost['id'] . '">' . $topPost['title'] . '</a></li>'?>
						<?php endforeach; ?>
					 </ul>
				 </div>
				 <div class="comments">
					 <h3>DERNIERS COMMENTAIRES</h3>
					 <ul>
					 	<?php foreach($topComs AS $topCom) : ?>
					 		<li><a href="#">Amada Doe </a> on <a href="#">Hello World!</a></li>
					 	<?php endforeach; ?>
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
				 <!--
				 <div class="categories">
					 <h3>CATEGORIES</h3>
					 <ul>
					 <li><a href="#">Vivamus vestibulum nulla</a></li>
					 <li><a href="#">Integer vitae libero ac risus e</a></li>
					 <li><a href="#">Vestibulum commo</a></li>
					 <li><a href="#">Cras iaculis ultricies</a></li>
					 </ul>
				 </div>
				-->
				 <div class="clearfix"></div>
				</div>
<?php
$contentSide = ob_get_clean();?>