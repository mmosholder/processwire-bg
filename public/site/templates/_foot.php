</main>

<!-- footer -->
<footer class="footer" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="hours">
				<!-- <div class="-item">
					<div class="-title">Monday - Thursday</div>
					<div class="-time">6AM to 10PM</div>
				</div> -->
				<!-- <div class="-item">
					<div class="-title">Sunday - Thursday</div>
					<div class="-time">7AM to 10PM</div>
				</div> -->
				<div class="-item">
					<div class="-title">Sunday - Thursday</div>
					<div class="-time">7AM to 10PM</div>
				</div>
				<div class="-item">
					<div class="-title">Friday & Saturday</div>
					<div class="-time">7AM to 11PM</div>
				</div>
				<div class="-item">
					<div class="-title">Happy Hour, Monday - Friday</div>
					<div class="-time">3PM to 6PM</div>
				</div>
				<!-- <div class="-item">
					<div class="-title">Friday</div>
					<div class="-time">6AM to 12AM</div>
				</div> -->
				<!-- <div class="-item">
					<div class="-title">Saturday</div>
					<div class="-time">7AM to 12AM</div>
				</div> -->
				<!-- <div class="-item">
					<div class="-title">Sunday</div>
					<div class="-time">7AM to 10PM</div>
				</div> -->
			</div>
			<div class="links">
				<ul><?php

						// top navigation consists of homepage and its visible children
						$homepage = $pages->get('/');
						$children = $homepage->children();

						// make 'home' the first item in the navigation
						$children->prepend($homepage);

						// render an <li> for each top navigation item
						foreach ($children as $child) {
							if ($child->id == $page->rootParent->id) {
								// this $child page is currently being viewed (or one of it's children/descendents)
								// so we highlight it as the current page in the navigation
								echo "<li class='current' aria-current='true'><a href='$child->url'>$child->title</a></li>";
							} else {
								echo "<li><a href='$child->url'>$child->title</a></li>";
							}
						}
						?></ul>
				<ul>
					<li><a href="/menus">Coffee &amp; Tea</a></li>
					<li><a href="/menus">Breakfast &amp; Sunday Brunch</a></li>
					<li><a href="/menus"></a>Lunch &amp; Dinner</li>
					<li><a href="/menus">Drinks</a></li>
					<li><a href="/menus">Happy Hour</a></li>
				</ul>
			</div>
			<div class="contact">
				<div class="-address">
					<span>The Bluegrass</span>
					<span>7415 Grandview Ave</span>
					<span>Arvada, CO 80002</span>
					<span>720-476-3950</span>
				</div>
				<div class="-social">
					<a href="https://www.facebook.com/thebluegrasscoffeehouse/" target="_blank">
						<i class="fa fa-facebook"></i>
					</a>
					<a href="https://www.instagram.com/bluegrassloungearvada/" target="_blank">
						<i class="fa fa-instagram"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="bottom">The Bluegrass &copy; <?php echo date("Y") ?></div>
	</div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?= $recurme->js ?>"></script>
<script src="<?php echo $config->urls->templates ?>scripts/main.js"></script>
</body>

</html>