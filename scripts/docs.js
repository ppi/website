jQuery(document).ready(function($) {
  $('pre code.php').each(function(i, e) {hljs.highlightBlock(e, '    ')});
});