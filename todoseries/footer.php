<?php wp_footer(); ?>
<footer>
<nav class="navbar navbar-transparent navbar-static-top">
<?php
	wp_nav_menu( array(
		'menu'              => 'secondary',
		'theme_location'    => 'secondary',
		'depth'             => 2,
		'container'         => '',
		'container_class'   => '',
		'container_id'      => '',
		'menu_class'        => 'nav navbar-nav',
		'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		'walker'            => new wp_bootstrap_navwalker())
	);
?>
</nav>
</footer>
<a href="#Top" name="Top" id="Top" class="cd-top cd-is-visible cd-fade-out">Top</a>
<a href="#Bot" name="Bot" id="Bot" class="cd-bottom cd-is-visible cd-fade-out">Bottom</a>
<!-- Jquery -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- owl carousel --> 
<script src="<?php bloginfo('template_url'); ?>/js/owl-carousel.js"></script>
<!-- Custom -->
<script src="<?php bloginfo('template_url'); ?>/js/custom.js"></script>
<!-- Facebook -->
<div id="fb-root"></div>
<script>
(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
	  fjs.parentNode.insertBefore(js, fjs);
}
(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html>