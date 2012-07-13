<p>Next we're moving onto the <b>controllers</b> section.</p>

<p class="section-title">Routing Examples</p>
<p>The homepage route</p>
<pre><code>
Homepage:
pattern:  /
defaults: { _controller: "Application:Index:index"}
</code></pre>
<p>Show Blog Route</p>
<p>The following example is basically /blog/* where the wildcard is the value given to <b>title</b>. If the URL was <b>/blog/using-ppi2</b> then the <b>title</b> variable gets the value <b>using-ppi2</b>, which you can see being used in the next section.</p>

<pre><code>
Blog_Show:
pattern: /blog/{title}
	defaults: { _controller: "Application:Blog:show"}
</code></pre>