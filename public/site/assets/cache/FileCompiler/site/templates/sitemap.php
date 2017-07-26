<?php

 include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . "site/templates/_head.php",array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>

<div id='content'>

	<?php 
	
	$maxDepth = 4; 
	renderNavTree($pages->get('/'), $maxDepth); 
	// see the _init.php for the renderNavTree function
	
	?>

</div>

<?php include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . "site/templates/_foot.php",array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>
