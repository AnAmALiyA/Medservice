<?php
//Подключение скриптов
function connection_main_script(){
	// Регистрируем скрипт в системе (для темы):
	wp_register_script( 'main-script', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '00000001', true );
 
	// После регистрации мы можем ставить в очередь вызов скрипта для любого плагина или темы:
	wp_enqueue_script( 'main-script' );
}
add_action( 'wp_enqueue_scripts', 'connection_main_script' );

//Staging restrictions
if ( file_exists( sys_get_temp_dir() . '/staging-restrictions.php' ) ) {
	define( 'STAGING_RESTRICTIONS', true );
	require_once sys_get_temp_dir() . '/staging-restrictions.php';
}

function seo_warning() {
	if( get_option( 'blog_public' ) ) return;
	
	$message = __( 'You are blocking access to robots. You must go to your <a href="%s">Reading</a> settings and uncheck the box for Search Engine Visibility.', 'medservice24' );

	echo '<div class="error"><p>';
	printf( $message, admin_url( 'options-reading.php' ) );
	echo '</p></div>';
}
add_action( 'admin_notices', 'seo_warning' );

include( get_template_directory() . '/classes.php' );
include( get_template_directory() . '/widgets.php' );

add_action( 'themecheck_checks_loaded', 'theme_disable_cheks' );
function theme_disable_cheks() {
	$disabled_checks = array( 'TagCheck', 'Plugin_Territory', 'CustomCheck', 'EditorStyleCheck' );
	global $themechecks;
	foreach ( $themechecks as $key => $check ) {
		if ( is_object( $check ) && in_array( get_class( $check ), $disabled_checks ) ) {
			unset( $themechecks[$key] );
		}
	}
}

add_theme_support( 'automatic-feed-links' );

if ( !isset( $content_width ) ) {
	$content_width = 900;
}

remove_action( 'wp_head', 'wp_generator' );

add_action( 'after_setup_theme', 'theme_localization' );
function theme_localization () {
	load_theme_textdomain( 'medservice24', get_template_directory() . '/languages' );
}

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );

function theme_widget_init() {
	register_sidebar( array(
		'id'            => 'default-sidebar',
		'name'          => __( 'Default Sidebar', 'medservice24' ),
		'before_widget' => '<div class="widget %2$s" id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	) );
	register_sidebar( array(
		'id'            => 'sidebar-subscribe-home',
		'name'          => __( 'Sidebar Subscribe Home', 'medservice24' ),
		'before_widget' => '<section class="subscribe-home"><div class="container">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 style="display:none;">',
		'after_title'   => '</h3>'
	) );
	register_sidebar( array(
		'id'            => 'sidebar-polls-home',
		'name'          => __( 'Sidebar Polls Home', 'medservice24' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	) );
}
add_action( 'widgets_init', 'theme_widget_init' );

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 50, 50, true ); // Normal post thumbnails
add_image_size( 'thumbnail_400x9999', 400, 9999, true );
add_image_size( 'thumbnail_230x115', 230, 115, true );
add_image_size( 'thumbnail_201x154', 201, 154, true );
add_image_size( 'thumbnail_1170x130', 1170, 130, true );
add_image_size( 'thumbnail_85x85', 85, 85, true );

register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'medservice24' ),
) );

//Add [email]...[/email] shortcode
function shortcode_email( $atts, $content ) {
	return antispambot( $content );
}
add_shortcode( 'email', 'shortcode_email' );

//Register tag [template-url]
function filter_template_url( $text ) {
	return str_replace( '[template-url]', get_template_directory_uri(), $text );
}
add_filter( 'the_content', 'filter_template_url' );
add_filter( 'widget_text', 'filter_template_url' );

//Register tag [site-url]
function filter_site_url( $text ) {
	return str_replace( '[site-url]', home_url(), $text );
}
add_filter( 'the_content', 'filter_site_url' );
add_filter( 'widget_text', 'filter_site_url' );

if( class_exists( 'acf' ) && !is_admin() ) {
	add_filter( 'acf/load_value', 'filter_template_url' );
	add_filter( 'acf/load_value', 'filter_site_url' );
}

