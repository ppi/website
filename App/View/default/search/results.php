<?php if(empty($response['methods']) && $response['classes']): ?>
<p class="search-results-none">No search results found.</p>
<?php else: ?>
<p class="search-results-title">There are <?= count($response['methods']) + count($response['classes']); ?> results for <strong><?= $helper->escape($response['query']); ?></strong></p>
<ul class="search-results">
	<li class="methods-title">Methods</li>
	<?php foreach($response['methods'] as $method): ?>
	<li><a href="<?= $method['url']; ?>" title=""><?= $helper->escape($method['title']); ?></a></li>
	<?php endforeach; ?>
	<li class="classes-title">Classes</li>
	<?php foreach($response['classes'] as $classes): ?>
	<li><a href="<?= $method['url']; ?>" title=""><?= $helper->escape($classes['title']); ?></a></li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>