<div class="topbar clearfix" data-dropdown="dropdown" id="header">
    <div class="topbar-inner">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="logo logoFix" style="display: none;" href="<?=$view['router']->generate('Homepage');?>" title="PPI"><img src="<?=$view['assets']->getUrl('images/ppi-white.png');?>" alt="Logo" height="25"></a>
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li class="logo-item"><a class="logo" href="<?=$view['router']->generate('Homepage');?>" title="PPI"><img src="<?=$view['assets']->getUrl('images/ppi-white.png');?>" alt="Logo" height="25"></a></li>
                            <li class=""><a href="<?=$view['router']->generate('Homepage');?>">Home</a></li>
                            <li class=""><a href="<?=$view['router']->generate('About');?>">About</a></li>
                            <li class=""><a href="<?=$view['router']->generate('Blog');?>">Blog</a></li>
                            <li class=""><a href="<?=$view['router']->generate('Community');?>">Community</a></li>
                            <li class=""><a href="<?=$view['router']->generate('Downloads');?>">Downloads</a></li>
                            <li class=""><a href="http://docs.ppi.io/latest/" title="Documentation">Documentation</a></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
