<?php
$coreJSFiles = array(
	'modernizr-1.6.min', 
	'bootstrap', 
	'jquery.autocomplete/jquery.autocomplete',
	'libs/jquery-placeholder.min',
	'generic'
);

if (!empty($coreJSFiles)):
	$javascriptFiles = array_unique(array_merge($coreJSFiles, $core['files']['js']));
	foreach($javascriptFiles as $file):
?>
	<script type="text/javascript" src="<?php echo $baseUrl; ?>scripts/<?=$file;?>.js"></script>
<?php
	endforeach;
endif;
?>