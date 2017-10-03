<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php echo $page->title; ?></title>
	<meta name="description" content="<?php echo $page->summary; ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/main.css" />
	<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyATHVvqqbz699klt8B_7SKEB2BkyfFd_IE'></script>
</head>
<body class='has-sidebar'>

	<!-- top navigation -->
	<nav class='nav' role='navigation'>
    <div class="container">
      <div class="-row">
				<a href="/">
          <img class="-logo" src="<?php echo $config->urls->templates?>images/home-nav-logo.png" alt="">
          <img class="-wordmark" src="<?php echo $config->urls->templates?>images/wordmark@2x.png" alt="">
        </a>
        <button class="hamburger hamburger--slider" type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
        <div class="-links">
          <ul><?php

        		// top navigation consists of homepage and its visible children
        		$homepage = $pages->get('/');
        		$children = $homepage->children();

        		// make 'home' the first item in the navigation
        		$children->prepend($homepage);

        		// render an <li> for each top navigation item
        		foreach($children as $child) {
  						if($child->id == $page->rootParent->id) {
        				// this $child page is currently being viewed (or one of it's children/descendents)
        				// so we highlight it as the current page in the navigation
        				echo "<li class='current' aria-current='true'><a href='$child->url'>$child->title</a></li>";
        			} else {
        				echo "<li><a href='$child->url'>$child->title</a></li>";
        			}
        		}
          ?></ul>
        </div>
      </div>
    </div>
  </nav>


	<!-- breadcrumbs -->
	<!-- <div class='breadcrumbs' role='navigation' aria-label='You are here:'><?php

		// breadcrumbs are the current page's parents
		foreach($page->parents() as $item) {
			echo "<span><a href='$item->url'>$item->title</a></span> ";
		}
		// optionally output the current page as the last item
		echo "<span>$page->title</span> ";

	?></div> -->

	<main id='main'>
