<?php

include('./_head.php'); // include header markup ?>

	<div class="content-page -pattern">

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
              if ($imageItem->full_width_checkbox) {
                echo "<div class='-full-width-image'><img src='{$imageItem->images->first()->url}' alt=''></div>";
              } else {
                echo "<div class='image-item'><div class='-image' style='background-image: url({$imageItem->images->first()->url})'></div></div>";
              }
  					}
          ?></div>
        </div>
      </div>
    <?php endif ?>
	</div>


<?php include('./_foot.php'); // include footer markup ?>
