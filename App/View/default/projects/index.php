<div class="projects-page">
	<div class="left-side">
		<nav>
		<ul>
			<li><a class="first" href="http://www.ppi.io/contributors" target="_blank">Contributors</a></li>
			<li><a class="first" href="http://www.github.com/ppi" target="_blank">GitHub</a></li>
			<li><a class="first" href="http://www.twitter.com/#!/ppi_framework" target="_blank">Twitter Feed</a></li>
			<li><a class="first" href="http://www.ppi.io/live-chat" target="_blank">Live Chat</a></li>
			<li><a class="first" href="" target="_blank">How to get involved?</a></li>
			<li class="box">
				<p class="title">PPI IRC Network</p>
				<p class="details">
					<strong>Server:</strong> irc.freenode.org<br>
					<strong>Channel:</strong> #ppi
				</p>
				<p><a class="btn success" href="<?= $baseUrl; ?>live-chat" target="_blank">Connect</a></p>
			</li>
			<li class="box newsletter-box">
				<p class="title">PPI Newsletter</p>
				<div class="form">
					<p>Email</p> <input id="newsletter-email" name="email" type="text" placeholder="Type email, press enter." /></p>
					<div class="clear"></div>
					<input type="submit" class="btn success submit" href="<?= $baseUrl; ?>live-chat" target="_blank" value="Subscribe">
				</div>
			</li>
		</ul>
		</nav>
		
	</div>
	<div class="content-box">
		
		<ul class="breadcrumb">
			<li><a href="#">Home</a> <span class="divider">/</span></li>
			<li class="active">Projects</li>
		</ul>
		
		<h1>Projects</h1>

		<div class="projects-list">
		<?php
		foreach($projects as $project):
		?>
			<div class="project">
				<div class="title"><?= $project['title']; ?></div>
				<div class="description"><?= $helper->escape($project['desc']); ?></div>
				<div class="actions">
					<a href="<?= $project["tracker"];?>" target="_blank" class="readmore">Tracker</a>
					<a href="<?= $project["discussions"];?>" target="_blank" class="readmore">Discussions</a>
					<a href="<?= $project["source"];?>" target="_blank" class="readmore">Source Code</a>
					<a href="<?= $project["download"];?>" target="_blank" class="readmore">Download</a>
					<div class="clear"></div>
				</div>
			</div>
		<?php
		endforeach;
		?>
		</div>
	</div>
	<div class="clear"></div>
</div>
