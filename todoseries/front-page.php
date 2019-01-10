<?php get_header();?>
<?php
  $args = array(
    'orderby'   => 'comment_count',
    'posts_per_page'    => '3',
  );
  $my_query = new wp_query( $args );
?>                           
<?php if($my_query->have_posts()) : ?>
<style>
  .navbar{
    margin-bottom: 0px;
  }
  .container{
    margin-top: 20px;
  }
  .carousel{
    text-align: center;
  }
  .carousel img{
    height: 536px !important;
    width: 100%;
  }
  .carousel-caption{
    display: block;
    position: absolute;
    background-image: linear-gradient(to top,rgba(0,0,0,.9) 0,rgba(0,0,0,.0001) 100%);
    background-repeat: repeat-x;
    right: 0;
    left: 0;
    bottom: 0;
    padding: 0px 250px 70px 250px;
  }
</style>
<!-- Carousel -->
<div id="carousel-example-generic" class="carousel slide hidden-xs hidden-sm" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php $count = 0; ?>
    <?php while($my_query->have_posts()) : $my_query->the_post() ; ?>
    <div class="item <?php echo ($count == 0) ? 'active' : ''; ?>">
      <img src="<?=wp_get_attachment_url( get_post_thumbnail_id() ); ?>">
      <div class="carousel-caption">
        <h3><?php the_title() ?></h3>
        <p><?php the_excerpt() ?></p>
        <a href="<?php the_permalink(); ?>" class="btn btn-success">Leer mas</a>
      </div>
    </div>
    <?php $count++; ?>
  <?php endwhile; ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php endif; ?>
<?php wp_reset_query(); ?>

<!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            
                <!-- New Chapters -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title pull-left" style="padding: 10px;"><i class="fa fa-star" aria-hidden="true"></i> New Chapters</h3>
                    <div class="hidden-xs hidden-sm pull-right">
                      <button class="btn btn-success btn-sm" onclick="one()"><i class="fa fa-stop" aria-hidden="true"></i></button>
                      <button class="btn btn-success btn-sm" onclick="two()"><i class="fa fa-th-large" aria-hidden="true"></i></button>
                      <button class="btn btn-success btn-sm" onclick="three()"><i class="fa fa-th" aria-hidden="true"></i></button>
                      <button class="btn btn-success btn-sm" onclick="four()">4</button>
                     </div>
                     <div class="clearfix"></div>
                  </div>
                  <div class="panel-body">
                    <div class="row store">
                    <?php 
                    $anime_query = new WP_Query(array(
                        'post_type' => 'anime',
                        'order' => 'DESC',
                        'post_parent__not_in' => array(0),
                        'posts_per_page' => 20,
                    ));
                    ?>
                    <?php if($anime_query->have_posts()) : while($anime_query->have_posts()) : $anime_query->the_post();?>
                       <div class="col-md-4  products text-center">
                        <a href="<?php the_permalink(); ?>">
                          <span class="label HD"><?php echo get_the_title( $post->ID ); ?></span>
                          <?php if(has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail(); ?>
                          <?php else : ?>
                            <?php no_image(); ?>
                          <?php endif; ?>
                        </a>
                            <figcaption>
                              <span class="pull-left"><?php echo get_the_title( $post->post_parent ); ?></span>
                            </figcaption>
                       </div>
                    <?php endwhile; ?>
                    <?php else : ?>
                    <div class="alert alert-danger" style="width:100%">No video yet.</div>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                    </div>
                  </div>
                </div>
                
                <!-- Nuevas Series -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-star" aria-hidden="true"></i> New Animes/Shows</h3>
                  </div>
                  
                  <div class="panel-body">
                    <div class="row store">
                    <?php 
                    $peliculas_query = new WP_Query(array(
                        'post_type' => array('anime', 'peliculas'),
                        'order' => 'DESC',
                        'post_parent' => 0,
                        'posts_per_page' => 20,
                    ));
                    ?>
                    <?php if($peliculas_query->have_posts()) : while($peliculas_query->have_posts()) : $peliculas_query->the_post();?>
                       <div class="col-md-4  nuevos_animes text-center">
                        <a href="<?php the_permalink(); ?>">
                          <span class="label HD"><?php echo get_post_type( get_the_ID() ); ?></span>
                          <?php if(has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail(); ?>
                          <?php else : ?>
                            <?php no_image(); ?>
                          <?php endif; ?>
                        </a>
                            <figcaption>
                            	<span class="pull-left"><?php the_title(); ?></span>
                            </figcaption>
                       </div>
                    <?php endwhile; ?>
                    <?php else : ?>
                    <div class="alert alert-danger" style="width:100%">No video yet</div>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                    </div>
                  </div>
                  
                  
                </div>
                
            </div>
            <div class="col-md-4">
              <!--  Populares -->
              <div class="panel panel-default hidden-xs hidden-sm ">
                <div class="panel-heading">
                  <h1 class="panel-title"><i class="fa fa-fire" aria-hidden="true"></i> Populars</h1>
                </div>
                <div class="panel-body" id="video_player">
                         <?php
                            $my_query = new wp_query( 
                              array(
                                'orderby'   => 'comment_count',
                                'posts_per_page'    => '10',
                                'post_parent' => 0,
                                'post_type' => array('anime', 'peliculas'),
                              )
                            );
                         ?>
                  <?php if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post(); ?>
                  <div class="list-group" style="margin: 0px;">
                      <a href="<?php the_permalink(); ?>" class="list-group-item" id="populares">
                        <?php echo wp_trim_words( get_the_title(), 3, '...' ); ?>
                        <strong class="label label-success pull-right"><?php echo get_post_type( get_the_ID() ); ?></strong>
                      </a>
                  </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
                </div>
              </div>
              <!-- Blog -->
              <div class="panel panel-default hidden-xs hidden-sm ">
                <div class="panel-heading">
                  <h1 class="panel-title"><i class="fa fa-list" aria-hidden="true"></i> Blog</h1>
                </div>
                <div class="panel-body" id="video_player">
                         <?php
                            $my_query = new wp_query( array(
                              'posts_per_page' => '10',
                            ) );
                         ?>
                  <?php if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post(); ?>
                  <div class="list-group" style="margin: 0px;">
                      <a href="<?php the_permalink(); ?>" class="list-group-item" id="populares">
                        <?php echo wp_trim_words( get_the_title(), 3, '...' ); ?>
                        <strong class="label label-success pull-right"><i class="fa fa-comments" aria-hidden="true"></i> <?php comments_number( '0', '1', '%' ); ?></strong>
                      </a>
                  </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
                </div>
              </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
    "use restrict";
		// Get the elements with class="products"
		;var elements = document.getElementsByClassName("products");
		
		// Declare a "loop" variable
		var i;
		
		// Full-width images
		function one() {
			for (i = 0; i < elements.length; i++) {
				elements[i].style.flex = "100%"; 
			}
		}
		
		// Two images side by side
		function two() {
			for (i = 0; i < elements.length; i++) {
				elements[i].style.flex = "50%"; 
			}
		}
		
		// Three images side by side
		function three() {
			for (i = 0; i < elements.length; i++) {
				elements[i].style.flex = "33%"; 
			}
		}
		
		// Four images side by side
		function four() {
			for (i = 0; i < elements.length; i++) {
				elements[i].style.flex = "25%"; 
			}
		}
    </script>
<?php get_footer(); ?>