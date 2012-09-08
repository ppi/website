<div id="blog-index" class="clearfix">
	
	<div class="left-side">
		
		<?php
		foreach($posts as $post):
			
			$created = $post->getCreatedDate();
			$urlLink = $baseUrl . 'blog/' . $post->getID() . '/' . 
				str_replace(' ', '-', strtolower($post->getTitle()));
		?>
		
		<div class="post">
			<h1 class="post-title"><a href="<?=$urlLink;?>" title="<?=$post->getTitle();?>"><?=$post->getTitle();?></a></h1>
			<div class="post-thumbnail"></div>
			<div class="post-content">
				<?=$post->getShortContent();?>
			</div>
			
			<div class="post-meta">
				<a href="<?=$urlLink;?>" title="Continue Reading" class="more-link">Continue Reading &raquo;</a>
				<a class="num-comments" href="" title="Comment on Create an 'Excellent' Cosmic – Composition">7 Comments</a>
			</div>
			
			<div class="date-area">
				<div class="inner">
					<span><?=$created->format('M');?></span>
					<span class="day"><?=$created->format('j');?></span>
					<span><?=$created->format('Y');?></span>
				</div>
			</div>
			
		</div>
		<?php endforeach;?>
		
	</div>
	<div class="right-side">
		
<!--		<div class="section">-->
<!--			<form>-->
<!--				<input type="text" name="search"> <input type="submit" value="Search">-->
<!--			</form>-->
<!--		</div>-->
		
		<div class="section">
			<h3>Categories</h3>
			<ul>
				<li><a href="" title="">Lorem upsum dolor sit</a></li>
				<li><a href="" title="">Lorem upsum dolor sit</a></li>
				<li><a href="" title="">Lorem upsum dolor sit</a></li>
				<li><a href="" title="">Lorem upsum dolor sit</a></li>
				<li><a href="" title="">Lorem upsum dolor sit</a></li>
			</ul>

		</div>
		
		<div class="section">
			<h3>Recent Comments</h3>
			<ul>
				<li><a href="" title="">Lorem upsum dolor sit</a></li>
				<li><a href="" title="">Lorem upsum dolor sit</a></li>
				<li><a href="" title="">Lorem upsum dolor sit</a></li>
				<li><a href="" title="">Lorem upsum dolor sit</a></li>
				<li><a href="" title="">Lorem upsum dolor sit</a></li>
			</ul>
		</div>
		
	</div>
	
</div>