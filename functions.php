<?php
/**
 * Theme Functions
 */
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

function add_theme_scripts()
{
	wp_enqueue_style('style-css', get_stylesheet_directory_uri().'/style.css');
	wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri() . '/assets/library/css/bootstrap.min.css', [], false, 'all');
 	wp_enqueue_style('slick-css', get_stylesheet_directory_uri() . '/assets/library/css/slick.css', [], false, 'all');
 	wp_enqueue_style('font-awesome-css', get_stylesheet_directory_uri() . '/assets/library/css/font-awesome-5-pro.css', [], false, 'all');
    wp_enqueue_style('fancybox-css', get_stylesheet_directory_uri() . '/assets/library/css/fancybox.css', [], false, 'all');
    wp_enqueue_style('home-style', get_stylesheet_directory_uri() . '/assets/css/home.css', [], false, 'all');

	wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri(). '/assets/library/js/bootstrap.min.js', ['jquery'], false);
 	wp_enqueue_script('slick-js', get_stylesheet_directory_uri(). '/assets/library/js/slick.min.js', ['jquery'], false);
    wp_enqueue_script('fancybox-js', get_stylesheet_directory_uri(). '/assets/library/js/fancybox.umd.js', ['jquery'], false);
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');


function setup_theme()
{
    add_theme_support('title-tag');

    // add custom logo
    add_theme_support(
        'custom-logo',
        [
            'header-text' => [
                'site-title',
                'site-description',
            ],
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
        ]
    );

    add_theme_support('post-thumbnails');
}
// add logo image
add_action('after_setup_theme', 'setup_theme');

function theme_customize_register( $wp_customize ) {
    //All our sections, settings, and controls will be added here

    $wp_customize->add_section( 'another_theme_section' , array(
        'title'      => __( 'My Site Logo', 'custom-theme' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'another_logo_image' );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'custom_another_logo',
            array(
                'priority'   => 9,
                'label'      => __( 'Another a logo', 'custom-theme' ),
                'settings'   => 'another_logo_image',
                'section'    => 'title_tagline' 
                // add this setting to "Site Identity";
                // add this setting to "Another Section" = Custom section;
                // 'section'    => 'another_theme_section'
            )
        )
    );
}
// add another logo image
add_action('customize_register', 'theme_customize_register');



// Add option setting page
add_action('acf/init', 'news_events_afc_op_init');
function news_events_afc_op_init()
{
	// Check function exists.
	if (function_exists('acf_add_options_page')) {
		// Register options page.
		$option_page = acf_add_options_page(array(
			'page_title'    => __('Theme Settings'),
			'menu_title'    => __('Theme Settings'),
			'menu_slug'     => 'theme-setting-page',
			'capability'    => 'manage_options',
			'redirect'      => false
		));
	}
}


?>


