<?php
// Register Nav Wlker Class()
require_once('wp-bootstrap-navwalker.php');
require get_template_directory(). '/includes/big_functions.php';
require get_template_directory(). '/includes/customizer.php';
require get_template_directory(). '/includes/custom_post_types.php';

function wpb_theme_setup(){
// Registering main navs/menus
	register_nav_menus(array(
      'primary' => __('Menu Principal', 'todoseries'),
      'secondary' => __('Menu Secundario', 'todoseries'),
    ));

// File support
	 add_theme_support('custom-logo');
	 add_theme_support('post-thumbnails');
     add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', 'gallery', 'caption', ) );
	}
	add_action('after_setup_theme','wpb_theme_setup');

// No featured image
    function no_image(){
				echo '<img src="http://fpae.pt/backup/20181025/wp/wp-content/plugins/post-slider-carousel/images/no-image-available-grid.jpg" class="img-responsive">';
    }

// Excerpt Lenght
	function set_excerpt_length(){
		return 45;
		}
	add_filter('excerpt_length' , 'set_excerpt_length');

// Search input function. The input will look for the typed keyword on the specific post_types
    if (!is_admin()) {
        function search_filter($query) {
            if (is_search() && $query->is_main_query() && $query->get( 's' )) {
                $query->set('post_type', array('post', 'anime', 'peliculas'));
            }
            return $query;
        }
        add_filter('pre_get_posts','search_filter');
    }

// Search by post_type
add_filter( 'posts_orderby', 'order_search_by_posttype', 10, 1 );
function order_search_by_posttype( $orderby ){
    if( ! is_admin() && is_search() ) :
        global $wpdb;
        $orderby =
            "
            CASE WHEN {$wpdb->prefix}posts.post_type = 'post' THEN '1'
                 WHEN {$wpdb->prefix}posts.post_type = 'anime' THEN '2'
                 WHEN {$wpdb->prefix}posts.post_type = 'peliculas' THEN '3'
            ELSE {$wpdb->prefix}posts.post_type END ASC,
            {$wpdb->prefix}posts.post_title ASC";
    endif;
    return $orderby;
}

// Search keyword only on title
function search_by_title_only( $search , $wp_query )
{
    global $wpdb;
    if(empty($search)) {
        return $search; // skip processing - no search term in query
    }
    $q = $wp_query->query_vars;
    $n = !empty($q['exact']) ? '' : '%';
    $search =
    $searchand = '';
    foreach ((array)$q['search_terms'] as $term) {
        $term = esc_sql($wpdb->esc_like($term));
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
    if (!empty($search)) {
        $search = " AND ({$search}) ";
        if (!is_user_logged_in())
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
    return $search;
}
add_filter('posts_search', 'search_by_title_only', 500, 2);

// If not featured image selected, automatically select the first image in post and use it as featured image
function autoset_featured() {
    global $post;
    $already_has_thumb = has_post_thumbnail($post->ID);
        if (!$already_has_thumb)  {
        $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
            if ($attached_image) {
                foreach ($attached_image as $attachment_id => $attachment) {
                    set_post_thumbnail($post->ID, $attachment_id);
                }
            }
        }
    }

    add_action('the_post', 'autoset_featured');
    add_action('save_post', 'autoset_featured');
    add_action('draft_to_publish', 'autoset_featured');
    add_action('new_to_publish', 'autoset_featured');
    add_action('pending_to_publish', 'autoset_featured');
    add_action('future_to_publish', 'autoset_featured');

// Change column order for posts/pages and CPTs in Wp-admin panel
add_filter('manage_posts_columns', 'columns_order', 5); // for Posts
add_filter('manage_pages_columns', 'columns_order', 5); // for Pages

function columns_order( $columns ) {
  $columns['id'] = 'ID'; // $colums['id'] = 'Column Title';
  $columns['title'] = 'Title'; // $colums['title'] = 'Column Title';
  $columns['img'] = 'Featured Image'; // $colums['img'] = 'Column Title';
  return $columns;
}

// ID column for posts/pages and CPTS
add_action('manage_posts_custom_column', 'id_content', 5, 2);
add_action('manage_pages_custom_column', 'id_content', 5, 2);

function id_content($column, $id ){
	if( 'id' == $column)
		echo $id;
}


// IMG column for posts/pages and CPTs
add_filter('manage_posts_custom_column', 'manage_img_column', 10, 3);
add_filter('manage_pages_custom_column', 'manage_img_column', 10, 3);

function manage_img_column($column_name, $post_id) {
    if( $column_name === 'img' ) {
        echo get_the_post_thumbnail($post_id, 'thumbnail');
        return true;
    }
}

// Iframe, Lenght and Iframe(video) state
function iframe($postID){
    $iframe = 'iframe_player';
    $iframe_content = get_post_meta($postID, $iframe, true);
    if($iframe_content == ''){
        delete_post_meta($postID,$iframe);
        add_post_meta($postID,$iframe, '#');
        return '#';
        }
    return $iframe_content;
    }

function duracion_iframe($postID){
    $duracion_iframe = 'duracion';
    $lenght_iframe = get_post_meta($postID, $duracion_iframe, true);
    if($lenght_iframe == ''){
        delete_post_meta($postID, $duracion_iframe);
        add_post_meta($postID, $duracion_iframe, 'Sin limite de tiempo');
        return 'Sin limite de tiempo';
    }
    return $lenght_iframe;
}

function estado($postID){
    $video_status = 'estado_de_video';
    $video_terminado = get_post_meta($postID, $video_status, true);
    if($video_terminado == ''){
        delete_post_meta($postID, $video_status);
        add_post_meta($postID, $video_status, 'Sin especificacion');
        return 'Sin especificacion';
    }
    return $video_terminado;
}

// Sidebar and Widgets position
    function wpb_init_widgets($id){
        register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="panel panel-default widgets">',
        'after_widget' => '</div>',
        'before_title' => '<div class="panel-heading"><h1 class="panel-title">',
        'after_title' => '</h1></div>',
        ));
    }

    add_action('widgets_init', 'wpb_init_widgets');
// Bootstrap comments
        function bootstrap_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        ?>
        <?php if ( $comment->comment_approved == '1' ): ?>
        <li class="media">
            <div class="media-left">
                <?php echo get_avatar( $comment, 40); ?>
            </div>
            <div class="media-body">
                <h4 class="media-heading">
                    <?php comment_author_link() ?>
                </h4>
                <time>
                    <a href="#comment-<?php comment_ID() ?>">
                        <?php comment_date() ?> at <?php comment_time() ?>
                    </a>
                </time>
                <?php echo delete_comment_link(); ?>
                <?php comment_text() ?>
                <?php
                    comment_reply_link(array_merge(
                        $args, array(
                            'depth' => $depth,
                            'max_depth' => $args['max_depth'],
                        )
                    )
                    )
                ?>
            </div>
        </li>
        <?php else : ?>
            <p class="bg-success">Your comments is waiting for approvation</p>
        <?php endif;
    }

// To delete comments directly from website, without the need of going to Wp-admin
 function delete_comment_link() {
  $comment_ID = get_comment_ID();
  if (current_user_can('edit_post')) {
    echo '<a href="'.admin_url("comment.php?action=cdc&c=$comment_ID").'" style="color: red">Borrar</a> ';
    echo '<a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$comment_ID").'" style="color: purple">Spam</a>';
  }
}
