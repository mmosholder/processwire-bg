<?php

include('./_head.php'); // include header markup ?>

	<div class="content-page contact">

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
          if($page->plain_text) {
            echo "<div class='-text -center-align'><p>" . $page->plain_text . "</p></div>";
          }
         ?></div>
       </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="content">
          <div class="-contact-columns">
            <div class="-col">
              <div class="-title">Visit, Call, or Email</div>
              <div class="-address">
                <span>7415 Grandview Avenue</span>
                <span>Arvada, CO 80002</span>
                <span>720-476-3950</span>
              </div>
              <div class="-title">Info</div><?php
                $info_email = $page->info_email;
                echo "<div class='-email'><a href='mailto:'" . $info_email . "'>".$info_email."</a></div>";
               ?>
              <div class="-title">Music Booking</div><?php
                $music_email = $page->music_booking_email;
                echo "<div class='-email'><a href='mailto:'" . $music_email . "'>".$music_email."</a></div>";
               ?>
             </div>
            <div class="-col">
              <div class="-title">Hours</div>
              <div class="-hours"><?php
                echo "<div class='-hours-title'>Sunday - Thursday</div><div class='-hours-item'>" . $page->sunday_thursday_hours ."</div></div>";
                echo "<div class='-hours-title'>Friday & Saturday</div><div class='-hours-item'>" . $page->friday_saturday_hours ."</div></div>";
              ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="-map"><?php
          $map = $modules->get('MarkupGoogleMap');
          echo $map->render($page, 'map_and_marker');
        ?></div>
      </div>
    </div>

	</div>


<?php include('./_foot.php'); // include footer markup ?>
