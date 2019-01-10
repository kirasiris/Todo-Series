<?php get_header(); ?>
<div class="container">
	<?php echo get_breadcrumb(); ?>
	<div class="row">
		<main>
	    	<div class="col-md-8">
	    		<!-- Content -->
	    		<?php if(have_posts()) : the_post(); ?>
	    		<div class="panel panel-default">
			        	<div class="panel-heading">
			        		<h1 class="panel-title"><i class="fa fa-header"></i> <?php the_title(); ?></h1>
			        	</div>
			        	<div class="panel-body">
			        		<?php the_content();?>			        		
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
			    <?php endif; ?>
	        </div>
    	</main>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>