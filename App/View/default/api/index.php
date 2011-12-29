<div class="content-box">
	<ul class="api-list">
		<?php foreach($filenames as $filename): ?> 
		<li><a href="<?=$baseUrl;?>api/show/<?=$filename; ?>" title=""><?= $filename; ?></a></li>
		<?php endforeach; ?>
	</ul>
</div>