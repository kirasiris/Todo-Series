<?php get_header(); ?>
	<div class="container">
        <?php echo get_breadcrumb(); ?>
        <?php include("includes/previousnext.php"); ?>
    	<div class="row">
            <!-- Main Content -->
            <div class="col-md-12">
                <?php if(have_posts()) : the_post() ?>
            	<!-- Title -->
            	<div class="panel panel-default">
                	<div class="panel-heading" id="video_titulo"><i class="fa fa-header" aria-hidden="true"></i> 
                    	<a href="<?php echo get_permalink( $post->post_parent ); ?>"><?php echo get_the_title( $post->post_parent ); ?></a> | <?php the_title(); ?>
                    </div>
                </div>
                <!-- Iframes Array -->
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
                <?php include('includes/share.php'); ?>
                <?php comments_template(); ?>
            <?php endif; ?>
            </div>
            <?php wp_reset_query(); ?>
        </div>
    </div>
<?php get_footer(); ?>
    <script type="text/javascript">
        // Solution to prevent window openings after clicking iframe several times
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