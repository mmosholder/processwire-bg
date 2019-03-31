<?php
include('./_head.php'); // include header markup ?>

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


<?php include('./_foot.php'); // include footer markup ?>
