<?php
$coreJSFiles = array('modernizr-1.6.min', 'bootstrap/dropdown', 'bootstrap/scrollspy');
if (!empty($coreJSFiles)) {
	$javascriptFiles = array_unique(array_merge($coreJSFiles, $core['files']['js']));
	?>
	<script type="text/javascript" src="<?php echo $baseUrl; ?>scripts/js.php?mod=<?php echo implode(',', $javascriptFiles); ?>"></script>
	<?php
}
?>