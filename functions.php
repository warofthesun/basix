<?php

// LOAD starter CORE (if you remove this, the theme will break)
require_once( 'library/starter.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH starter
Let's get everything up and running.
*********************/

function starter_ahoy() {

  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'treystheme', get_template_directory() . '/library/translation' );

  // launching operation cleanup
  add_action( 'init', 'starter_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'starter_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'starter_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'starter_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'starter_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'starter_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  starter_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'starter_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'starter_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'starter_excerpt_more' );

} /* end starter ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'starter_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'starter-thumb-600', 600, 150, true );
add_image_size( 'starter-thumb-300', 300, 100, true );
add_image_size( 'gallery-image', 680, 450, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'starter-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'starter-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'starter_custom_image_sizes' );

function starter_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'gallery-image' => __('Gallery Image'),
        'starter-thumb-600' => __('600px by 150px'),
        'starter-thumb-300' => __('300px by 100px'),
    ) );
}



/************* THEME CUSTOMIZE *********************/

/*
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722

  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162

  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function starter_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');

  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'starter_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function starter_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'treystheme' ),
		'description' => __( 'The first (primary) sidebar.', 'treystheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'treystheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'treystheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/*
Theme Fonts
*/
function starter_fonts() {
  wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Cutive+Mono|IBM+Plex+Mono:300,400,700|IBM+Plex+Sans:300,400,500,700');
}

add_action('wp_enqueue_scripts', 'starter_fonts');

/* Remove 'Category & Month' from title on Archive page */

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_archive() ) {

            $title = single_month_title( ' ', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }



    return $title;

});

/**
 * Removes P tags from around images and iframes
 * Original source: https://interconnectit.com/blog/2011/06/16/how-to-remove-p-tags-from-images-in-wordpress/
 * @param  [type] $pee [description]
 * @return [type]      [description]
 */
function img_unautop($pee) {
    // commented out example shows how you can wrap your IMG tag in a div if you like
     /* $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<div class="figure">$1</div>', $pee); */
     //strip P tag and just return the image
     $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '$1', $pee);
     //strip P tag and just return the iFrame
     $pee = preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $pee);
     return $pee;
 }
 add_filter( 'acf_the_content', 'img_unautop', 30 ); //only use this one if you have ACF content
 add_filter( 'the_content', 'img_unautop', 30 ); //regular content for POSTS and PAGES



/* DON'T DELETE THIS CLOSING TAG */ ?>
