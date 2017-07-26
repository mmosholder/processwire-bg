<?php

include('./_head.php'); // include header markup ?>

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
    <?php endif ?>

    <div class="container">
      <div class="row">
        <div class="content">
          <h1><?=$page->second_title?></h1>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="content"><?php

          foreach($page->team_block_repeater as $block) {
              $image = $block->images->first();
              echo "<div class='team-item -text-left'><div class='-text'>{$block->body}</div><div class='-image'><img src='{$image->url}'/></div></div>";              
					}
        ?></div>
      </div>
    </div>
	</div>


<?php include('./_foot.php'); // include footer markup ?>
