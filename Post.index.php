<div id="main" class="grid_8 alpha">
<?php
$post = GetPosts::getPostId($_GET['post']);
$cat = GetCategories::nameForId($post['category_id']);
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
            	In <a href="?category=<?php echo $_GET['category']; ?>"><?=$cat?></a> by <a href="#"><?=$post['author']?></a> on <time datetime="<?=$post['when']?>" pubdate><?=$post['when']?></time>
			</span>
            <a href="#" class="more-link alignright">Read more</a>
        </footer> <!-- end post meta -->
    
    </article> <!-- end post 1 -->
</div> <!-- end main -->
