<?php
	include 'includes/header.php';

	$sql_fetch_posts= (isset($_GET['category'])) ? "SELECT * FROM tbl_posts WHERE post_category='".mysqli_real_escape_string($link,$_GET['category'])."'" : "SELECT * FROM tbl_posts";

	$result= $link->query($sql_fetch_posts);
?>
          <div class="blog-header">
	        <div class="container">
	          <h1 class="blog-title">E-Rozgaar Blog</h1>
	          <p class="lead blog-description">Lets make learning possible.</p>
	        </div>
	      </div>
	      <?php 
	      	if($result->num_rows >0 ){

	      		while($post= $result->fetch_assoc()){ ?>

	      		<div class="blog-post">
		            <h2 class="blog-post-title"><a href="single.php?post=<?php echo $post['id']; ?>"><?php echo $post['post_title']; ?></a></h2>
		            <p class="blog-post-meta"><?php echo $post['date_time']; ?> by <a href="#"><?php echo $post['post_author']; ?></a></p>
		            <div class="post-body">
		            	<?php $post_body =$post['post_body']; 
		            		   echo substr($post_body, 0, 350).'...';
		            	?>
		            </div> 
		            <a href="single.php?post=<?php echo $post['id']; ?>" class="btn btn-sm btn-primary">Read more</a>
          		</div><!-- /.blog-post -->
	      		<?php 
	      		}


	      	}
	      ?>
          
			
        <?php 
        	include "includes/sidebar.php";
        	include "includes/footer.php";

        ?>
