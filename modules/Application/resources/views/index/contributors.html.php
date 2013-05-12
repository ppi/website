<?php $view->extend('::base.html.php'); ?>

<?php $view['slots']->start('include_css'); ?>
<link href="<?=$view['assets']->getUrl('css/community.css');?>" rel="stylesheet">
<link href="<?=$view['assets']->getUrl('css/contributors.css');?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/community.js');?>"></script>
<?php $view['slots']->stop(); ?>

<div class="contributors-page community-page">
    <div class="left-side">
    <?=$view->render('Application:index:community_leftnav.html.php');?>
    </div>
    <div class="content-box">
        
        <ul class="breadcrumb">
            <li><a href="<?=$view['router']->generate('Homepage');?>">Home</a> <span class="divider">/</span></li>
            <li class="active">Contributors</li>
        </ul>
        
        <h1>Contributors</h1>
        
        <div class="projects-list">
        
            <p>The following people are considered core developers of ppi2. Feel free to reach out to them for questions or support.</p>
            <div class="project">
                <div class="title">PPI Project</div>
                 <p>Paul Dragoonis - Twitter: <a target="_blank" href="http://twitter.com/dr4goonis" title="twitter">@dr4goonis</a> - Email: paul[at]ppi.io</p>
                 <p>Vítor Brandão - Twitter: <a target="_blank" href="http://twitter.com/noiselabs" title="twitter">@noiselabs</a> - Email: vitor[at]ppi.io</p>
                 <p>Alfredo Juarez - Twitter: <a target="_blank" href="http://twitter.com/alfrekjv" title="twitter">@alfrekjv</a> - Email: alfredo[at]ppi.io</p>
            </div>
            
            <p class="intro">As ppi2 is constructed of components from existing libraries, we directly reached out to the core developers of those projects for assistance and advice on how to get the best out of their library. In addition to this, several members of the open source community have really helped too. The following people have been extremely influential in the creation process of ppi2. Viva la PHP community!</p>

            <div class="project">
                <div class="title">Symfony Project</div>
                <p>Christophe Coevoet (<a target="_blank" href="http://twitter.com/Stof70" title="twitter">@Stof70</a>)</p>
                <p>Lukas Kahwe Smith (<a target="_blank" href="http://twitter.com/lsmith" title="twitter">@lsmith</a>)</p>
                <p>Kris Wallsmith (<a target="_blank" href="http://twitter.com/kriswallsmith" title="twitter">@kriswallsmith</a>)</p>
                <p>Fabien Potencier (<a target="_blank" href="http://twitter.com/fabpot" title="twitter">@fabpot</a>)</p>
            </div>
            
            <div class="project">
                <div class="title">Zend Framework</div>
                <p>Evan Coury (<a target="_blank" href="http://twitter.com/EvanDotPro" title="twitter">@EvanDotPro</a>)</p>
                <p>Marco Pivetta (<a target="_blank" href="http://twitter.com/Ocramius" title="twitter">@Ocramius</a>)</p>
                <p>Ralph Schindler (<a target="_blank" href="http://twitter.com/ralphschindler" title="twitter">@ralphschindler</a>)</p>
                <p>Matthew Weier O'Phinney (<a target="_blank" href="http://twitter.com/weierophinney" title="twitter">@weierophinney</a>)</p>
            </div>
            
            <div class="project">
                <div class="title">Composer Project</div>
                <p>Jordi Boggiano  (<a target="_blank" href="http://twitter.com/Seldaek" title="twitter">@Seldaek</a>)</p>
                <p>Nils Adermann (<a target="_blank" href="http://twitter.com/naderman" title="twitter">@naderman</a>)</p>
            </div>
            
            <div class="project">
                <div class="title">Doctrine Project</div>
                <p>Guilherme Blanco (<a target="_blank" href="http://twitter.com/guilhermeblanco" title="twitter">@guilhermeblanco</a>)</p>
            </div>

            <div class="project">
                <div class="title">FuelPHP Project</div>
                <p>Frank de Jonge (<a target="_blank" href="http://twitter.com/frankdejonge" title="twitter">@frankdejonge</a>)</p>
            </div>

            <div class="project">
                <div class="title">Laravel Project</div>
                <p>Taylor Otwell (<a target="_blank" href="http://twitter.com/taylorotwell" title="twitter">@taylorotwell</a>)</p>
            </div>
            
            <div class="project">
                <div class="title">PHP Community Members</div>
                <p>Beau D. Simensen (<a target="_blank" href="http://twitter.com/kirkryyn" title="twitter">@kirkryyn</a>)</p>
                <p>Stefan Koopmanschap  (<a target="_blank" href="http://twitter.com/skoop" title="twitter">@skoop</a>)</p>
            </div>
            
            <p>Special thanks to these guys who are early adopters of ppi2, the project's you've made on ppi2 have helped us solidify the core framework and make a feature-rich framework stack.</p>
            
            <div class="project">
                <div class="title">Early Adopters</div>
                <p>Sean Warren Koole (<a target="_blank" href="http://twitter.com/seankoole" title="twitter">@seankoole</a>)</p>
            </div>
            
            <p>Our hosting services have been donated by ZenMedia. Special thanks goes out to them.</p>
            
            <div class="project">
                <div class="title">Donators</div>
                <p>Ryan Cummins - Website: <a target="_blank" href="http://www.zenmedia.co.uk" title="website">www.zenmedia.co.uk</a></p>
            </div>
            
       </div> <!-- /.projects-list -->
    </div>
    <div class="clear"></div>
</div>
