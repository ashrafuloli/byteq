<?php
/**
 * Byteq customizer
 *
 * @package byteq
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


/**
 * Added Panels & Sections
 */
function byteq_customizer_panels_sections($wp_customize)
{

    //Add panel
    $wp_customize->add_panel('byteq_customizer', array(
        'priority' => 10,
        'title' => esc_html__('Byteq Customizer', 'byteq'),
    ));


    /**
     * Customizer Section
     */

    $wp_customize->add_section('section_header_logo', array(
        'title' => esc_html__('Header Setting', 'byteq'),
        'description' => '',
        'priority' => 12,
        'capability' => 'edit_theme_options',
        'panel' => 'byteq_customizer',
    ));

//	$wp_customize->add_section('blog_setting', array(
//        'title'       => esc_html__( 'Blog Setting', 'byteq' ),
//        'description' => '',
//        'priority'    => 13,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'byteq_customizer',
//    ));
//
//    $wp_customize->add_section('header_side_setting', array(
//        'title'       => esc_html__( 'Side Info', 'byteq' ),
//        'description' => '',
//        'priority'    => 14,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'byteq_customizer',
//    ));

//    $wp_customize->add_section('breadcrumb_setting', array(
//        'title'       => esc_html__( 'Breadcrumb Setting', 'byteq' ),
//        'description' => '',
//        'priority'    => 15,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'byteq_customizer',
//    ));

//    $wp_customize->add_section('blog_setting', array(
//        'title'       => esc_html__( 'Blog Setting', 'byteq' ),
//        'description' => '',
//        'priority'    => 16,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'byteq_customizer',
//    ));

    $wp_customize->add_section('footer_social', array(
        'title' => esc_html__('Footer Social', 'byteq'),
        'description' => '',
        'priority' => 15,
        'capability' => 'edit_theme_options',
        'panel' => 'byteq_customizer',
    ));

    $wp_customize->add_section('footer_setting', array(
        'title' => esc_html__('Footer Settings', 'byteq'),
        'description' => '',
        'priority' => 16,
        'capability' => 'edit_theme_options',
        'panel' => 'byteq_customizer',
    ));

//    $wp_customize->add_section('color_setting', array(
//        'title'       => esc_html__( 'Color Setting', 'byteq' ),
//        'description' => '',
//        'priority'    => 17,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'byteq_customizer',
//    ));
//
//    $wp_customize->add_section('404_page', array(
//        'title'       => esc_html__( '404 Page', 'byteq' ),
//        'description' => '',
//        'priority'    => 18,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'byteq_customizer',
//    ));
//
//    $wp_customize->add_section('rtl_setting', array(
//        'title'       => esc_html__( 'RTL Setting', 'byteq' ),
//        'description' => '',
//        'priority'    => 18,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'byteq_customizer',
//    ));

}

add_action('customize_register', 'byteq_customizer_panels_sections');


/*
Footer Social
 */
function _footer_social_fields($fields)
{
    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_fb_url',
        'label' => esc_html__('Facebook Url', 'byteq'),
        'section' => 'footer_social',
        'default' => esc_html__('#', 'byteq'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_twitter_url',
        'label' => esc_html__('Twitter Url', 'byteq'),
        'section' => 'footer_social',
        'default' => esc_html__('#', 'byteq'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_linkedin_url',
        'label' => esc_html__('Linkedin Url', 'byteq'),
        'section' => 'footer_social',
        'default' => esc_html__('#', 'byteq'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_youtube_url',
        'label' => esc_html__('Youtube Url', 'byteq'),
        'section' => 'footer_social',
        'default' => esc_html__('#', 'byteq'),
        'priority' => 10,
    );

    return $fields;
}

add_filter('kirki/fields', '_footer_social_fields');

/*
Header Settings
 */
function _header_header_fields($fields)
{

    $fields[] = array(
        'type' => 'image',
        'settings' => 'logo',
        'label' => esc_html__('Header Logo', 'byteq'),
        'description' => esc_html__('Upload Your Logo.', 'byteq'),
        'section' => 'section_header_logo',
        'default' => get_template_directory_uri() . '/assets/img/logo/logo.svg'
    );

    $fields[] = array(
        'type' => 'image',
        'settings' => 'secondary_logo',
        'label' => esc_html__('Header Second Logo', 'byteq'),
        'description' => esc_html__('Header Black Logo', 'byteq'),
        'section' => 'section_header_logo',
        'default' => get_template_directory_uri() . '/assets/img/logo/logo.svg'
    );

    $fields[] = array(
        'type' => 'image',
        'settings' => 'favicon_url',
        'label' => esc_html__('Favicon', 'byteq'),
        'description' => esc_html__('Favicon Icon', 'byteq'),
        'section' => 'section_header_logo',
        'default' => get_template_directory_uri() . '/assets/img/logo/favicon.svg'
    );


    $fields[] = array(
        'type' => 'switch',
        'settings' => 'byteq_header_button',
        'label' => esc_html__('Header Button On/Off', 'byteq'),
        'section' => 'section_header_logo',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'byteq'),
            'off' => esc_html__('Disable', 'byteq'),
        ],
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_header_button_text',
        'label' => esc_html__('Button Text', 'byteq'),
        'section' => 'section_header_logo',
        'default' => 'Let’s chat',
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_header_button_link',
        'label' => esc_html__('Button Link', 'byteq'),
        'section' => 'section_header_logo',
        'default' => '#',
        'priority' => 10,
    );

    return $fields;
}

