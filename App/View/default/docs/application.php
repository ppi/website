<article class="content-box docs-page">

	<aside class="toc">
		<p class="heading">Table of Contents</p>
		<ul class="items">
			<li><a href="#" title="">Introduction</a></li>
			<li><a href="#" title="">Getting the source</a></li>
			<li><a href="#" title="">Configuration</a></li>
			<li><a href="#" title="">Default routing</a></li>
			<li><a href="#" title="">Finally</a></li>
		</ul>
	</aside>


	<p class="section-title">Application File Structure</p>
	<p>First, lets review the file structure of the PPI skeleton application that we have pre-built for you to get up and running as quickly as possible.</p>
	<p><img src="images/docs/skeleton-file-structure.png" alt="Skeleton Application File Structure"></p>
	
	<p>Lets break it down into parts:</p>
	
	<p class="section-title">The public folder</p>
	<p>Figure 1.1 shows you the /public/ folder, this is your web servers document root is. Anything outside of /public/ i.e: all your business code will be secure from direct URL access. In your development environment you don't need a virtualhost file, you can directly access your application like so: http://localhost/myppiapp/public/ or http://localhost/myppiapp/public/users/show. In your production environment this will be http://localhost/myppiapp/users/show</p>
	<p>All your publicly available asset files should be here, CSS, JS, Images.</p>
	
	<p class="section-title">The app folder</p>
	<p>Figure 1.2 shows you the /app/ folder, this is where all your apps global items go such as app config, datasource config and modules config. You wont need to touch these out-of-the-box but it allows for greater flexibility in the future if you need it.</p>
	<p>There's a /app/views/ folder, this is where global template files go, i.e: your websites main layout file(s), containing all the necessary &lt;head&gt; and &lt;body&gt; html.</p>
	<p>Later on you will see how your own controller's views EXTEND the global templates in /app/views/</p>
	
	<p class="section-title">The modules folder</p>
	<p>This is where we get stuck into the real details, we're going into the /modules/ folder. Take a 5 minute break and rest your brain before it gets blown away with awesomeness.</p>
	<p><a href="" title="Move to the modules documentation section">Move to the modules documentation section</a></p>
		
</article>