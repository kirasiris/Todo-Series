<?php get_header(); ?>
<div class="container">
	<?php echo get_breadcrumb(); ?>
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header"><?php wp_title(''); ?></h1>
			<!-- Posts  -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title"><i class="fa fa-eye" aria-hidden="true"></i> Posts</h1>
				</div>
				<div class="panel-body scrolling-wrapper owl-carousel" id="video_player">
					<?php $post_type = get_post_field( 'post_type', get_the_ID() ); ?>
					<?php if($post_type == 'post') : ?>
						<?php while (have_posts()) : the_post(); ?>
							<div class="col-md-6 item resultados_search text-center card">
								<a href="<?php the_permalink(); ?>">
									<?php if(has_post_thumbnail()) : ?>
				                      <img src="<?php the_post_thumbnail_url() ?>" alt="" style="width: 100%;min-height: 300px;height: 300px;">
				                    <?php else : ?>
				                      <?php no_image(); ?>
				                    <?php endif; ?>
								</a>
								<figcaption>
									<span class="pull-left"><?php the_title(); ?></span>
								</figcaption>
							</div>
						<?php endwhile; ?>
						<?php elseif($post_type != 'post') : ?>
						    <div class="alert alert-danger" id="alerta_error">Ningun post con la keyword</div>
					<?php endif; ?>
				</div>
			</div>
			<!-- Animes -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title"><i class="fa fa-eye" aria-hidden="true"></i> Animes/Shows</h1>
				</div>
				<div class="panel-body scrolling-wrapper owl-carousel" id="video_player">
					<?php $anime_post_type = get_post_field( 'post_type', get_the_ID() ); ?>
					<?php if($anime_post_type == 'anime') : ?>
						<?php while (have_posts()) : the_post(); ?>
							<div class="col-md-6 item resultados_search text-center card">
								<a href="<?php the_permalink(); ?>">
									<?php if(has_post_thumbnail()) : ?>
				                      <img src="<?php the_post_thumbnail_url() ?>" alt="" style="width: 100%;min-height: 300px;height: 300px;">
				                    <?php else : ?>
				                      <?php no_image(); ?>
				                    <?php endif; ?>
								</a>
								<figcaption>
									<span class="pull-left"><?php the_title(); ?></span>
								</figcaption>
							</div>
						<?php endwhile; ?>
						<?php elseif($anime_post_type != 'anime') : ?>
						    <div class="alert alert-danger" id="alerta_error">No post with specific keyword</div>
					<?php endif; ?>
				</div>
			</div>
			<!-- Peliculas -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title"><i class="fa fa-eye" aria-hidden="true"></i> Movies</h1>
				</div>
				<div class="panel-body scrolling-wrapper owl-carousel" id="video_player">
					<?php $movie_post_type = get_post_field( 'post_type', get_the_ID() ); ?>
					<?php if($movie_post_type == 'peliculas') : ?>
						<?php while (have_posts()) : the_post(); ?>
							<div class="col-md-6 item resultados_search text-center card">
								<a href="<?php the_permalink(); ?>">
									<?php if(has_post_thumbnail()) : ?>
				                      <img src="<?php the_post_thumbnail_url() ?>" alt="" style="width: 100%;min-height: 300px;height: 300px;">
				                    <?php else : ?>
				                      <?php no_image(); ?>
				                    <?php endif; ?>
								</a>
								<figcaption>
									<span class="pull-left"><?php the_title(); ?></span>
								</figcaption>
							</div>
						<?php endwhile; ?>
						<?php elseif($movie_post_type != 'peliculas') : ?>
						    <div class="alert alert-danger" id="alerta_error">No post with specific keyword</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