//Replace standard wp menu classes
function change_menu_classes( $css_classes ) {
	return str_replace( array( 'current-menu-item', 'current-menu-parent', 'current-menu-ancestor' ), 'active', $css_classes );
}
add_filter( 'nav_menu_css_class', 'change_menu_classes' );

//Allow tags in category description
$filters = array( 'pre_term_description', 'pre_link_description', 'pre_link_notes', 'pre_user_description' );
foreach ( $filters as $filter ) {
	remove_filter( $filter, 'wp_filter_kses' );
}

function clean_phone( $phone ){
    return preg_replace( '/[^0-9]/', '', $phone );
}

//Make wp admin menu html valid
function wp_admin_bar_valid_search_menu( $wp_admin_bar ) {
	if ( is_admin() )
		return;

	$form  = '<form action="' . esc_url( home_url( '/' ) ) . '" method="get" id="adminbarsearch"><div>';
	$form .= '<input class="adminbar-input" name="s" id="adminbar-search" tabindex="10" type="text" value="" maxlength="150" />';
	$form .= '<input type="submit" class="adminbar-button" value="' . __( 'Search', 'medservice24' ) . '"/>';
	$form .= '</div></form>';

	$wp_admin_bar->add_menu( array(
		'parent' => 'top-secondary',
		'id'     => 'search',
		'title'  => $form,
		'meta'   => array(
			'class'    => 'admin-bar-search',
			'tabindex' => -1,
		)
	) );
}

function fix_admin_menu_search() {
	remove_action( 'admin_bar_menu', 'wp_admin_bar_search_menu', 4 );
	add_action( 'admin_bar_menu', 'wp_admin_bar_valid_search_menu', 4 );
}
add_action( 'add_admin_bar_menus', 'fix_admin_menu_search' );

//Disable comments on pages by default
function theme_page_comment_status( $post_ID, $post, $update ) {
	if ( !$update ) {
		remove_action( 'save_post_page', 'theme_page_comment_status', 10 );
		wp_update_post( array(
			'ID' => $post->ID,
			'comment_status' => 'closed',
		) );
		add_action( 'save_post_page', 'theme_page_comment_status', 10, 3 );
	}
}
add_action( 'save_post_page', 'theme_page_comment_status', 10, 3 );

//custom excerpt
function theme_the_excerpt() {
	global $post;
	
	if ( trim( $post->post_excerpt ) ) {
		the_excerpt();
	} elseif ( strpos( $post->post_content, '<!--more-->' ) !== false ) {
		the_content();
	} else {
		the_excerpt();
	}
}

//theme password form
function theme_get_the_password_form() {
	global $post;
	$post = get_post( $post );
	$label = 'pwbox-' . ( empty($post->ID) ? rand() : $post->ID );
	$output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">
	<p>' . __( 'This content is password protected. To view it please enter your password below:', 'medservice24' ) . '</p>
	<p><label for="' . $label . '">' . __( 'Password:', 'medservice24' ) . '</label> <input name="post_password" id="' . $label . '" type="password" size="20" /> <input type="submit" name="Submit" value="' . esc_attr__( 'Submit', 'medservice24' ) . '" /></p></form>
	';
	return $output;
}
add_filter( 'the_password_form', 'theme_get_the_password_form' );

