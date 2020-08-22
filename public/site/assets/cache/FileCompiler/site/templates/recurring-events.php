<?php
 include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . 'site/templates/_head.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); // include header markup ?>

	<div class="content-page events">

		<div class="container">
      <div class="-row">
        <div class="content">
          <h1><?php echo $page->get('title') ?></h1>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="-row">
        <div class="content">
          <?php if($page->plain_text || $page->image): ?>
            <div class='content-musician'>
              <div class="-row">
              <?php if($page->image): ?>
                <div class="content-musician-left-col">
                  <img src="<?php echo $page->image->url ?>">
                </div>
              <?php endif; ?>
              <div class="content-musician-right-col">
                <p><?php echo $page->plain_text; ?></p>
                <a href="<?php echo $page->musician_url ?>">Event Website</a>
              </div>
            </div>
          <?php else: ?>
            <div class='-two-columns'>Sorry, no content about the musician or event is available at this time. Please check back later as we are continually updating musician profiles!</div>
         <?php endif; ?>
       </div>
    </div>
  </div>
</div>

<?php include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . 'site/templates/_foot.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); // include footer markup ?>
