<?php 
/*
Template Name: Full Width
Template Post Type: post, page
*/
?>
<?php get_header(); ?>
	<div class="container">
    <?php echo get_breadcrumb(); ?>
    <?php include("includes/previousnext.php"); ?>
    	<div class="row">
        	<main>
                <div class="col-md-12">
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
                            <span><i class="fa fa-user"></i> <?php the_author(); ?></span>
                            <?php if(is_single()) : ?>
                              <span><i class="fa fa-tag"></i> <?php the_category(','); ?></span>
                              <span><i class="fa fa-tags"></i> <?php the_tags(); ?></span>
                          <?php endif; ?>
                          </div>
                        </div>
                        <?php include('includes/share.php'); ?>
                        <?php comments_template(); ?>
                    </article>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>
<?php get_footer(); ?>