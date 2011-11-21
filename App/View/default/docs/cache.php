<article class="content-box docs-page">

	<aside class="toc">
		<p class="heading">Table of Contents</p>
		<ul class="items">
			<li><a href="#" title="">Introduction</a></li>
			<li><a href="#" title="">Accessing The Cache</a></li>
			<li><a href="#" title="">Setting cache data</a></li>
			<li><a href="#" title="">Getting cache data</a></li>
			<li><a href="#" title="">Checking if data exists</a></li>
			<li><a href="#" title="">Removing data</a></li>
		</ul>
	</aside>

	<h1>Using the Cache</h1>
	<h1 id="anchor-introduction">Introduction</h1>
	<p>PPI\Cache lets you abstract the cache driver from your PPI application's configuration file. The default driver if you don't specify one is 'disk' aka PPI\Cache\Disk.</p>
	<br>
	<p>This is useful so that in future if you are in a different environment and wish to change driver from disk to memcached or to redis or to APC, then you can easily do that by setting either of the following in your configuration file.</p>
	<pre><code class="php">cache.hander = redis
cache.hander = apc
cache.hander = memcache
cache.hander = memcached</code></pre>

	<p>Memcache and memcached have been aliased to one another, so if you type memcache, and it's not available but memcached is available it will use that, and vice versa.</p>

	<h1 id="anchor-accessing-the-cache">Accessing The Cache</h1>
	<p>To access the cache from anywhere in your PPI application, you can easily do:</p>
	<pre><code class="php">
$cache = \PPI\Core::getCache();
	</code></pre>
	<p>There are many ways in which to use the PPI\Cache layer for ease of use. Some examples are detailed below.</p>
	<br>
	<p>If you want to take the default configuration from the your PPI appliction's configuration file. Then no special parameters are needed.</p>
	<pre><code class="php">$cache = \PPI\Core::getCache();</code></pre>
	<p>If you want to specify the cache driver to use, then you can easily pass the name of that through by doing this:</p>
	<pre><code class="php">
use PPI\Core;
$cache = Core::getCache()('apc');
// or
$cache = Core::getCache()('redis');
// or
$cache = Core::getCache()('memcached');
	</code></pre>
	<br>
	<p>If you wish to only use the cache object once, method chaining is a popular technique</p>
	<pre><code class="php">\PPI\Core::getCache()->set('foo', $bar);</code></pre>


	<h1 id="anchor-setting-cache-data">Setting cache data</h1>
	<pre><code class="php">
\PPI\Core::getCache()->set('foo', $bar, $ttl);
	</code></pre>

	<h1 id="anchor-getting-cache-data">Getting cache data</h1>
	<pre><code class="php">
$bar = \PPI\Core::getCache()->get('foo');
	</code></pre>

	<h1 id="anchor-checking-if-data-exists">Checking if data exists</h1>
	<pre><code class="php">
$bar = \PPI\Core::getCache()->exists('foo');
	</code></pre>

	<h1 id="anchor-removing-data">Removing data</h1>
	<pre><code class="php">
$bar = \PPI\Core::getCache()->remove('foo');
	</code></pre>

</article>
