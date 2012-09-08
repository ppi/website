<div id="blog-index" class="clearfix">
	
	<div class="left-side">
		
		<?php
		$created = $post->getCreatedDate();
		$content = str_replace('[split]', '', $post->getContent());
		?>
		
		<div class="post">
			<h1 class="post-title"><a href="" title="<?=$post->getTitle();?>"><?=$post->getTitle();?></a></h1>
			<div class="post-thumbnail"></div>
			<div class="post-content">
				<?=$content;?>
			</div>
			
			<div class="date-area">
				<div class="inner">
					<span><?=$created->format('M');?></span>
					<span class="day"><?=$created->format('j');?></span>
					<span><?=$created->format('Y');?></span>
				</div>
			</div>
			
			<div class="comments">
				
				<div id="disqus_thread"></div>
				<script type="text/javascript">
					/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
					var disqus_shortname = 'ppiframework'; // required: replace example with your forum shortname
			
					/* * * DON'T EDIT BELOW THIS LINE * * */
					(function() {
						var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
						dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
						(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
					})();
				</script>
				<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
				
			</div>
			
		</div>
		
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