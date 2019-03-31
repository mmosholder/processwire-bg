<?php
 include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . 'site/templates/_head.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); // include header markup ?>

	<div class="content-page events">

		<div class="container">
      <div class="-row">
        <div class="content">
          <h1>Music &amp; Events</h1>
        </div>
      </div>
    </div>

    <div class='container'>
      <div class='-row'>
        <div class='content'>
          <?php echo $recurme->renderCalendar(); ?>
        </div>
      </div>
    </div>
	</div>


<?php include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . 'site/templates/_foot.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); // include footer markup ?>