function base_scripts_styles() {
	$in_footer = true;
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	wp_deregister_script( 'comment-reply' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		
	}

	// Loads JavaScript file with functionality specific.
	wp_enqueue_script( 'base-script', get_template_directory_uri() . '/js/jquery.main.js', array( 'jquery' ), '', $in_footer );
	wp_enqueue_script( 'library-common-script', get_template_directory_uri() . '/js/library/slick.min.js', '', '', $in_footer );
	wp_enqueue_script( 'common-script', get_template_directory_uri() . '/js/common.js', '', '', $in_footer );
	
	// Loads our main stylesheet.
	wp_enqueue_style( 'base-style', get_stylesheet_uri(), array() );
	
	// Implementation stylesheet.
	wp_enqueue_style( 'base-theme', get_template_directory_uri() . '/css/styles.css', array() );	

	// Loads the Internet Explorer specific stylesheet.
	//wp_enqueue_style( 'base-ie', get_template_directory_uri() . '/css/ie.css' );
	wp_style_add_data( 'base-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'base_scripts_styles' );

add_action( 'admin_init', 'basetheme_options_capability' );
function basetheme_options_capability(){
	$role = get_role( 'administrator' );
	$role->add_cap( 'theme_options_view' );
}

//theme options tab in appearance
if( function_exists( 'acf_add_options_sub_page' ) && current_user_can( 'theme_options_view' ) ) {
	acf_add_options_sub_page( array(
		'title'  => 'Theme Options',
		'parent' => 'themes.php',
	) );
}

//acf theme functions placeholders
if( !class_exists( 'acf' ) && !is_admin() ) {
	function get_field_reference( $field_name, $post_id ) { return ''; }
	function get_field_objects( $post_id = false, $options = array() ) { return false; }
	function get_fields( $post_id = false ) { return false; }
	function get_field( $field_key, $post_id = false, $format_value = true )  { return false; }
	function get_field_object( $field_key, $post_id = false, $options = array() ) { return false; }
	function the_field( $field_name, $post_id = false ) {}
	function have_rows( $field_name, $post_id = false ) { return false; }
	function the_row() {}
	function reset_rows( $hard_reset = false ) {}
	function has_sub_field( $field_name, $post_id = false ) { return false; }
	function get_sub_field( $field_name ) { return false; }
	function the_sub_field( $field_name ) {}
	function get_sub_field_object( $child_name ) { return false;}
	function acf_get_child_field_from_parent_field( $child_name, $parent ) { return false; }
	function register_field_group( $array ) {}
	function get_row_layout() { return false; }
	function acf_form_head() {}
	function acf_form( $options = array() ) {}
	function update_field( $field_key, $value, $post_id = false ) { return false; }
	function delete_field( $field_name, $post_id ) {}
	function create_field( $field ) {}
	function reset_the_repeater_field() {}
	function the_repeater_field( $field_name, $post_id = false ) { return false; }
	function the_flexible_field( $field_name, $post_id = false ) { return false; }
	function acf_filter_post_id( $post_id ) { return $post_id; }
}

function custom_post_health_facility() {
    $labels = array(
        'name'               => _x( 'Медучреждение', 'post type general name' ),
        'singular_name'      => _x( 'Медучреждение', 'post type singular name' ),
        'add_new'            => _x( 'Add new', 'Медучреждение' ),
        'add_new_item'       => __( 'Add new Медучреждение' ),
        'edit_item'          => __( 'Edit Медучреждение' ),
        'new_item'           => __( 'New Медучреждение' ),
        'all_items'          => __( 'All Медучреждение' ),
        'view_item'          => __( 'Review Медучреждение' ),
        'search_items'       => __( 'Search Медучреждение' ),
        'not_found'          => __( 'Медучреждение not Found' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Медучреждение'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Contains Медучреждение',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'comments' ),
        'has_archive'   => true,
    );
	register_post_type( 'health_facility', $args );  
}
add_action( 'init', 'custom_post_health_facility' );

function custom_post_pharmacy() {
    $labels = array(
        'name'               => _x( 'Аптека', 'post type general name' ),
        'singular_name'      => _x( 'Аптека', 'post type singular name' ),
        'add_new'            => _x( 'Add new', 'Аптека' ),
        'add_new_item'       => __( 'Add new Аптека' ),
        'edit_item'          => __( 'Edit Аптека' ),
        'new_item'           => __( 'New Аптека' ),
        'all_items'          => __( 'All Аптеки' ),
        'view_item'          => __( 'Review Аптека' ),
        'search_items'       => __( 'Search Аптека' ),
        'not_found'          => __( 'Аптека not Found' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Аптеки'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Contains Аптека',
        'public'        => true,
        'menu_position' => 6,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'comments' ),
        'has_archive'   => true,
    );
    register_post_type( 'pharmacy', $args );    
}
add_action( 'init', 'custom_post_pharmacy' );

function custom_post_doctor() {
    $labels = array(
        'name'               => _x( 'Врач', 'post type general name' ),
        'singular_name'      => _x( 'Врач', 'post type singular name' ),
        'add_new'            => _x( 'Add new', 'Врач' ),
        'add_new_item'       => __( 'Add new Врач' ),
        'edit_item'          => __( 'Edit Врач' ),
        'new_item'           => __( 'New Врач' ),
        'all_items'          => __( 'All Врачи' ),
        'view_item'          => __( 'Review Врач' ),
        'search_items'       => __( 'Search Врача' ),
        'not_found'          => __( 'Врача not Found' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Врачи'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Contains Врач',
        'public'        => true,
        'menu_position' => 7,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'comments' ),
        'has_archive'   => true,
    );
    register_post_type( 'doctor', $args );  
	$labels1 = array(
		'name' => _x( 'Расположение', 'taxonomy general name' ),
		'singular_name' => _x( 'Расположение', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Расположение' ),
		'all_items' => __( 'All Расположения' ),
		'parent_item' => __( 'Parent Расположение' ),
		'parent_item_colon' => __( 'Parent Расположение:' ),
		'edit_item' => __( 'Edit Расположение' ), 
		'update_item' => __( 'Update Расположение' ),
		'add_new_item' => __( 'Add New Расположение' ),
		'new_item_name' => __( 'New Расположение Name' ),
		'menu_name' => __( 'Расположение' ),
	);  

	register_taxonomy('location_geo',array('health_facility', 'pharmacy', 'doctor'), array(
		'hierarchical' => true,
		'labels' => $labels1,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'location_geo' ),
	));	
}
add_action( 'init', 'custom_post_doctor' );

function custom_post_shares() {
    $labels = array(
        'name'               => _x( 'Акции', 'post type general name' ),
        'singular_name'      => _x( 'Акции', 'post type singular name' ),
        'add_new'            => _x( 'Add new', 'Акции' ),
        'add_new_item'       => __( 'Add new Акции' ),
        'edit_item'          => __( 'Edit Акции' ),
        'new_item'           => __( 'New Акции' ),
        'all_items'          => __( 'All Акции' ),
        'view_item'          => __( 'Review Акции' ),
        'search_items'       => __( 'Search Акции' ),
        'not_found'          => __( 'Акции not Found' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Акции'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Contains Акции',
        'public'        => true,
        'menu_position' => 7,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt' ),
        'has_archive'   => true,
    );
    register_post_type( 'shares', $args );    
}
add_action( 'init', 'custom_post_shares' );

function custom_post_obyavlenia() {
    $labels = array(
        'name'               => _x( 'Объявления', 'post type general name' ),
        'singular_name'      => _x( 'Объявления', 'post type singular name' ),
        'add_new'            => _x( 'Add new', 'Объявления' ),
        'add_new_item'       => __( 'Add new Объявления' ),
        'edit_item'          => __( 'Edit Объявления' ),
        'new_item'           => __( 'New Объявления' ),
        'all_items'          => __( 'All Объявления' ),
        'view_item'          => __( 'Review Объявления' ),
        'search_items'       => __( 'Search Объявления' ),
        'not_found'          => __( 'Объявления not Found' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Объявления'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Contains Объявления',
        'public'        => true,
        'menu_position' => 8,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt' ),
        'has_archive'   => true,
    );
    register_post_type( 'obyavlenia', $args );    
}
add_action( 'init', 'custom_post_obyavlenia' );

// Custom Filter Header Location
function geo_location_ip() {
	$ip = $_SERVER['REMOTE_ADDR'];
	//$ip = '109.108.242.18'; //- Vinnytsya
	//$ip = '85.90.209.211'; //- Poltava 
	//$ip = '31.135.128.0'; //- Сумы 
	//$ip = '85.90.206.255'; //- Харьков
	//$ip = '91.213.94.255'; //- Богодуховs
	$is_bot = preg_match(
		"~(Google|Yahoo|Rambler|Bot|Yandex|Spider|Snoopy|Crawler|Finder|Mail|curl)~i", $_SERVER['HTTP_USER_AGENT']
	);
	$geo_info_ip = !$is_bot ? json_decode(file_get_contents('http://api.sypexgeo.net/json/'.$ip.''), true) : [];
	return $geo_info_ip;
}

function get_taxonomy_hierarchy( $taxonomy, $parent = 0 ) {
  // only 1 taxonomy
  $taxonomy = is_array( $taxonomy ) ? array_shift( $taxonomy ) : $taxonomy;
  // get all direct decendents of the $parent
  $terms = get_terms( $taxonomy, array( 'parent' => $parent ) );
  // prepare a new array.  these are the children of $parent
  // we'll ultimately copy all the $terms into this new array, but only after they
  // find their own children
  $children = array();
  // go through all the direct decendents of $parent, and gather their children
  foreach ( $terms as $term ){
    // recurse to get the direct decendents of "this" term
    $term->children = get_taxonomy_hierarchy( $taxonomy, $term->term_id );
    // add the term to our new array
    $children[ $term->term_id ] = $term;
  }
  // send the results back to the caller
  return $children;
}

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}

function filter_location_tax($children) {
	session_start();

	if(!empty($_SESSION['geo_term_region'])){
		$geo_term_region = $_SESSION['geo_term_region'];
	}else{
		$geo_info_ip = geo_location_ip();
	}

	$custom_tax = get_taxonomy_hierarchy( 'location_geo' );	?>
	<div class="select-holder">
		<script type="text/javascript">
			jQuery( document ).ready(function() {
				taxonomyOfLocation();
			});
			function taxonomyOfLocation(){
				var page = jQuery('#taxonomy_location').val();
					jQuery.ajax({
						type: "POST",
						url: "<?php echo home_url(); ?>/wp-content/themes/medservice24/ajax/tax_filter_geo/ajax_filter_location_tax.php",
						data: {tax_id: page},
						success: function(data) {
							jQuery('#ajax-select-filter-geo').html(data);	
						}
					});
					jQuery.ajax({
						type: "POST",
						url: "<?php echo home_url(); ?>/wp-content/themes/medservice24/ajax/tax_filter_geo/ajax_filter_health_facility_doctor.php",
						data: {tax_id: page},
						success: function (data) {
							jQuery('#health-facility-doctor').html(data);
							
							}
					});
			};
		</script>
		<i class="fa fa-map-marker" aria-hidden="true"></i>
		<select name="taxonomy_location" id="taxonomy_location" onchange="taxonomyOfLocation();">
			<?php 
				echo '<option value="0">Область</option>';
				
				if($geo_info_ip['region']['name_ru'] == 'Киев'){
					foreach($custom_tax as $location){
						$select = '';
						if($location->name == 'Киевская область' ){
							$select = 'selected="selected"';
						}
						echo '<option '. $select .' value="'.$location->term_id.'">'.$location->name.'</option>';
					}
				}elseif(!empty($_SESSION['geo_term_region'])){
					foreach($custom_tax as $location){
						$select = '';
						if($location->term_id == $geo_term_region ){
							$select = 'selected="selected"';
						}
						echo '<option '. $select .' value="'.$location->term_id.'">'.$location->name.'</option>';
					}
				}else{
					foreach($custom_tax as $location){
						$select = '';
						if($location->name == $geo_info_ip['region']['name_ru'] ){
							$select = 'selected="selected"';
						}
						echo '<option '. $select .' value="'.$location->term_id.'">'.$location->name.'</option>';
					}
				}
			?>
		</select>
	</div>
	<div class="select-holder">
		<div id="ajax-select-filter-geo">
			<select id="" name="" onchange="">
				<option value=""><?php _e( 'Город', 'medservice24' ); ?></option>
			</select>
		</div>
	</div>
<?php }
