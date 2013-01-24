<?php $view->extend('::base.html.php'); ?>
<?php $view['slots']->set('title', 'PPI Framework - Blog');?>

<?php $view['slots']->start('include_css'); ?>
<link href="<?=$view['assets']->getUrl('blog/css/blog.css');?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/libs/mustache.js');?>"></script>
<script type="text/javascript" src="<?=$view['assets']->getUrl('blog/js/blog.js');?>"></script>
<?php $view['slots']->stop(); ?>

<div id="blog-index" class="clearfix">
	
    
    <div style="display: none"><img src="<?=$view['assets']->getUrl('images/opengraph.png');?>" alt="PPI Framework"></div>
    
	<div class="left-side">
		
		<?php
		foreach($posts as $post):
			
			$created = $post->getCreatedDate();
			$urlLink =  'blog/' . $post->getID() . '/' . str_replace(' ', '-', strtolower($post->getTitle()));
            $urlLink = $view['assets']->getUrl($urlLink);
		?>
		
		<div class="post">
			<h1 class="post-title"><a href="<?=$urlLink;?>" title="<?=$post->getTitle();?>"><?=$post->getTitle();?></a></h1>
			<div class="post-thumbnail"></div>
			<div class="post-content"><?=$post->getDescription();?></div>
			
			<div class="post-meta">
				<a href="<?=$urlLink;?>" title="Continue Reading" class="more-link">Continue Reading &raquo;</a>
				<?php if($post->hasTags()): ?>
				<div class="tags">
					<?php
                    foreach($post->getTags() as $tag):
                        $tagLink = $view['router']->generate('BlogTagView', array('tagID' => $tag->getID(), 'title' => strtolower($tag->getTitle())));
                    ?>
					<a href="<?=$tagLink;?>" title="Tags" class="label label-success"><?=$view->escape($tag->getTitle());?></a>
					<?php
                    endforeach;
                    ?>
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
            <div class="social-icons">
                <a href="http://twitter.com/ppi_framework" target="_blank"><img src="<?= $view['assets']->getUrl('images/twitter2.png');?>" alt="Twitter" width="48" /></a>
                <a href="https://plus.google.com/communities/100606932222119087997" target="_blank"><img src="<?= $view['assets']->getUrl('images/googleplus.png');?>" width="48" /></a>
<!--                <a href="--><?//=$view['router']->generate('BlogGetRSS');?><!--"><img src="--><?//= $view['assets']->getUrl('images/rss.png');?><!--" width="48" /></a>-->
            </div>
        </div>
		
		<div class="section">
			<h3>Popular Tags</h3>
			<ul id="popular-tags-content">
			    <li class="ajax-loader"></li>
			</ul>
		</div>
        
        <div class="section">
			<h3>Recent Comments</h3>
			<ul id="recent-comments-content">
			    <li class="ajax-loader"></li>
			</ul>
		</div>
		
	</div>
	
</div>
	
<script type="text/template" id="popular-tags-template">
{{#tags}}
<li><a href="{{link}}" title="{{title}}">{{title}} ({{count}})</a></li>
{{/tags}}
</script>

<script type="text/template" id="recent-comments-template">
{{#comments}}
<li>
    <a href="{{link}}" title="{{title}}">{{title}}</a>
    <p>{{description}}</p>
</li>
{{/comments}}
</script>