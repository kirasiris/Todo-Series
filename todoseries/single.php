<?php get_header(); ?>
	<div class="container">
    <?php echo get_breadcrumb(); ?>
    <?php include("includes/previousnext.php"); ?>
    	<div class="row">
        	<main>
                <div class="col-md-8">
                    <!-- Article -->
                    <?php if(have_posts()) : the_post(); ?>
                    <article>
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h1 class="panel-title"><i class="fa fa-header"></i> <?php the_title(); ?></h1>
                          </div>
                          <div class="panel-body">
                              <span class=""><i class="fa fa-calendar"></i> <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?> <?php // the_time('M j, Y'); ?></span>
                          </div>
                          <div class="panel-body">
                            <?php the_content(); ?>   
                          </div>
                          <div class="panel-footer">
                            <span class=""><i class="fa fa-tag"></i> <?php the_category(','); ?></span>
                            <span class=""><i class="fa fa-tags"></i> <?php the_tags(); ?></span>
                          </div>
                        </div>
                        <?php include('includes/share.php'); ?>
                        <?php comments_template(); ?>
                    </article>
                    <?php endif; ?>
                </div>
            </main>
            <?php get_sidebar(); ?>
        </div>
  </div>
<?php get_footer(); ?>