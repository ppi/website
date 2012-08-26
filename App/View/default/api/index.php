<div class="content-box">
	<ul class="api-list">
		<?php
		foreach($files as $file):
			$pathinfo = pathinfo($file);
			$file = $pathinfo['filename'];
			$filename = str_replace(array('.xml', '_'), array('', '\\'), $file);
		?> 
		<li><a href="<?=$baseUrl;?>api/show/<?=$file; ?>" title=""><?= $filename; ?></a></li>
		<?php
		endforeach;
		?>
	</ul>
</div>