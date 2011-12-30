<div class="api-show-page">
	<div class="title"><?= $apiObject->getName(); ?></div>
	
	<?php if($apiObject->hasProperties()): ?>
	<div class="properties">
		<p class="properties-title">Properties</p>
		<ul>
		<?php
		foreach($apiObject->getProperties() as $property):
		?>
			<li>
				<a href="" title="">
					<span class="visibility"><?= $property->getVisibility(); ?></span>
					<span class="property-name"><?= $property->getName(); ?></span>
					<span class="default">= <?= $property->getDefault(); ?></span>
				</a>
				<p class="desc"><?= $property->getDesc(); ?></p>
			</li>
		<?php
		endforeach;
		?>
		</ul>
	</div>
	<?php endif; ?>
	
	<?php if($apiObject->hasMethods()): ?>
	<div class="methods">
		<p class="methods-title">Methods</p>
		<ul>
		<?php
		foreach($apiObject->getMethods() as $method):
			$argStr = '(';
			if($method->hasArguments()):
				$args = array();
				foreach($method->getArguments() as $arg):
					$args[] = $arg['type'] . ' ' . $arg['name']; 
				endforeach;
				$argStr .= implode(', ', $args);
			endif;
			$argStr .= ')';
		?>
			<li>
				<a href="" title="">
					<span class="return"><?= $method->getReturnType(); ?>&nbsp;</span>
					<span class="method-name"><?= $method->getName(); ?></span><span class="arguments"><?= $argStr; ?></span>
				</a>
				<p class="desc"><?= $method->getDesc(); ?></p>
			</li>
		<?php
		endforeach;
		?>
		</ul>
	</div>
	<?php endif; ?>
</div>