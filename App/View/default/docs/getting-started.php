<div class="continer-fluid content-box docs-page">


    <div class="row-fluid">
		
		<div class="toc-mobile">
			<p class="toc-heading"><i class="icon-arrow-down left icon-white"></i> Table of Contents <i class="icon-arrow-down icon-white right"></i></p>
			<ul class="items">
				<li><a href="#" title="">Appliction File Structure</a></li>
				<li><a href="#" title="">The public folder</a></li>
				<li><a href="#" title="">The public index.php file</a></li>
				<li><a href="#" title="">The app folder</a></li>
				<li><a href="#" title="">The app.config.php file</a></li>
				<li><a href="#" title="">The app.modules.php file</a></li>
				<li><a href="#" title="">The modules folder</a></li>
			</ul>
		</div>

        <aside class="toc-container">
            <div class="toc">
                <p class="heading">Table of Contents</p>
                <ul class="items">
                    <li><a href="#" title="">Overview</a></li>
                    <li><a href="#" title="">Standing on the shoulders of giants</a></li>
                    <li><a href="#" title="">Why use PPI?</a></li>
                    <li><a href="#" title="">Downloading PPI</a></li>
                    <li><a href="#" title="">System Requirements</a></li>
                </ul>
            </div>
        </aside>

        <article>
            <h1>Getting Started</h1>

            <p class="section-title">Overview</p>
            <p>PPI is an open source framework for developing web applications and services with PHP 5.3. PPI is implemented using 100% object-oriented code with namespaces. In true community spirit PPI aims to re-use existing technologies instead of making its own. Therefore if you know Symfony2 you now know 70% of PPI. If you know ZendFramework2 you're in good hands too. If you have used Doctrine2 before, you know how to talk to databases.</p>
            <p>You'll not only be able to quickly pick up PPI but it's teaching you Symfony2, ZendFramework2 and Doctrine2 at the same time. Their features have been introduced to you in a very simple and friendly environment. Knowledge you gain from using PPI will be invaluable to you out there in the wild-wild-web.</p>
            <p>On the flip-side if you have used Symfony2 or ZendFramework2 then the learning curve for using PPI is dramatically reduced. There is no custom magic being used here. All the time you've invested learning these frameworks, and code created, can be re-used in building PPI apps.</p>
            <p>PPI can be considered the boilerplate of PHP frameworks.</p>

            <p class="section-title">Standing on the shoulders of giants</p>
            <p>PPI has pre-integrated the best features from existing frameworks for you, allowing you to just utilize them at will with no tedious integration process. We're re-using the power of Symfony2 for Routing, Request, Response, Templating and Class Autoloading. ZendFramework2's Module component to provide simple and clean modularity in your application. For database abstraction of the PDO library we're using Doctrine2's clean DBAL component which has been made easy to use through PPI's DataSource component.</p>

            <p class="section-title">Downloading PPI</p>
            <p>You can download PPI from the <a href="" title="">Downloads</a> page</p>

            <p class="section-title">System requirements</p>
            <p>A web server with its rewrite module enabled. (mod_rewrite for apache)</p>
            <p>PPI needs 5.3.3+. (5.3.0 for namespaces and 5.3.3 for Symfony2).</p>

            <a class="next-article btn btn-success" href="<?=$baseUrl;?>docs/application.html">The Skeleton Application <i class="icon-arrow-right icon-white"></i></a>

        </article>

    </div>

</div>