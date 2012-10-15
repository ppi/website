<?php
$toc = array(
    'downloading-ppi' => 'Downloading PPI',
    'system-requirements' => 'System Requirements'
);
?>

<div id="toc-data"><?=json_encode($toc);?></div>

<div class="content-box docs-page">

    <section class='content'>

        <a class="next-article top btn btn-green" href="<?=$view['router']->generate('DocsIndex', array('page' => 'application'));?>">The Skeleton Application <i class="icon-arrow-right icon-white"></i></a>

        <h1>Getting Started</h1>

<!--				<p id='standing-on-the-shoulders-of-giants' class="section-title">Standing on the shoulders of giants</p>-->
<!---->
<!--				<p>PPI has pre-integrated the best features from existing frameworks for you, allowing you to just-->
<!--					utilize-->
<!--					them at will with no tedious integration process. We're re-using the power of Symfony2 for Routing,-->
<!--					Request, Response, Templating and Class Autoloading. ZendFramework2's Module component to provide-->
<!--					simple-->
<!--					and clean modularity in your application. For database abstraction of the PDO library we're using-->
<!--					Doctrine2's clean DBAL component which has been made easy to use through PPI's DataSource-->
<!--					component.</p>-->

            <p class="section-title" id='downloading-ppi'>Downloading PPI</p>

            <p>You can download the ppi skeletonaapp from the <a href="<?=$view['router']->generate('Homepage');?>" title="Homepage">Homepage</a>. If you just want everything in one folder ready to go, you should choose the <b>"ppi skeletonapp with vendors"</b> option. If you are comfortable with using <b>git</b> then you can download the <b>"skeleton app without vendors"</b> option and run <b>composer install</b> yourself.</p>

            <p id='system-requirements' class="section-title">System requirements</p>
            <p>A web server with its rewrite module enabled. (mod_rewrite for apache)</p>
            <p>PPI needs <b>5.3.3</b> or above. The recommended version by symfony is <b>5.3.10</b> or above.</p>

        <a class="next-article bottom btn btn-green" href="<?=$view['router']->generate('DocsIndex', array('page' => 'application'));?>">The Skeleton Application <i class="icon-arrow-right icon-white"></i></a>

	<div class="spacer"></div>

    </section>

</div>