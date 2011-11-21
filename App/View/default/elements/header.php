<div class="topbar" data-dropdown="dropdown" id="header">
  <div class="topbar-inner">
    <div class="container">
      <h3>
		<a class="logo" href="<?= $baseUrl; ?>" title="PPI"><img src="<?= $baseUrl; ?>images/light/ppi-white.png" alt="Logo" height="25"></a></h3>
      <ul class="nav">
        <li class="active"><a href="<?= $baseUrl; ?>">Home</a></li>
        <li><a href="<?= $baseUrl; ?>community" title="Community">Community</a></li>
        <li><a href="<?= $baseUrl; ?>projects" title="Projects">Projects</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle">Documentation</a>
          <ul class="dropdown-menu">
            <li><a href="#">Getting Started</a></li>
            <li><a href="#">Controllers</a></li>
            <li><a href="#">DataSource</a></li>
            <li><a href="#">Views</a></li>
            <li><a href="#">Cache</a></li>
            <li><a href="#">Sessions</a></li>
            <!-- <li class="divider"></li> -->
          </ul>
        </li>
      </ul>
	  <div class="search">
	    <input type="text" placeholder="Type, press enter">
      </div>
    </div>
  </div>
</div>
<!-- 
<div id="header">
	
	<div id="header-inner">
		<a class="logo" href="<?= $baseUrl; ?>" title="PPI"><img src="<?= $baseUrl; ?>images/light/ppi-white.png" alt="Logo" height="38"></a>
		<nav>
			<ul>
				<li><a href="" title="Get Started">Get Started</a></li>
				<li><a href="" title="Documentation">Documentation</a></li>
				<li><a href="<?= $baseUrl; ?>community" title="Community">Community</a></li>
				
			</ul>
		</nav>
		
		
		<!-- 
		<div class="social clear">
			<div class="item twitterlike-contaner">
				<a href="http://twitter.com/share" class="twitter-share-button" data-url="http://www.ppi.io" data-text="PPI Framework" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
			</div>
			<div class="item facebooklike-container">
				<iframe src="http://www.facebook.com/plugins/like.php?app_id=272550266089007&amp;href=http%3A%2F%2Fwww.ppi.io&amp;send=false&amp;layout=button_count&amp;width=35&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font=verdana&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:85px; height:21px;" allowTransparency="true"></iframe>
			</div>
<!--			<div class="item gplusone-container"><div class="g-plusone" data-size="medium" data-annotation="inline" data-width="30" href="http://www.ppi.io"></div></div>-->
		<!--</div>
	</div>
</div> -->