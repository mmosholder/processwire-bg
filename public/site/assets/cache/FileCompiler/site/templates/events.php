<?php
$cal = $modules->get('MarkupGoogleCalendar');
$cal->calendarID = 'en.usa#holiday@group.v.calendar.google.com';
 include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . 'site/templates/_head.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); // include header markup ?>

	<div class="content-page events">

		<div class="container">
      <div class="-row">
        <div class="content">
          <h1><?=$page->get('headline|title')?></h1>
        </div>
      </div>
    </div>

    <?php if($page->plain_text)
      echo "<div class='container'>
        <div class='-row'>
          <div class='content'>
            <div class='-text -center-align'><p>{$page->plain_text}</p></div>
           </div>
         </div>
       </div>"; ?>


      <div class="container">
        <div class="-row">
          <div class="content"><?php echo $cal->renderUpcoming(10); ?></div>
        </div>
      </div>

	</div>


<?php include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . 'site/templates/_foot.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); // include footer markup ?>
