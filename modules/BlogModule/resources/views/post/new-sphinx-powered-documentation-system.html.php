<p>We have been working really hard on porting our documentation system to a new maintainable, decoupled and multi-version documentation system. It rocks!</p>

<h4>What did we have before?</h4>
<p>We had tightly-coupled static HTML files inside the 'website' repository which was a pain to maintain and didn't support versioning at all.</p>
    
<h4>What do we have now?</h4>
<p>
    We now have a separate 'docs' repo <a href="http://github.com/ppi/docs/tree/2.0" title="http://github.com/ppi/docs/tree/2.0">here</a>. 
    Each documentation version is on its own unique branch, so now we are actively using the <a href="http://github.com/ppi/docs/tree/2.0" title="2.0" target="_blank">2.0</a> and <a href="http://github.com/ppi/docs/tree/2.1" title="2.1" target="_blank">2.1</a> branches on that repo. 
    The system itself is powered by <a href="http://sphinx-doc.org/" title="sphinx" target="_blank">sphinx</a> and uses the <a href="http://docutils.sourceforge.net/rst.html" title="http://docutils.sourceforge.net/rst.html" target="_blank">reStructured (reST) syntax</a>, this is great because it renders natively on github.com like markdown, see an example of this <a href="https://github.com/ppi/docs/blob/2.0/en/book/routing.rst" title="here" target="_blank">here</a>.
</p>
    
<h4>What are the key benefits of this new system?</h4>
<p>PPI contributors can now contribute to the documentation without caring about html markup, styling or anything to do with the ppi website structure itself, it's merely markdown template files containing content only. We can now maintain the documentation on a per-version basis now, so as we add or change things to version 2.1 it can be maintained separately from 2.0.</p>
