<?php
$coreCSSFiles = array();
if(!isset($isAdminPanel)) {
	$coreCSSFiles = array('bootstrap', 'jquery.autocomplete', 'light/generic');
}
if (!empty($coreCSSFiles)) {
	$stylesheetFiles = array_unique(array_merge($coreCSSFiles, $core['files']['css']));
	?>
	<link type="text/css" href="<?php echo $baseUrl; ?>css/css.php?mod=<?php echo implode(',', $stylesheetFiles); ?>" rel='stylesheet' />
	<?php
}
?>