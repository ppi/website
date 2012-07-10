<?php
$coreCSSFiles = array();
if(!isset($isAdminPanel)) {
	$coreCSSFiles = array('bootstrap', 'jquery.autocomplete', 'light/generic');
}
$stylesheetFiles = array_unique(array_merge($coreCSSFiles, $core['files']['css']));
foreach($stylesheetFiles as $file):
?>
<link type="text/css" href="<?php echo $baseUrl; ?>css/<?=$file;?>.css" rel='stylesheet' />
<?php
endforeach;
?>