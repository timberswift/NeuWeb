<?php 
/**
 * Play School functions and definitions
 *
 * @package Play School
 */
 
 global $content_width;
 if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */ 

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'play_school_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
 
function play_school_setup() {
	load_theme_textdomain( 'play-school', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 250,
		'flex-height' => true,
	) );	
 
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'play-school' ),		
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // play_school_setup

add_action( 'after_setup_theme', 'play_school_setup' );

function play_school_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'play-school' ),
		'description'   => esc_html__( 'Appears on blog page sidebar', 'play-school' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Header Right Widget', 'play-school' ),
		'description'   => esc_html__( 'Appears on top of the header', 'play-school' ),
		'id'            => 'header-right-widget',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title" style="display:none">',
		'after_title'   => '</h3>',
		'after_widget'  => '',
	) );		
	
}
add_action( 'widgets_init', 'play_school_widgets_init' );


function play_school_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Roboto Condensed, trsnalate this to off, do not
		* translate into your own language.
		*/
		$robotocondensed = _x('on','robotocondensed:on or off','play-school');		
		
		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/
		$scada = _x('on','Scada:on or off','play-school');	
		$lato = _x('on','Lato:on or off','play-school');	
		
		if('off' !== $robotocondensed ){
			$font_family = array();
			
			if('off' !== $robotocondensed){
				$font_family[] = 'Roboto Condensed:300,400,600,700,800,900';
			}
			
			if('off' !== $lato){
				$font_family[] = 'Lato:100,100i,300,300i,400,400i,700,700i,900,900i';
			}			
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function play_school_scripts() {
	wp_enqueue_style('play-school-font', play_school_font_url(), array());
	wp_enqueue_style( 'play-school-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'play-school-editor-style', get_template_directory_uri()."/editor-style.css" );
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'play-school-main-style', get_template_directory_uri()."/css/responsive.css" );		
	wp_enqueue_style( 'play-school-base-style', get_template_directory_uri()."/css/style_base.css" );
	wp_enqueue_script( 'jquery-nivo', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'play-school-custom-js', get_template_directory_uri() . '/js/custom.js' );	
		

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'play_school_scripts' );

define('SKTTHEMES_URL','https://www.sktthemes.net','play-school');
define('SKTTHEMES_PRO_THEME_URL','https://www.sktthemes.net/shop/education-wordpress-theme/','play-school');
define('SKTTHEMES_FREE_THEME_URL','https://www.sktthemes.net/shop/free-education-wordpress-theme/','play-school');
define('SKTTHEMES_THEME_DOC','http://sktthemesdemo.net/documentation/playschool-documentation/','play-school');
define('SKTTHEMES_LIVE_DEMO','http://sktthemesdemo.net/school/','play-school');
define('SKTTHEMES_THEMES','https://www.sktthemes.net/themes/','play-school');

function play_school_new_excerpt_length($length) {
    return 50;
}
add_filter('excerpt_length', 'play_school_new_excerpt_length');

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

// get slug by id
function play_school_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}

if ( ! function_exists( 'play_school_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function play_school_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

require_once get_template_directory() . '/customize-pro/example-1/class-customize.php';

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function play_school_custom_excerpt_length( $excerpt_length ) {
    return 35;
}
add_filter( 'excerpt_length', 'play_school_custom_excerpt_length', 999 );