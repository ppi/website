<?php
if(isset($isAjax) && $isAjax == false):
	include_once($viewDir . $actionFile);
else:
?>
<!DOCTYPE html>
<html lang="en">
<?php include($viewDir . 'elements/head.php'); ?>
<body>

<div id="wrapper">
	
	<?php include($viewDir . 'elements/header.php'); ?>
	
	<div id="page-content">
		<?php include_once($viewDir . $actionFile); ?>
		<?php include_once($viewDir . 'elements/footer.php'); ?>
	</div>
	
</div>
</strong>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script>var baseUrl = '<?= $baseUrl; ?>';</script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="' + baseUrl + 'scripts/jquery.1.7.0.min.js"%3E%3C/script%3E'));
console.log(window.jQuery);</script>
<?php include_once($viewDir . 'framework/javascript.php'); ?>
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

