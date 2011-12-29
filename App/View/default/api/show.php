<div>
	<div class="title"><?= $apiObject->getName(); ?></div>
	
	<div class="properties">
		<ul>
		<?php
		foreach($apiObject->getProperties() as $property):
		?>
			<li><a href="" title=""><?= $property->getName(); ?></a></li>
		<?php
		endforeach;
		?>
		</ul>
	</div>
	
	<div class="methods">
		<ul>
		<?php
		foreach($apiObject->getMethods() as $method):
		?>
			<li><a href="" title=""><?= $method->getName(); ?></a></li>
		<?php
		endforeach;
		?>
		</ul>
	</div>
	

</div>