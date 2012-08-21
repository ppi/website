<div class="topbar clearfix" data-dropdown="dropdown" id="header">
	<div class="topbar-inner">
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<div class="nav-collapse">
						<ul class="nav">
                            <li><a class="logo" href="<?= $baseUrl; ?>" title="PPI"><img src="<?= $baseUrl; ?>images/light/ppi-white.png" alt="Logo" height="25"></a></li>
							<li class="<?=$request['controller'] == 'home' ? 'active' : '';?>"><a href="<?= $baseUrl; ?>">Home</a></li>
							<li class="<?=$request['controller'] == 'community' ? 'active' : '';?>"><a href="<?= $baseUrl; ?>community" title="Community">Community</a></li>
							<li class="<?=$request['controller'] == 'projects' ? 'active' : '';?>"><a href="<?= $baseUrl; ?>projects" title="Projects">Projects</a></li>
							<li class="<?=$request['controller'] == 'api' ? 'active' : '';?>"><a href="<?=$baseUrl;?>api">Manual</a></li>
						</ul>
					</div>
				    	<div class="search">
					    <form action="<?= $baseUrl; ?>search/results" method="get">
						<input type="text" name="keyword" placeholder="Type, press enter" id="header-search-input">
					    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>