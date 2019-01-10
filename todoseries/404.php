<?php get_header(); ?>
<style>
.navbar{
	margin-bottom: 0px;
}
.jumbotron{
    position: relative;
    align-items: center;
    display: flex;
    justify-content: center;
    height: 100vh;
    text-align: center;
    margin: auto;
    color:	#fff;
  	background: url('<?php bloginfo('template_url') ?>/images/error.png') no-repeat center center;
  	background-size: cover;
  	background-attachment: fixed;
  	text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
}

.jumbotron h1,h3,p{
  text-align: center;
}
</style>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-3">404</h1>
      <h3>Error!</h3>
      <p class="lead">The page you were looking for has been removed or moved somehwere else</p>
      <a href="<?php bloginfo('url') ?>" class="btn btn-success">Regresar</a>
    </div>
  </div>