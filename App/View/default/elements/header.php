<div class="topbar" data-dropdown="dropdown" id="header">
  <div class="topbar-inner">
    <div class="container">
		<h3><a class="logo" href="<?= $baseUrl; ?>" title="PPI"><img src="<?= $baseUrl; ?>images/light/ppi-white.png" alt="Logo" height="25"></a></h3>
		<ul class="nav">
			<li class="<?=$request['controller'] == 'home' ? 'active' : '';?>"><a href="<?= $baseUrl; ?>">Home</a></li>
			<li class="<?=$request['controller'] == 'community' ? 'active' : '';?>"><a href="<?= $baseUrl; ?>community" title="Community">Community</a></li>
			<li class="<?=$request['controller'] == 'projects' ? 'active' : '';?>"><a href="<?= $baseUrl; ?>projects" title="Projects">Projects</a></li>
			<li class="dropdown <?=$request['controller'] == 'docs' ? 'active' : '';?>">
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
			<li class="<?=$request['controller'] == 'api' ? 'active' : '';?>"><a href="<?= $baseUrl; ?>api" title="Manual">Manual</a></li>
		</ul>
		<div class="search">
			<form action="<?= $baseUrl; ?>search/results" method="get">
				<input type="text" name="keyword" placeholder="Type, press enter" id="header-search-input">
			</form>
		</div>
    </div>
  </div>
</div>