<?php
/**
 * Bootstraps the Theme
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;
use WP_Customize_Image_Control;

class AQUILA_THEME {
    use Singleton;

    protected function __construct()
    {
        // load class
        Assets::get_instance();
        Menus::get_instance();

        $this->setup_hooks();
    }

    //action and filter
    protected function setup_hooks(){

        // add logo image
        add_action('after_setup_theme', [ $this, 'setup_theme' ]);

        // add another logo image
        add_action( 'customize_register', [ $this, 'theme_customize_register' ]);
    }

    public function setup_theme()
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

    function theme_customize_register( $wp_customize ) {
        //All our sections, settings, and controls will be added here

        $wp_customize->add_section( 'another_theme_section' , array(
            'title'      => __( 'My Site Logo', 'aquila' ),
            'priority'   => 30,
        ) );

        $wp_customize->add_setting( 'another_logo_image' );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'custom_another_logo',
                array(
                    'priority'   => 9,
                    'label'      => __( 'Another a logo', 'aquila' ),
                    'settings'   => 'another_logo_image',
                    'section'    => 'title_tagline' // add this setting to "Site Identity";
                    // add this setting to "Another Section" = Custom section;
                    // 'section'    => 'another_theme_section'
                )
            )
        );
    }
}