<div class="topbar" data-dropdown="dropdown" id="header">
  <div class="topbar-inner">
    <div class="container">
		<h3><a class="logo" href="<?= $baseUrl; ?>" title="PPI"><img src="<?= $baseUrl; ?>images/light/ppi-white.png" alt="Logo" height="25"></a></h3>
		<ul class="nav">
			<li class="active"><a href="<?= $baseUrl; ?>">Home</a></li>
			<li><a href="<?= $baseUrl; ?>community" title="Community">Community</a></li>
			<li><a href="<?= $baseUrl; ?>projects" title="Projects">Projects</a></li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle">Documentation</a>
			  <ul class="dropdown-menu">
				<li><a href="<?= $baseUrl; ?>docs/getting-started.html">Getting Started</a></li>
				<li><a href="<?= $baseUrl; ?>docs/controller.html">Controllers</a></li>
				<li><a href="<?= $baseUrl; ?>docs/datasource.html">DataSource</a></li>
				<li><a href="<?= $baseUrl; ?>docs/views.html">Views</a></li>
				<li><a href="<?= $baseUrl; ?>docs/cache.html">Cache</a></li>
				<li><a href="<?= $baseUrl; ?>docs/session.html">Sessions</a></li>
				<!-- <li class="divider"></li> -->
			  </ul>
			</li>
			<li><a href="<?= $baseUrl; ?>api" title="Manual">Manual</a></li>
		</ul>
		  <div class="search">
			<input type="text" placeholder="Type, press enter">
		  </div>
    </div>
  </div>
</div>