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
				<?php if($post->hasTags()): ?>
				<div class="tags">
					<?php foreach($post->getTags() as $tag): ?>
					<a href="" title="Tags">
						<span class="label label-success"><?=$helper->escape($tag->getTitle());?></span>
					</a>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
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
			<h3>Popular Tags</h3>
			<ul id="popular-tags-content"></ul>
		</div>
		
	</div>
	
</div>
	
<script type="text/template" id="popular-tags-template">
{{#tags}}
<li><a href="{{link}}" title="{{title}}">{{title}} ({{count}})</a></li>
{{/tags}}
</script>