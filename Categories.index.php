<div id="main" class="grid_8 alpha">

    <article class="post">
    
		<aside class="widget">
			<h3>Categories</h3>
			<ul>
				<?php
				$category = new GetCategories;
				$categories = $category->getCategories();
				
				foreach($categories as $c)
				{
					global $c;
					echo "<li><a href='/index.php?category=" . $c['id'] . "'>" . $c['name'] . "</a></li>";
				}
				?>
				<!-- <li><a href="#">Li element</a></li>
				<li><a href="#">Li element</a></li>
				<li><a href="#">Li element</a></li>
				<li><a href="#">Li element</a></li>
				<li><a href="#">Li element</a></li> -->
			</ul>
		</aside> <!-- end widget -->

        
        <div class="clear"></div>  
            
    </article> <!-- end post 1 -->
    
</div> <!-- end main -->
