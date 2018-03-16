<?php
$this->title = 'testPost';
?>

<div class="single">
	 <div class="container">
		  <div class="col-md-8 single-main">				 
			  <div class="single-grid">
			  		<h2><?= $post['title'] ?></h2>
					<img src="Content/Images/<?= $post['image'] ?>" alt=""/>						 					 
					<p><?= $post['content'] ?></p>
			  </div>
			 <ul class="comment-list">
		  		   <h5 class="post-author_head">Written by <a href="#" title="Posts by admin" rel="author">admin</a></h5>
		  		   <li><img src="Content/Images/avatar.png" class="img-responsive" alt="">
		  		   <div class="desc">
		  		   <p>View all posts by: <a href="#" title="Posts by admin" rel="author">admin</a></p>
		  		   </div>
		  		   <div class="clearfix"></div>
		  		   </li>
		  	  </ul>
		  	  <?php foreach($coms AS $com) : ?>
		  	  	<p>
		  	  		<h4><?= $com['author'] . ' le ' . $com['datefr'] . '</h4>' ?>
		  	  	<?= $com['content'] ?></p><br>
		  	  <?php endforeach; ?>
			  <div class="content-form">
					 <h3>Leave a comment</h3>
					<form method='post' action="index.php?action=addComment&id=<?=$_GET['id']?>">
						<input type="text" name='author' placeholder="Nom" required/>
						<textarea name='content' placeholder="Message"></textarea>
						<input type="submit" value="AJOUTER"/>
				   </form>
						 </div>
		  </div>
		  <?= $contentSide ?>
		  <div class="clearfix"></div>
		  </div>
	  </div>
</div>