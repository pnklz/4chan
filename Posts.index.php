<div id="main" class="grid_8 alpha">
<?php
date_default_timezone_set('America/Los_Angeles');
$p = new GetPosts($_GET['category']);
$posts = $p->getPosts(5, 1);
foreach($posts as $post)
{
	?>
	<article class="post">
    
        <h2><a href="#"><?=$post['title']?></a></h2>
        
        <a href="#"><img src="<?=full_upload_path($post['image'])?>" alt="" class="thumbnail alignleft" /></a>
        
        <p>
			<?=$post['content']?>
        </p>
        <div class="clear"></div>  
        
        <footer class="postmeta">
            <span class="btn alignleft">
            	In <a href="#"><?php

echo $c?></a> by <a href="#"><?=$post['author']?></a> on <time datetime="<?=$post['when']?>" pubdate><?=$post['when']?></time>
			</span>
            <a href="#" class="more-link alignright">Read more</a>
        </footer> <!-- end post meta -->
    
    </article> <!-- end post 1 -->
	<?php
}
?>
</div> <!-- end main -->
