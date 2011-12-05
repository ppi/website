<div class="contribute-page">
	<div class="left-side">
	<?= include($viewDir . 'community/elements/leftnav.php'); ?>
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
