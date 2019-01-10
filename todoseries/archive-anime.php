<?php get_header(); ?>
    <div class="container">
        <?php echo get_breadcrumb(); ?>
        <div class="row">
	        <main>
                <div class="col-md-12">
                    <!-- New Posts -->
	                <div class="panel panel-default">
	                  <div class="panel-heading">
	                    <h3 class="panel-title"><i class="fa fa-star" aria-hidden="true"></i> Animes/Shows</h3>
	                  </div>
	                  <div class="panel-body">
	                    <div class="row store">
	                    <?php if(have_posts()) : while(have_posts()) : the_post();?>
	                       <div class="col-md-4  nuevos_animes text-center">
	                        <a href="<?php the_permalink(); ?>">
	                        	<span class="label HD"><i class="fa fa-comments" aria-hidden="true"></i> <?php comments_number( '0', '1', '%' ); ?></span>
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
	                    	<style type="text/css">.panel-body{ padding: 0px; } .store{ padding: 0px 15px; }</style>
	                    <div class="alert alert-danger" id="alerta_error">No video yet</div>
	                    <?php endif; ?>
	                    <?php wp_reset_query(); ?>
	                    </div>
	                  </div>
	                </div>
                    <?php numeric_pagination(); ?>
                </div>
            </main>
        </div>
    </div>
<?php get_footer(); ?>
