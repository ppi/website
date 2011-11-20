<?php
if(isset($isAjax) && $isAjax == false):
	include_once($viewDir . $actionFile);
else:
?>
<!DOCTYPE>
<html lang="en">
<?php include($viewDir . 'elements/head.php'); ?>
<body>

<div id="wrapper">
	
	<?php include($viewDir . 'elements/header.php'); ?>
	
	<div id="page-content">
		<?php include_once($viewDir . $actionFile); ?>
	</div>
	<?php include_once($viewDir . 'elements/footer.php'); ?>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="scripts/jquery-1.6.1.js"%3E%3C/script%3E'))</script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20964741-1']);
  _gaq.push(['_trackPageview']);

  (function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!--[if lt IE 7 ]>
<script src="scripts/libs/dd_belatedpng.js"></script>
<script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg backgrounds </script>
<![endif]-->

<script type="text/javascript">
  (function() {
	var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	po.src = 'https://apis.google.com/js/plusone.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

</body>
</html>
<?php
endif;
?>

