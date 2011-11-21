<div class="content-box">
	<h1>Using Sessions</h1>
	<h1 id="anchor-introduction">Introduction</h1>
	<p>When the framework boots up it will start the session and make your application in its own sessions namespace, so that your PPI project will not conflict with any other websites on the same host. Due to this feature there are some API for interfacing with the namespace that PPI has created for your project. The namespace that the framework makes is derived from your config file. </p>
	<pre><code class="php">
system.sessionNamespace = __MYPROJECTNAME
	</code></pre>

	<p>The namespace that will be created for your project in PHP's $_SESSION superglobal is</p>
	<pre><code class="php">
$_SESSION['__PPI']['__MYPROJECTNAME']
	</code></pre>

	<p>You can now interface with the above session namespace with the session API mentioned in this document. </p>
</div>
<div class="content-box">
	<h1 id="anchor-accessing-the-session">Accessing The Session</h1>
	<pre><code class="php">
$session = $this->getSession();
// Alias to this
$session = PPI_Helper::getSession();
// If you wish to only use the session object once, chaining is a popular technique
$this->getSession()->set('foo', $bar);
	</code></pre>
</div>
<div class="content-box">
	<h1 id="anchor-setting-session-data">Setting session data</h1>
	<pre><code class="php">
$this->getSession()->set('projectData', array('foo' => 'bar'));
	</code></pre>
</div>
<div class="content-box">
	<h1 id="anchor-getting-session-data">Getting session data</h1>
	<pre><code class="php">
$this->getSession()->get('projectData');
	</code></pre>
</div>
<div class="content-box">
	<h1 id="anchor-checking-if-data-exists">Checking if data exists</h1>
	<pre><code class="php">
$bar = $this->getSession()->exists('foo');
	</code></pre>
</div>

<div class="content-box">
	<h1 id="anchor-removing-data">Removing data</h1>
	<pre><code class="php">
$bar = $this->getSession()->remove('foo');
	</code></pre>
</div>

<div class="content-box">
	<h1 id="anchor-removing-all-data">Removing all data</h1>
	<pre><code class="php">
$bar = $this->getSession()->removeAll();
	</code></pre>
</div>

<div class="content-box">
	<h1 id="anchor-setting-the-logged-in-users-data">Setting the logged in users data</h1>
	<pre><code class="php">
$this->getSession()->setAuthData($userInfoFromDatabase);
	</code></pre>
</div>

<div class="content-box">
	<h1 id="anchor-getting-the-logged-in-users-data">Getting the logged in users data</h1>
	<pre><code class="php">
// Get the array
$authData = $this->getSession()->getAuthData();
// Get the object
$authData = $this->getSession()->getAuthData(false);
// Get the object and username
$username = $this->getSession()->getAuthData(false)->username;
	</code></pre>
</div>