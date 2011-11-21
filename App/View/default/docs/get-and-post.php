<div class="content-box">
    <h1>Get and POST</h1>
	<h1 id="anchor-introduction">Introduction</h1>
	<p>This documentation will cover the API available to you to obtain information from the URL, and submitted information from forms.</p>
</div>
<div class="content-box">
	<h1 id="anchor-getting-params-from-the-url">Getting params from the URL</h1>
	<p>The get() method has a key/val approach, if you ask for 'key' it will give you 'val'.</p>
	<pre><code class="php">
// url: www.site.com/user/profile/userid/4
$userID = $this->get('userid');
var_dump($userID); // int(4)
	</code></pre>

	<p>Optional parameters can be used incase the URL key doesn't exist. If no default value has been specified and the key doesn't exist then the value will default to null.</p>
	<pre><code class="php">
// url: www.site.com/user/profile
$userID = $this->get('userid', 0);
var_dump($userID) // int(0)

// url: www.site.com/user/edit/4
$userID = $this->get('edit', 0);
var_dump($userID); // int(4);
	</code></pre>
</div>
<div class="content-box">
	<h1 id="anchor-detecting-form-submits">Detecting form submits</h1>
	<pre><code class="php">
if($this->is('post')) {
	</code></pre>
</div>
<div class="content-box">
	<h1 id="anchor-getting-params-from-post">Getting params from POST (forms)</h1>
	<pre><code class="php">
$username   = $this->post('username');
$formValues = $this->post();
	</code></pre>

	<p>Optional parameters can be used. If a POST field doesn't exist then you can specify a default value.</p>
	<pre><code class="php">
$userID = $this->post('userid', 0);
if($userID > 0) {
	</code></pre>

	<p>If you do not specify a default value and the POST field doesn't exist, it returns null.</p>
	<pre><code class="php">
// Field 'userid' doesn't exist.
$userID = $this->post('userid');
var_dump($userID); // null
	</code></pre>
</div>
<div class="content-box">
	<h1 id="anchor-checking-if-a-post-field-exists">Checking if a POST field exists</h1>
	<pre><code class="php">
if($this->hasPost('username')) {
	</code></pre>
</div>
<div class="content-box">
	<h1 id="anchor-getting-post-fields-with-a-prefix">Getting POST fields with a prefix</h1>
	<p>Say you have a form of information for a user and a users profile, to go into two separate database tables.
	   A quick handy way to separate these are to use prefixes in the field names.
	</p>
	<pre><code class="php">
/* Fields: user_id
user_email
user_password
profile_image
profile_status
*/
$userValues    = $this->stripPost('user_');
var_dump($userValues);
/* array('id'       => '12',
	'email'    => 'me@ppiframework.com',
	'password' => 'password')
*/
$profileValues = $this->stripPost('profile_');
var_dump($profileValues);
/* array('image'  => 'myimage.png',
	'status' => 'working');
*/
  </code></pre>
</div>
<div class="content-box">
	<h1 id="anchor-adding-post-fields">Adding POST fields</h1>
	<pre><code class="php">
if($this->hasPost('username')) {
	$this->addPost('username_new', $usernameNew);
}
// ....
$postValues = $this->post();
	</code></pre>
</div>
<div class="content-box">
	<h1 id="anchor-removing-post-fields">Removing POST fields</h1>
	<pre><code class="php">
if($this->hasPost('hidden_userid')) {
	$this->removePost('hidden_userid');
}
$formValues = $this->post();
	</code></pre>
</div>
<div class="content-box">
	<h1 id="anchor-emptying-post-data">Emptying POST data</h1>
	<pre><code class="php">
$formValues = $this->post();
if(isset($formValues['wipedata'])) {
	$this->emptyPost();
}
	</code></pre>
</div>