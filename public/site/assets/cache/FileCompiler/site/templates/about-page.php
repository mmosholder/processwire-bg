<?php

 include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . 'site/templates/_head.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); // include header markup ?>

	<div class="content-page">

		<div class="container">
      <div class="-row">
        <div id='content' class="content"><?php

          // output 'headline' if available, otherwise 'title'
          echo "<h1>" . $page->get('headline|title') . "</h1>";
          ?>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="-row">
        <div class="content"><?php
          // output bodycopy
          if($page->two_col_text) {
            echo "<div class='-two-columns'>" . $page->two_col_text . "</div>";
          }
         ?></div>
       </div>
    </div>

    <?php if($page->full_width_image): ?>
      <div class="container">
        <div class="-row">
          <div class="-full-width-image">
            <img src="<?php echo $page->full_width_image->url?>" alt="">
          </div>
        </div>
      </div>
    <?php endif; ?>
    
    <?php if($page->image_grid): ?>
      <div class="container">
        <div class="row">
          <div class="content -flex"><?php

            foreach($page->image_grid as $imageItem) {
                echo "<div class='image-item'><div class='-image' style='background-image: url({$imageItem->images->first()->url})'></div></div>";              
  					}
          ?></div>
        </div>
      </div>
    <?php endif ?>
	</div>


<?php include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . 'site/templates/_foot.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); // include footer markup ?>
