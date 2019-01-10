<?php
function anime() {
// Set UI labels for Custom Post Type
    $anime_labels = array(
        'name'                => _x( 'Animes', 'Post Type General Name', 'mundodonghua' ),
        'singular_name'       => _x( 'Anime', 'Post Type Singular Name', 'mundodonghua' ),
        'menu_name'           => __( 'Anime', 'mundodonghua' ),
		'name_admin_bar'        => __( 'Anime', 'mundodonghua' ),
		'archives'              => __( 'Anime Archives', 'mundodonghua' ),
		'attributes'            => __( 'Anime Attributes', 'mundodonghua' ),
        'parent_item_colon'   => __( 'Parent Anime', 'mundodonghua' ),
        'all_items'           => __( 'All Animes', 'mundodonghua' ),
        'add_new_item'        => __( 'Add New Anime', 'mundodonghua' ),
        'add_new'             => __( 'Add Anime', 'mundodonghua' ),
		'new_item'              => __( 'New Anime', 'mundodonghua' ),
        'edit_item'           => __( 'Edit Anime', 'mundodonghua' ),
        'update_item'         => __( 'Update Anime', 'mundodonghua' ),
        'view_item'           => __( 'View Anime', 'mundodonghua' ),
		'view_items'           => __( 'View Animes', 'mundodonghua' ),
        'search_items'        => __( 'Search Anime', 'mundodonghua' ),
        'not_found'           => __( 'Not Found', 'mundodonghua' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'mundodonghua' ),
		'featured_image'        => __( 'Featured Image', 'mundodonghua' ),
		'set_featured_image'    => __( 'Set featured image', 'mundodonghua' ),
		'remove_featured_image' => __( 'Remove featured image', 'mundodonghua' ),
		'use_featured_image'    => __( 'Use as featured image', 'mundodonghua' ),
		'insert_into_item'      => __( 'Insert into item', 'mundodonghua' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'mundodonghua' ),
		'items_list'            => __( 'Items list', 'mundodonghua' ),
		'items_list_navigation' => __( 'Items list navigation', 'mundodonghua' ),
		'filter_items_list'     => __( 'Filter items list', 'mundodonghua' ),
);
     
// Set other options for Custom Post Type
     
    $anime_args = array(
        'label'               => __( 'Animes', 'mundodonghua' ),
        'description'         => __( 'Anime', 'mundodonghua' ),
        'labels'              => $anime_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions','post-formats', 'page-attributes'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'categorias_anime'),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
		'menu_icon' => 'dashicons-format-gallery',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'anime', $anime_args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'anime', 0 );

function categorias_anime() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $anime_cats = array(
    'name' => _x( 'Anime Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Categories' ),
    'all_items' => __( 'All Categories' ),
    'parent_item' => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item' => __( 'Edit Category' ), 
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category' ),
    'menu_name' => __( 'Categories' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('categorias_anime',array('anime'), array(
    'hierarchical' => true,
    'labels' => $anime_cats,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'anime_category' ),
  ));
 
}
add_action( 'init', 'categorias_anime', 0 );

function tags_anime() { 
// Labels part for the GUI
 
  $anime_tags = array(
    'name' => _x( 'Anime Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tags' ),
    'popular_items' => __( 'Popular Tags' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ), 
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Tags' ),
  );
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('tags_anime',array('anime'),array(
    'hierarchical' => false,
    'labels' => $anime_tags,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'anime_tag' ),
  ));
}
add_action( 'init', 'tags_anime', 0 );



function peliculas() {
// Set UI labels for Custom Post Type
    $movie_labels = array(
        'name'                => _x( 'Movies', 'Post Type General Name', 'todoseries' ),
        'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'todoseries' ),
        'menu_name'           => __( 'Movies', 'todoseries' ),
		'name_admin_bar'        => __( 'Movies', 'todoseries' ),
		'archives'              => __( 'Movie Archives', 'todoseries' ),
		'attributes'            => __( 'Movie Attributes', 'todoseries' ),
        'parent_item_colon'   => __( 'Parent Movie', 'todoseries' ),
        'all_items'           => __( 'All Movies', 'todoseries' ),
        'add_new_item'        => __( 'Add New Movie', 'todoseries' ),
        'add_new'             => __( 'Add Movie', 'todoseries' ),
		'new_item'              => __( 'New Movie', 'todoseries' ),
        'edit_item'           => __( 'Edit Movie', 'todoseries' ),
        'update_item'         => __( 'Update Movie', 'todoseries' ),
        'view_item'           => __( 'View Movie', 'todoseries' ),
		'view_items'           => __( 'View Movies', 'todoseries' ),
        'search_items'        => __( 'Search Movie', 'todoseries' ),
        'not_found'           => __( 'Not Found', 'todoseries' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'todoseries' ),
		'featured_image'        => __( 'Featured Image', 'todoseries' ),
		'set_featured_image'    => __( 'Set featured image', 'todoseries' ),
		'remove_featured_image' => __( 'Remove featured image', 'todoseries' ),
		'use_featured_image'    => __( 'Use as featured image', 'todoseries' ),
		'insert_into_item'      => __( 'Insert into item', 'todoseries' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'todoseries' ),
		'items_list'            => __( 'Items list', 'todoseries' ),
		'items_list_navigation' => __( 'Items list navigation', 'todoseries' ),
		'filter_items_list'     => __( 'Filter items list', 'todoseries' ),
);
     
// Set other options for Custom Post Type
     
    $movie_args = array(
        'label'               => __( 'Movies', 'todoseries' ),
        'description'         => __( 'Movie', 'todoseries' ),
        'labels'              => $movie_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions','post-formats', 'page-attributes'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'categorias_movie'),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
		'menu_icon' => 'dashicons-format-gallery',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'peliculas', $movie_args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'peliculas', 0 );

function categorias_movie() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $movie_cats = array(
    'name' => _x( 'Movie Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Categories' ),
    'all_items' => __( 'All Categories' ),
    'parent_item' => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item' => __( 'Edit Category' ), 
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category' ),
    'menu_name' => __( 'Categories' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('categorias_movie',array('peliculas'), array(
    'hierarchical' => true,
    'labels' => $movie_cats,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'movie_category' ),
  ));
 
}
add_action( 'init', 'categorias_movie', 0 );

//========================= Tags for Portfolio Custom Type ===========================//

function tags_movie() { 
// Labels part for the GUI
 
  $movie_tags = array(
    'name' => _x( 'Movie Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tags' ),
    'popular_items' => __( 'Popular Tags' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ), 
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Tags' ),
  );
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('tags_movie',array('peliculas'),array(
    'hierarchical' => false,
    'labels' => $movie_tags,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'movie_tag' ),
  ));
}
add_action( 'init', 'tags_movie', 0 );
?>