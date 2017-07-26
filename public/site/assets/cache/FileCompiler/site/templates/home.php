<?php

 include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . 'site/templates/_head.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); // include header markup ?>

  <div class="home" style="background-image: url('<?php echo $config->urls->templates?>images/home-bg.jpg')">
  	<div class="container">
      <div class="-row">
        <h1><?=$page->headline?></h1>
        <div class="-sub">
          <div><?=$page->home_subtitle?></div>
          <div><?=$page->home_subtitle_2?></div>
        </div>
      </div>
      <div class="-row -awards">
        <div class="-award -first">
          <div class="-title">"#1 Coffee Shop in Denver"</div>
          <div class="-name">Denver A List</div>
          <div class="-year">2017</div>
        </div>
        <div class="-award -center">
          <div class="-title">"America's 80 Best Bourbon Bars"</div>
          <div class="-name">The Bourbon Review</div>
          <div class="-year">2016</div>
        </div>
        <div class="-award -last">
          <div class="-title">"Best Pizza in Arvada"</div>
          <div class="-name">Taste of Arvada</div>
          <div class="-year">2015 & 2016</div>
        </div>
      </div>
      <div class="-row">
        <a href="/about" class="button -hollow-home">See What We're All About</a>
      </div>
  	</div>
  </div>

<?php include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . 'site/templates/_foot.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); // include footer markup ?>
