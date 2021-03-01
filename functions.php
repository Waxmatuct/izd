<?php 

add_action( 'wp_enqueue_scripts', 'izd_styles' );
add_action( 'wp_enqueue_scripts', 'jquery_lib' );

function izd_styles() {
	wp_enqueue_style( 'main', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap-min', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
	wp_enqueue_style( 'fancy-box', '//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css' );
}

function jquery_lib() {
	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', false, null, true );
	wp_enqueue_script( 'jquery-core', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', array(), null, true );
	wp_register_script( 'popper', '//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js');
	wp_enqueue_script('popper', '', array('jquery'), null, true);
	wp_register_script( 'bootstrap-min', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js');
	wp_enqueue_script('bootstrap-min', '', array('jquery'), null, true);
	wp_register_script( 'fancybox', '//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js');
	wp_enqueue_script('fancybox', '', array('jquery'), null, true);
	wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
}

function wpse_enqueue_page_template_styles() {
    if ( is_page_template( 'dash-page.php' ) ) {
        wp_enqueue_style( 'dashboard', get_template_directory_uri() . '/css/dashboard.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'wpse_enqueue_page_template_styles' );

require get_template_directory() . '/bootstrap-navwalker.php';

register_nav_menus( array(
    'main' => esc_html__( 'Primary', 'izd' ),
) );

/* Подключение стилей Gutenberg */
function my_gutenberg_style() {
    wp_enqueue_style('gutenberg-style', get_stylesheet_directory_uri().'/editor.css');
}
add_action('enqueue_block_editor_assets', 'my_gutenberg_style');

add_theme_support( 'custom-logo' );

//Ссылка на План изданий в админ-меню
add_action('admin_menu', 'dashboard_page'); 
function dashboard_page() {

	$post_id  = 55;
  $title = 'План 2020';
	$url = get_permalink( $post_id );
		if ( $url ) {
			add_menu_page( $title, $title, 'manage_options', $url, '', 'dashicons-chart-bar', 1 );
		}

  $post_id  = 268;
  $title = 'План 2021';
  $url = get_permalink( $post_id );
    if ( $url ) {
      add_menu_page( $title, $title, 'manage_options', $url, '', 'dashicons-chart-bar', 1 );
    }

}


/*
 * Function for post duplication. Dups appear as drafts. User is redirected to the edit screen
 */
function rd_duplicate_post_as_draft(){
  global $wpdb;
  if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
    wp_die('No post to duplicate has been supplied!');
  }
 
  /*
   * Nonce verification
   */
  if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
    return;
 
  /*
   * get the original post id
   */
  $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
  /*
   * and all the original post data then
   */
  $post = get_post( $post_id );
 
  /*
   * if you don't want current user to be the new post author,
   * then change next couple of lines to this: $new_post_author = $post->post_author;
   */
  $current_user = wp_get_current_user();
  $new_post_author = $current_user->ID;
 
  /*
   * if post data exists, create the post duplicate
   */
  if (isset( $post ) && $post != null) {
 
    /*
     * new post data array
     */
    $args = array(
      'comment_status' => $post->comment_status,
      'ping_status'    => $post->ping_status,
      'post_author'    => $new_post_author,
      'post_content'   => $post->post_content,
      'post_excerpt'   => $post->post_excerpt,
      'post_name'      => $post->post_name,
      'post_parent'    => $post->post_parent,
      'post_password'  => $post->post_password,
      'post_status'    => 'draft',
      'post_title'     => $post->post_title,
      'post_type'      => $post->post_type,
      'to_ping'        => $post->to_ping,
      'menu_order'     => $post->menu_order
    );
 
    /*
     * insert the post by wp_insert_post() function
     */
    $new_post_id = wp_insert_post( $args );
 
    /*
     * get all current post terms ad set them to the new post draft
     */
    $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
    foreach ($taxonomies as $taxonomy) {
      $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
      wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
    }
 
    /*
     * duplicate all post meta just in two SQL queries
     */
    $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
    if (count($post_meta_infos)!=0) {
      $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
      foreach ($post_meta_infos as $meta_info) {
        $meta_key = $meta_info->meta_key;
        if( $meta_key == '_wp_old_slug' ) continue;
        $meta_value = addslashes($meta_info->meta_value);
        $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
      }
      $sql_query.= implode(" UNION ALL ", $sql_query_sel);
      $wpdb->query($sql_query);
    }
 
 
    /*
     * finally, redirect to the edit post screen for the new draft
     */
    wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
    exit;
  } else {
    wp_die('Post creation failed, could not find original post: ' . $post_id);
  }
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
  if (current_user_can('edit_posts')) {
    $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
  }
  return $actions;
}
 
add_filter( 'page_row_actions', 'rd_duplicate_post_link', 10, 2 );

//отключение jquery-migrate-min
function remove_jq_migrate( $scripts ) {
if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
$script = $scripts->registered['jquery'];
if ( $script->deps ) {
$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
}
}
}
add_action( 'wp_default_scripts', 'remove_jq_migrate' );