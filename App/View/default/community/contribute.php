<div class="contribute-page">
	<div class="left-side">
		<nav>
		<ul>
			<li><a class="first" href="<?= $baseUrl; ?>contributors" target="_blank">Contributors</a></li>
			<li><a class="first" href="http://www.github.com/ppi" target="_blank">GitHub</a></li>
			<li><a class="first" href="http://www.twitter.com/#!/ppi_framework" target="_blank">Twitter Feed</a></li>
			<li><a class="first" href="<?= $baseUrl; ?>live-chat" target="_blank">Live Chat</a></li>
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
			<li><a href="<?= $baseUrl; ?>">Home</a> <span class="divider">/</span></li>
			<li class="active">Contribute</li>
		</ul>

		<h1>Contributing to PPI</h1>

		<div class="github">
			<h2>Code Contribution</h2>
			<p>The easiest way to contribute to ppi is to fork us on GitHub.</p>
			<p>1) Find a project within PPI that interests you most.</p>
			<p>2) Go to that <a href="<?= $baseUrl; ?>projects">project's</a> Issues area and find an issue that interests you to resolve or look into.</p>
			<img src="<?=$baseUrl;?>images/ppi-projects-issues.png" />
			<p>3) Fork the repo, clone it to your PC, when you're done with changes you can create a Pull Request against the project.</p>
			<img src="<?=$baseUrl;?>images/github-fork.png" />
			<pre><code>git clone git://github.com/YOURUSER/framework.git</code></pre>
			<img src="<?=$baseUrl;?>images/github-pullrequest.png" />
			<p>4) Post back to the original issue you located and inform the PPI guys of your patch, which will get reviewed and discussed.</p>
			<img src="<?=$baseUrl;?>images/github-issues-comment.png" />
			<p>5) You get attribution for your work. Pride. Sense of ownership and hopefully learned a few things in the process.</p>
		</div>

	</div>
	<div class="clear"></div>
</div>
