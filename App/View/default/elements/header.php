<div class="topbar clearfix" data-dropdown="dropdown" id="header">
    
	<div class="topbar-inner">
        
		<div class="navbar navbar-fixed-top">
            
			<div class="navbar-inner">
                
				<div class="container">
                    
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
                    
					<div class="nav-collapse">
						<ul class="nav">
                            <li class="logo-item"><a class="logo" href="<?= $baseUrl; ?>" title="PPI"><img src="<?= $baseUrl; ?>images/light/ppi-white.png" alt="Logo" height="25"></a></li>
							<li class="<?=$request['controller'] == 'home' ? 'active' : '';?>"><a href="<?= $baseUrl; ?>">Home</a></li>
							<li class="<?=$request['controller'] == 'community' ? 'active' : '';?>"><a href="<?= $baseUrl; ?>community">Community</a></li>
							<li class="<?=$request['controller'] == 'projects' ? 'active' : '';?>"><a href="<?= $baseUrl; ?>projects">Projects</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Documentation <b class="caret icon-white"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?= $baseUrl; ?>docs/getting-started.html">Getting Started</a></li>
									<li><a href="<?= $baseUrl; ?>docs/application.html">The Skeleton Application</a></li>
									<li><a href="<?= $baseUrl; ?>docs/modules.html">Modules</a></li>
									<li><a href="<?= $baseUrl; ?>docs/controllers-and-routing.html">Routing and Controllers</a></li>
								</ul>
							</li>
						</ul>
					</div>
                    
<!--					<div class="search">-->
<!--						<form action="--><?//= $baseUrl; ?><!--search/results" method="get">-->
<!--							<input type="text" name="keyword" id="header-search-input" placeholder="Type, press enter">-->
<!--						</form>-->
<!--					</div>-->
				</div>
			</div>
		</div>
	</div>
</div>