add_filter('kirki/fields', '_header_header_fields');

/*
Header Side Info
 */
function _header_side_fields($fields)
{
    // side info settings
    $fields[] = array(
        'type' => 'switch',
        'settings' => 'byteq_hamburger_hide',
        'label' => esc_html__('Show Hamburger On/Off', 'byteq'),
        'section' => 'header_side_setting',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'byteq'),
            'off' => esc_html__('Disable', 'byteq'),
        ],
    );
    $fields[] = array(
        'type' => 'image',
        'settings' => 'byteq_extra_info_logo',
        'label' => esc_html__('Logo Side', 'byteq'),
        'description' => esc_html__('Logo Side', 'byteq'),
        'section' => 'header_side_setting',
        'default' => get_template_directory_uri() . '/assets/img/logo/logo-white.png'
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_extra_about_title',
        'label' => esc_html__('About Us Title', 'byteq'),
        'section' => 'header_side_setting',
        'default' => esc_html__('About Us Title', 'byteq'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'textarea',
        'settings' => 'byteq_extra_about_text',
        'label' => esc_html__('About Us Desc..', 'byteq'),
        'section' => 'header_side_setting',
        'default' => esc_html__('About Us Desc...', 'byteq'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_extra_button',
        'label' => esc_html__('Button Text', 'byteq'),
        'section' => 'header_side_setting',
        'default' => esc_html__('Contact Us', 'byteq'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_extra_button_url',
        'label' => esc_html__('Button URL', 'byteq'),
        'section' => 'header_side_setting',
        'default' => esc_html__('#', 'byteq'),
        'priority' => 10,
    );
    // contact
    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_contact_title',
        'label' => esc_html__('Contact Title', 'byteq'),
        'section' => 'header_side_setting',
        'default' => esc_html__('Contact Title', 'byteq'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_extra_address',
        'label' => esc_html__('Office Address', 'byteq'),
        'section' => 'header_side_setting',
        'default' => esc_html__('123/A, Miranda City Likaoli Prikano, Dope United States', 'byteq'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_extra_phone',
        'label' => esc_html__('Phone Number', 'byteq'),
        'section' => 'header_side_setting',
        'default' => esc_html__('+0989 7876 9865 9', 'byteq'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_extra_email',
        'label' => esc_html__('Email ID', 'byteq'),
        'section' => 'header_side_setting',
        'default' => esc_html__('info@basictheme.net', 'byteq'),
        'priority' => 10,
    );

    return $fields;
}

add_filter('kirki/fields', '_header_side_fields');

/*
_header_page_title_fields
 */
function _header_page_title_fields($fields)
{
    // Breadcrumb Setting
    $fields[] = array(
        'type' => 'image',
        'settings' => 'breadcrumb_bg_img',
        'label' => esc_html__('Breadcrumb Background Image', 'byteq'),
        'description' => esc_html__('Breadcrumb Background Image', 'byteq'),
        'section' => 'breadcrumb_setting',
        'default' => get_template_directory_uri() . '/assets/img/bg/page-title-bg.jpg'
    );

    return $fields;
}

add_filter('kirki/fields', '_header_page_title_fields');

/*
Header Social
 */
function _header_blog_fields($fields)
{
// Blog Setting
    $fields[] = array(
        'type' => 'switch',
        'settings' => 'byteq_blog_btn_switch',
        'label' => esc_html__('Blog BTN On/Off', 'byteq'),
        'section' => 'blog_setting',
        'default' => '1',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'byteq'),
            'off' => esc_html__('Disable', 'byteq'),
        ],
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_blog_btn',
        'label' => esc_html__('Blog Button text', 'byteq'),
        'section' => 'blog_setting',
        'default' => esc_html__('Read More', 'byteq'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_blog_btn_rtl',
        'label' => esc_html__('Blog Button text rtl', 'byteq'),
        'section' => 'blog_setting',
        'default' => esc_html__('Read More', 'byteq'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label' => esc_html__('Blog Title', 'byteq'),
        'section' => 'blog_setting',
        'default' => esc_html__('Blog', 'byteq'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label' => esc_html__('Blog Details Title', 'byteq'),
        'section' => 'blog_setting',
        'default' => esc_html__('Blog Details', 'byteq'),
        'priority' => 10,
    );

    return $fields;
}

add_filter('kirki/fields', '_header_blog_fields');

/*
Footer
 */
function _header_footer_fields($fields)
{
    $fields[] = array(
        'type' => 'image',
        'settings' => 'byteq_footer_logo',
        'label' => esc_html__('Footer Logo', 'byteq'),
        'description' => esc_html__('Upload Your Logo.', 'byteq'),
        'section' => 'footer_setting',
        'default' => get_template_directory_uri() . '/assets/img/logo/logo.svg'
    );

    $fields[] = array(
        'type' => 'textarea',
        'settings' => 'byteq_footer_about_text',
        'label' => esc_html__('About Text', 'byteq'),
        'section' => 'footer_setting',
        'default' => esc_html__('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.', 'byteq'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_footer_contact_text',
        'label' => esc_html__('Contact Text', 'byteq'),
        'section' => 'footer_setting',
        'default' => esc_html__('Contacts', 'byteq'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_footer_phone',
        'label' => esc_html__('Phone Number', 'byteq'),
        'section' => 'footer_setting',
        'default' => esc_html__('+880-1676-554901', 'byteq'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_footer_menu_title_1',
        'label' => esc_html__('Menu Title 1', 'byteq'),
        'section' => 'footer_setting',
        'default' => esc_html__('Services', 'byteq'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_footer_menu_title_2',
        'label' => esc_html__('Company', 'byteq'),
        'section' => 'footer_setting',
        'default' => esc_html__('Company', 'byteq'),
        'priority' => 10,
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'footer_social_heading',
        'label' => esc_html__('Social Title', 'byteq'),
        'section' => 'footer_setting',
        'default' => esc_html__('Find Us On', 'byteq'),
        'priority' => 10,
    );

    return $fields;
}

add_filter('kirki/fields', '_header_footer_fields');

// color
function byteq_color_fields($fields)
{
    // Color Settings
    $fields[] = array(
        'type' => 'color',
        'settings' => 'byteq_color_option',
        'label' => __('Theme Color', 'byteq'),
        'description' => esc_html__('This is a Theme color control.', 'byteq'),
        'section' => 'color_setting',
        'default' => '#ff5e14',
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'byteq_header_bg_color',
        'label' => __('THeader BG Color', 'byteq'),
        'description' => esc_html__('This is a Header bg color control.', 'byteq'),
        'section' => 'color_setting',
        'default' => '#00235A',
        'priority' => 10,
    );

    return $fields;
}

add_filter('kirki/fields', 'byteq_color_fields');

// 404 
function byteq_404_fields($fields)
{
    // 404 settings
    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_error_404_text',
        'label' => esc_html__('400 Text', 'byteq'),
        'section' => '404_page',
        'default' => esc_html__('404', 'byteq'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_error_title',
        'label' => esc_html__('Not Found Title', 'byteq'),
        'section' => '404_page',
        'default' => esc_html__('Page not found', 'byteq'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'textarea',
        'settings' => 'byteq_error_desc',
        'label' => esc_html__('404 Description Text', 'byteq'),
        'section' => '404_page',
        'default' => esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted', 'byteq'),
        'priority' => 10,
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'byteq_error_link_text',
        'label' => esc_html__('404 Link Text', 'byteq'),
        'section' => '404_page',
        'default' => esc_html__('Back To Home', 'byteq'),
        'priority' => 10,
    );

    return $fields;

}

add_filter('kirki/fields', 'byteq_404_fields');

/**
 * Added Fields
 */
function byteq_rtl_fields($fields)
{
    // rtl settings
    $fields[] = array(
        'type' => 'switch',
        'settings' => 'rtl_switch',
        'label' => esc_html__('RTL On/Off', 'byteq'),
        'section' => 'rtl_setting',
        'default' => '0',
        'priority' => 10,
        'choices' => [
            'on' => esc_html__('Enable', 'byteq'),
            'off' => esc_html__('Disable', 'byteq'),
        ],
    );

    return $fields;
}

add_filter('kirki/fields', 'byteq_rtl_fields');


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function byteq_theme_option($name)
{
    $value = '';
    if (class_exists('byteq')) {
        $value = Kirki::get_option(byteq_get_theme(), $name);
    }

    return apply_filters('byteq_theme_option', $value, $name);
}

/**
 * Get config ID
 *
 * @return string
 */
function byteq_get_theme()
{
    return 'byteq';
}