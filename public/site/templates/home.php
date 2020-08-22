<?php

include('./_head.php');
?>

<div class="home" style="background-image: url('<?php echo $config->urls->templates ?>images/homepage-bg.jpg')">
  <div class="container">
    <div class="-row">
      <h1><?= $page->headline ?></h1>
      <div class="-sub">
        <div><?= $page->home_subtitle ?></div>
        <div><?= $page->home_subtitle_2 ?></div>
      </div>
    </div>
    <div class="-row -awards">
      <div class="-text content">

        <p>We can't wait to welcome you all back to The Bluegrass! A few things to know:</p>

          <p>⭐️Reservations will be required for dining between 11am - close. The link will be posted soon. </p>
          <p>⭐️As of Monday, 6/1, we will begin opening at 7am for coffee and breakfast. Walk-in and curbside service available.</p>
          <p>⭐️Employees will be masked and we will have sanitation stations available for guests.</p>
          <p>⭐️We will no longer offer delivery as we need the staff in-house to ensure the restaurant is properly sanitized according to CDC guidelines at all times and to serve our patio guests.</p>
          <p>⭐️Pick-up will still be available, but we will be bringing all orders to you curbside so that we don't have more than our allowed number of guests inside at any given moment.</p>
          <p>⭐️No bar seating at this time </p>

        <p>Bear with us as we adapt to this new way of operating! I'm sure changes will be made along the way and we will always be trying our best to satisfy the requirements and provide the service we are known for! We sure do miss everyone!</p>
        <p>-The Bluegrass Team</p>
      </div>
      <!-- <div class="-award">
        <div class="-title">"#1 Coffee Shop in Denver"</div>
        <div class="-name">Denver A List</div>
        <div class="-year">2017</div>
      </div>
      <div class="-award">
        <div class="-title">"America's 80 Best Bourbon Bars"</div>
        <div class="-name">The Bourbon Review</div>
        <div class="-year">2016, 2017, & 2018</div>
      </div>
      <div class="-award">
        <div class="-title">"Best Pizza in Arvada"</div>
        <div class="-name">Taste of Arvada</div>
        <div class="-year">2015 - 2019</div>
      </div>
      <div class="-award">
        <div class="-title">"Best Savory Bite"</div>
        <div class="-name">Taste of Arvada</div>
        <div class="-year">2018</div>
      </div>
      <div class="-award">
        <div class="-title">"Best Bourbon Bar"</div>
        <div class="-name">Taste of Arvada</div>
        <div class="-year">2019</div>
      </div> -->
    </div>
    <div class="-row">
      <!-- <a href="/about" class="button -hollow-home">See What We're All About</a> -->
      <a href="https://tableagent.com/denver/the-bluegrass/" target="_blank" class="button -hollow-home">Reservations</a>
    </div>
  </div>
</div>

<?php include('./_foot.php');
?>