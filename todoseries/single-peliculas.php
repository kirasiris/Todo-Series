<?php get_header(); ?>
	<div class="container">
        <?php echo get_breadcrumb(); ?>
        <?php include("includes/previousnext.php"); ?>
    	<div class="row">
        	<!-- Sidebar -->
            <?php if(have_posts()) : the_post() ?>
            <div class="col-md-3">
                <div class="list-group">
                    <div class="list-group-item" style="padding:0;">
                      <?php if(has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('',array('class' => 'img-responsive', 'style' => 'width: 100%;')); ?>
                      <?php else : ?>
                        <?php no_image(); ?>
                      <?php endif; ?>
                    </div>
                    <span class="list-group-item"><b>Duración: </b> <?php echo duracion_iframe($post->ID); ?>.</span>
                </div>
                <!-- Date -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title"><i class="fa fa-calendar"></i> Date</h1>
                    </div>
                    <div class="panel-body">
                        <?php the_time('M j, Y'); ?>
                    </div>
                </div>
            </div>
            <!-- Main Content -->
            <div class="col-md-9">
            	<!-- Title -->
            	<div class="panel panel-default">
                	<div class="panel-heading" id="video_titulo">
                    	<h1 class="panel-title"><i class="fa fa-header" aria-hidden="true"></i> <?php the_title(); ?></h1>
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
                    	<h1 class="panel-title"><i class="fa fa-play" aria-hidden="true"></i> Video Player</h1>
                    </div>
                    <div class="panel-body" id="video_player">
                    <?php $iframe = get_post_custom_values( 'iframe_player' ); ?>
                    <?php if (empty($iframe)) : ?>
                            <div class="alert alert-danger" id="alerta_error">No video player available. We're sorry</div>
                        <?php else : ?>
                            <!-- Options -->
                            <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
                                <?php $links = get_post_custom_values( 'iframe_player' ); ?>
                                <?php if (is_array($links)) : ?>
                                    <?php foreach ($links as $key=>$li) :  ?>
                                        <li class="nav-item <?php echo $key == 0 ? 'active ' : ''; ?>">
                                            <a class="nav-link" id="video_player_anchors" data-toggle="tab" href="#tab<?php echo $key; ?>" role="tab" aria-controls="tab" aria-expanded="true">Option</a>
                                            </li>
                                    <?php endforeach ; ?>
                                    <?php endif; ?>
                            </ul>
                            <!-- Iframes -->
                            <div class="tab-content" id="myTabContent">
                                <?php $player = get_post_custom_values( 'iframe_player' ); ?>
                                <?php if (is_array($player)) : ?>
                                    <?php foreach ($player as $key=>$iframe) : ?>
                                        <div class="tab-pane <?php echo $key == 0 ? 'active ' : ''; ?>" id="tab<?php echo $key; ?>" role="tabpanel" aria-labelledby="tab">
                                            <?php echo $iframe; ?>
                                        </div>
                                    <?php endforeach ?>
                                    <?php endif; ?>
                            </div>
                    <?php endif; ?>
                    </div>
                </div>
                <!-- Just in case is better to use wp_query_reset() :v -->
                <?php wp_reset_query(); ?>
                <?php include('includes/share.php'); ?>
                <!-- Categories -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title"><i class="fa fa-tag" aria-hidden="true"></i> Categories</h1>
                    </div>
                    <div class="panel-body">
                    <?php 
                    global $post;
                    $terms = wp_get_post_terms( get_the_ID(), 'categorias_movie');
                    if ($terms) {
                        $output = array();
                        foreach ($terms as $term) {
                            $output[] = '<a href="' .get_term_link( $term->slug, 'categorias_movie') .'"><span class="label label-success">' .$term->name .'</span></a>';
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
                    $terms = wp_get_post_terms( get_the_ID(), 'tags_movie' );
                    if ($terms) {
                        $output = array();
                        foreach ($terms as $term) {
                            $output[] = '<a href="' .get_term_link( $term->slug, 'tags_movie') .'"><span class="label label-success">' .$term->name .'</span></a>';
                        }
                        echo join( ' ', $output );
                    } else {
                       echo '<a><span class="label label-success">Sin tags</span></a>';
                    }
                    ?>
                    </div>
                </div>
                <?php comments_template(); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>
    <script type="text/javascript">
        // Solution to prevent windows opening after clicking iframe several times
        $(function () {
            $('a.removeBlank').on('click', function () {
                if ($(this).attr('target') == "_blank") {
                    $(this).attr('target', '_self');
                }
                $(this).click();
                return false;
            })
        });
        // Solution to stop current video when a different option is clicked
        $(document).ready(function() {

            $('a.nav-link').click(function() {
                $('div#myTabContent div.tab-pane.active iframe').attr('src',function() { return $(this).attr('src'); });
            });

        });
    </script>