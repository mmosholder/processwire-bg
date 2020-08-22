<?php
include('./_head.php'); // include header markup ?>

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
          <div class='content-musician'>
            <div class="-row">
            <?php if($page->image): ?>
              <div class="content-musician-left-col">
                <img src="<?php echo $page->image->url ?>">
              </div>
            <?php endif; ?>
            <div class="content-musician-right-col">
              <p><?php echo $page->body; ?></p>
            </div>
          </div>
       </div>
    </div>
  </div>
</div>

<?php include('./_foot.php'); // include footer markup ?>
