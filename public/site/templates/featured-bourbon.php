<?php

include('./_head.php'); // include header markup ?>

	<div class="content-page contact">

		<div class="container">
      <div class="-row">
        <div id='content' class="content">
          <!-- output 'headline' if available, otherwise 'title' -->
          <h1><?=$page->get('headline|title')?></h1>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="-row">
        <div class="content"><?php
          // output bodycopy
          if($page->plain_text) {
            echo "<div class='-text -center-align'><p>" . $page->plain_text . "</p></div>";
          }
         ?></div>
       </div>
    </div>

    <div class="container">
      <div class="-row">
        <div class="-full"><?php
          foreach($page->featured_bourbon_items as $bourbon) {
            $bg = $bourbon->images->first();
            echo "<div class='-bourbon-item'><div class='-image' style='background-image: url('{$bg->url}')'></div><div class='-title'>{$bourbon->plain_text_title}</div><div class='-text'>{$bourbon->plain_text}</div></div>";
          }
        ?>
        </div>
      </div>
    </div>
	</div>


<?php include('./_foot.php'); // include footer markup ?>
