<?php get_header();?>
    <div class="container">
        <?php echo get_breadcrumb(); ?>
        <div class="row">
	        <main>
                <div class="col-md-8">
                    <!-- New Posts -->
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-header" aria-hidden="true"></i> <?php wp_title(''); ?></h3>
                      </div>
                      <div class="panel-body">
                        <?php if(have_posts()) :  while(have_posts()) : the_post() ; ?>
                        <article>
                                <h3>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="callout small">
                                    <time><i class="fa fa-calendar"></i> <?php the_time('M j, Y'); ?> at <?php the_time('g:i a'); ?></time> by <?php the_author(); ?>
                                </div>
                                <figure>
                                    <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive"/></a>
                                </figure>
                                <br>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink() ?>">Read more →</a>
                                <hr>
                        </article>
                        <?php endwhile; ?>
                        <?php else : ?>
                            <div class="alert alert-danger">No post yet.</div>
                        <?php endif; ?>
    
                      </div>
                    </div>
                    
                    <?php numeric_pagination(); ?>
                </div>
            </main>
            <?php get_sidebar(); ?>          
        </div>
    </div>
<?php get_footer(); ?>