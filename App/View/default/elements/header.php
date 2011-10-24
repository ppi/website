<div id="header">
	<div class="header-container">
		<div class="fl header-left"></div>
		<div class="fl rel header-middle">

			<nav>
<!--				<div><a href="--><?//= $baseUrl; ?><!--about" title="About">About</a></div>-->
				<div class="downloads">
					<?php if($request['controller'] == 'downloads'): ?>
					<div class="active"></div>
					<?php endif; ?>
					<a href="<?= $baseUrl; ?>downloads" title="Downloads" class="<?= $request['controller'] == 'downloads' ? 'active' : ''; ?>">Downloads</a>
				</div>
				<div class="docs">
					<a href="<?= $baseUrl; ?>docs" title="Documentation">Documentation</a>
				</div>
				<div class="community">
					<?php if($request['controller'] == 'community'): ?>
					<div class="active"></div>
					<?php endif; ?>
					<a href="<?= $baseUrl; ?>community" title="Community" class="<?= $request['controller'] == 'community' ? 'active' : ''; ?>">Community</a>
				</div>
			</nav>

			<a href="<?= $baseUrl; ?>" title="PPI Framework"><img class="abs" src="<?= $baseUrl; ?>images/icons-logo.png" alt="PPI Logo"></a>
			<div class="facebooklike-container">
				<iframe src="http://www.facebook.com/plugins/like.php?app_id=272550266089007&amp;href=http%3A%2F%2Fwww.ppiframework.com&amp;send=false&amp;layout=button_count&amp;width=108&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font=verdana&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:108px; height:21px;" allowTransparency="true"></iframe>
			</div>
			<div class="gplusone-container"><div class="g-plusone" data-size="medium" data-annotation="inline" data-width="120" href="http://www.ppiframework.com"></div></div>
			<div class="twitterlike-contaner">
				<a href="http://twitter.com/share" class="twitter-share-button" data-url="http://www.ppiframework.com" data-text="PPI Framework" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
			</div>
		</div>
		<div class="fl header-right"></div>
	</div>
</div>
<div class="clearfix"></div>
<div class="header-separator"></div>
