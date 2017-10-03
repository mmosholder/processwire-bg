<?php

 include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . 'site/templates/_head.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); // include header markup ?>

	<div class="content-page featured-bourbon">

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
        <div class="-full">
          <?php foreach($page->featured_bourbon_items as $bourbon)
            echo "<div class='-bourbon-item'>
              <div class='-image' style='background-image: url(".$bourbon->images->first()->url.")'></div>
              <div class='-title'>{$bourbon->plain_text_title}</div>
              <div class='-text'>{$bourbon->plain_text}</div>
            </div>"; ?>
        </div>
      </div>
    </div>
	</div>


<?php include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . 'site/templates/_foot.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); // include footer markup ?>
