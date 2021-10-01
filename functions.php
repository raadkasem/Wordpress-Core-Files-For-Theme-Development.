<?php
add_theme_support( 'menus' );
add_theme_support( 'widgets' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( 'wp-block-styles' );

register_nav_menus(
	array(
		'primary'    => 'Header Menu',
		'social' => 'Social Links Menu',
	)
);

function add_categories_to_pages() {
register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_categories_to_pages' );

function add_tags_to_pages() {
register_taxonomy_for_object_type( 'post_tag', 'page' );
}
add_action( 'init', 'add_tags_to_pages');

add_theme_support(
	'html5',
	array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'script',
		'style',
	)
);

add_theme_support(
	'custom-logo',
	array(
		'width'      => 180,
		'height'     => 40,
		'flex-width' => true,
		'flex-height' => true,
	)
);

// make dashboard logo like site favicon
function dashboard_logo() {
	echo '
	  <style type="text/css">
	  #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon { content: url('. get_site_icon_url( ) .') !important; width: 25px; height: 25px; top: 3px; }
	   </style>
		 ';
 }
 add_action('admin_head', 'dashboard_logo');
 
// check for plugin using plugin name
if(in_array('polylang/polylang.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
    require get_template_directory() . '/lang.php'; // get language file
}else{
	// message function created on a fly... 
	$msg = create_function('', 'echo "<div class=\"notice notice-error is-dismissible\"><p>require polylang plugin</p></div>";');
	// and finaly notice! 
	add_action('admin_notices', $msg);
}

/* // hide edit page content for Template
add_action( 'admin_init', 'hide_m_editor' );

function hide_m_editor() {

        // Get the Post ID.
        if ( isset ( $_GET['post'] ) )
        $post_id = $_GET['post'];
        else if ( isset ( $_POST['post_ID'] ) )
        $post_id = $_POST['post_ID'];

    if( !isset ( $post_id ) || empty ( $post_id ) )
        return;

    // Get the name of the Page Template file.
    $template_file = get_post_meta($post_id, '_wp_page_template', true);

    if($template_file == 'page_template/meras.php'){ // edit the template name
        remove_post_type_support('page', 'editor');
    }
    if($template_file == 'page_template/jiwar.php'){ // edit the template name
        remove_post_type_support('page', 'editor');
    }

} */
