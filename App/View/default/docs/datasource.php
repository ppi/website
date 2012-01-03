<article class="content-box docs-page">

	<aside class="toc">
		<p class="heading">Table of Contents</p>
		<ul class="items">
			<li><a href="#" title="">The concept</a></li>
			<li><a href="#" title="">Configuration</a></li>
			<li><a href="#" title="">Loading your connection</a></li>
			<li><a href="#" title="">Recap</a></li>
			<li><a href="#" title="">The PPI Skeleton Application</a></li>
		</ul>
	</aside>

	<h1>DataSources<span class="subtitle"> - So you want data?</span></h1>
	
	<p>Lets recap why we're here. We're here because we have data and we want to give it a home. A home that you can organise your data well enough to get it back out effectively at a later date.</p>
	<br>
	<p>You can think of each home as a DataStore, and there are different types of homes that are more effective for storing different types of data. Different types of homes could be; MySQL, PostgreSQL, MongoDB, CouchDB and so on.</p>
	<br>
	
	<h2>PPI DataSource<span class="subtitle"> - The concept</span></h2>
	<p>The PPI project has a standalone component that you can drop into any new or existing PHP based application; this is called the PPI DataSource component.</p>
	<br>
	<p>You're able to register your datasource connection and then use that connection infinitely from any part of your application. What's even cooler is you can register as many datasource connections as you like and use any of them any time any where.</p>
	<br>
	<p>All of our connections are handled by the Doctrine project's lightweight wrappers around PDO, MongoDB and CouchDB data stores. This means we're re-using the work of the PHP community, the existing documentation for these libraries and most importantly not re-inventing the wheel.</p>


	<p>The 'type' property of your connection's configuration values determines the type of 'home' that your data lives in. If your type starts with 'pdo_' then we will be loading up the PPI\DataSource\PDO component. The PPI\DataSource\PDO component uses Doctrine's DBAL library to handle all PDO-compatible drivers therefore all major functionality and documentation of it is already done for us at Doctrine DBAL's website.</p>
	<br>
	
	<p>The good news is that we take the Doctrine DBAL library and do all the hard work for you letting you focus on what's really important here; developing your application.</p>

	<h2 id="Configuration">Configuration <a class="anchor" href="#Configuration" title="Configuration">¶</a></h2>
	<p>The following is an example of the $connections array containing all your connections for your application. Each connection has a unique identifier to refer to your connection's credentials as demonstrated below.</p>
	<br>
	<p>
		For a list of all supported drivers, go <a target="_blank" href="http://www.doctrine-project.org/docs/dbal/2.0/en/reference/configuration.html#driver" title="Supported Drivers">here</a>.
		<br>
		For a list of the connection properties for each individual driver, go <a target="_blank" href="http://www.doctrine-project.org/docs/dbal/2.0/en/reference/configuration.html#connection-details" title="Supported Driver Properties">here</a>.
	</p>
	<pre>
<?php highlight_string("<?php
	\$connections['my_connection_key'] = array(
    'type'   => 'pdo_mysql',
    'host'   => 'localhost',
    'dbname' => 'my_db_name',
    'user'   => 'my_db_user',
    'pass'   => 'my_db_pass'
);

\$connections['sessions'] = array(
	'type'       => 'pdo_pgsql',
	'hostname'   => 'localhost',
	'database'   => 'my_db_name',
	'username'   => 'my_db_user',
	'password'   => 'my_db_pass'
);");?></pre>
	
	<p>Now we have to take these connections and pass them into the DataSource component. There are two ways in which you can do this, both are identical</p>
	<pre>
<?php
highlight_string("<?php
\$ds = new \PPI\DataSource(\$connections);
// or
\$ds = \PPI\DataSource::create(\$connections);");?></pre>
	
	<h2 id="loading-your-connection">Loading your connection <a class="anchor" href="#loading-your-connection" title="Loading Your Connection">¶</a></h2>
	<p>You can call up your respective connection using the key you defined in the above code example. In our case we called it 'my_connection_key' however a more appropriate name in a live application may be something like: 'sessions' or 'user_cache'.</p>
	<pre>$connection = $ds->getConnection('my_connection_key');</pre>

	<h2 id="ds-recap1">Recap</h2>
	<p>Now we will recap on learning how to use the DataSource component standalone, not within the PPI Application</p>
	<pre>
<?php
highlight_string("<?php
// File: my_ds_test.php
include 'PPI/PPI/init.php';
\$connections = array();
\$connections['main'] = array(
	'type'       => 'pdo_mysql',
	'hostname'   => 'localhost',
	'database'   => 'my_db_name',
	'username'   => 'my_db_user',
	'password'   => 'my_db_pass'
);
\$ds = new \PPI\DataSource(\$connections);
\$connection = \$ds->getConnection('main');"); ?>
</pre>
	
	<h2 id="skeleton-application">The PPI Skeleton Application <a class="anchor" href="#skeleton-application" title="The PPI Skeleton Application">¶</a></h2>
	<p>The PPI skeleton application has some extra goodness for you to make your job much easier. All of the above code is pretty much done for you and you just need to focus making your app work.</p>
	<br>
	<p>Firstly the default path that PPI\App will look for your connections is App/Config/connections.php, you can change this default path by setting the '$app->dsConnectionsPath' property</p>
	<br>
	<p>In your index.php bootstrap file you have an option called 'ds' by setting this to true, you are allowing PPI to load up your pre-set connections and let you get your connection out of there whenever required.</p>
	<pre>
<?php highlight_string("<?php
include 'PPI/PPI/init.php';
\$app = new \PPI\App();
\$app->ds = true;
\$app->boot();"); ?></pre>
	<p>Connections now auto-parsed from App/Config/connections.php and PPI\DataSource is now in the registry with your connections set into it.</p>
	<pre><?php highlight_string("<?php var_dump(\PPI\Registry::exists('DataSource')); // bool(true)"); ?></pre>
	<p>It's recommended you use Core here instead of directly accessing the registry.</p>
	<pre>
<?php highlight_string("<?php
use PPI\Core;
\$ds = Core::getDataSource();
\$connection = \$ds->getConnection('my_conn_key');

// or
\$connection = Core::getDataSource()->getConnection('my_conn_key');

// or
\$connection = Core::getDataSourceConnection('my_conn_key');"); ?></pre>
</article>