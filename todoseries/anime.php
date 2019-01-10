<?php 
/*
Template Name: Chapters List
Template Post Type: anime
*/
?>
<?php get_header(); ?>
	<div class="container">
        <?php echo get_breadcrumb(); ?>
        <?php include("includes/previousnext.php"); ?>
    	<div class="row">
        	<!-- Sidebar -->
            <div class="col-md-3">
                <div class="list-group">
                    <div class="list-group-item" style="padding:0;">
                      <?php if(has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('',array('class' => 'img-responsive', 'style' => 'width: 100%;')); ?>
                      <?php else : ?>
                        <?php no_image(); ?>
                      <?php endif; ?>
                    </div>
                    <?php if (!$post->post_parent ) : ?>
                        <span class="list-group-item"><b>Estado:</b> <?php echo estado(get_the_ID()); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Main Content -->
            <div class="col-md-9">
            <?php if(have_posts()) : the_post() ?>
            	<!-- Title -->
            	<div class="panel panel-default">
                	<div class="panel-heading" id="video_titulo">
                    	<h1 class="panel-title"><i class="fa fa-header" aria-hidden="true"></i> 
                    		<?php the_title(); ?>
                    	</h1>
                    </div>
                </div>
                <!-- Description -->
            	<div class="panel panel-default">
                	<div class="panel-heading">
                    	<h1 class="panel-title"><i class="fa fa-book" aria-hidden="true"></i> Description</h1>
                    </div>
                    <div class="panel-body">
                    	<?php the_content(); ?>
                    </div>
                </div>
                <!-- Chapters List -->
            	<div class="panel panel-default">
                	<div class="panel-heading">
                    	<h1 class="panel-title"><i class="fa fa-list" aria-hidden="true"></i> Chapter List</h1>
                    </div>
                    <div class="panel-body" id="video_player" style="height: 500px; overflow-y: auto;">
                    <?php 
                        $listados = new WP_Query(array(
                            'post_type' => 'anime',
                            'order' => 'DESC',
                            'post_parent'   => $post->ID,
                            'post_parent__not_in' => array(0),
                            'posts_per_page' => -1,
                        ));
                    ?>
                    <table class="table table-hover" id="listado">
                    <?php if($listados->have_posts()) : ?>
                            <tbody>
                        <?php while($listados->have_posts()) : $listados->the_post(); ?>
                                <tr>
                                    <td>
                                        <i class="fa fa-youtube-play text-success"></i> <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                    </td>
                                </tr>
                        <?php endwhile; ?>
                        <?php else : ?>
                            <div class="alert alert-danger" id="alerta_error">There's no episode yet</div>
                            </tbody>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                    </table>
                    </div>
                </div>
                <?php include('includes/share.php'); ?>
                <!-- Categories -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title"><i class="fa fa-tag" aria-hidden="true"></i> Categories</h1>
                    </div>
                    <div class="panel-body">
                    <?php 
                    global $post;
                    $terms = wp_get_post_terms( get_the_ID(),'categorias_anime');
                    if ($terms) {
                        $output = array();
                        foreach ($terms as $term) {
                            $output[] = '<a href="' .get_term_link( $term->slug, 'categorias_anime') .'"><span class="label label-success">' .$term->name .'</span></a>';
                        }
                        echo join( ' ', $output );
                    } else {
                       echo '<a><span class="label label-success">Sin categoria</span></a>';
                    }
                    ?>
                    </div>
                </div>
                <!-- Tags -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title"><i class="fa fa-tags" aria-hidden="true"></i> Tags</h1>
                    </div>
                    <div class="panel-body">
                    <?php 
                    global $post;
                    $terms = wp_get_post_terms( get_the_ID(), 'tags_anime' );
                    if ($terms) {
                        $output = array();
                        foreach ($terms as $term) {
                            $output[] = '<a href="' .get_term_link( $term->slug, 'tags_anime') .'"><span class="label label-success">' .$term->name .'</span></a>';
                        }
                        echo join( ' ', $output );
                    } else {
                       echo '<a><span class="label label-success">Sin tags</span></a>';
                    }
                    ?>
                    </div>
                </div>
                      <?php comments_template(); ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>