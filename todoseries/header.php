<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
<meta name="description" content="<?php bloginfo('description') ?>">
<!-- Google Font -->
<link href="<?php bloginfo('template_url');?>/css/google-font.css" rel="stylesheet">
<!-- Bootstrap -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="<?php bloginfo('template_url');?>/css/font-awesome.min.css" rel="stylesheet">
<!-- Owl Carousel -->
<link href="<?php bloginfo('template_url');?>/css/owl-carousel.css" rel="stylesheet">
<!-- Main Css -->
<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
<link rel="stylesheet" href="https://getbootstrap.com/docs/3.3/assets/css/docs.min.css">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
  <nav class="navbar navbar-transparent navbar-static-top">
  <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
  				</button>
                  <?php if(has_custom_logo()) : ?>
  				<?php the_custom_logo(); ?>
                  <?php else : ?>
                  <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
                  <?php endif; ?>
              </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  				<?php
          wp_nav_menu( array(
            'menu'              => 'primary',
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => '',
            'container_class'   => '',
            'container_id'      => '',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
          );
          ?>
          <!-- CPTs search input -->
          <form role="search" method="GET" class="navbar-form text-right" action="<?php bloginfo('url') ?>">
            <div class="form-group">
              <input name="s" type="text" class="form-control" placeholder="Search...">
            </div>
            <button type="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>

  </div>
  <!-- /.navbar-collapse -->
  </nav>
</header>
