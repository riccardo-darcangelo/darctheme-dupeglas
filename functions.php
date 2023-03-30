<?php

function load_theme_styles() {
    wp_register_style('stylesheet', get_template_directory_uri() . '/css/theme.css', '', 1, 'all');
    wp_enqueue_style('stylesheet');
    wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', '', 1, 'all');
    wp_enqueue_style('stylesheet');
}
add_action('wp_enqueue_scripts', 'load_theme_styles');

function load_theme_js() {
    wp_register_script('dg_theme_js', get_template_directory_uri() . '/js/theme.js', false, '', true);
    wp_enqueue_script('dg_theme_js');
}
add_action('wp_enqueue_scripts', 'load_theme_js');

//Remove html margin-top
add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );
add_theme_support('post-thumbnails');

//Add woocommerce support

function dg_add_woocommerce_support() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'dg_add_woocommerce_support');

// Add Category Img to Archive Page
add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
function woocommerce_category_image() {
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	    if ( $image ) {
		    echo '<div class="prod-cat-img"><img src="' . $image . '" alt="' . $cat->name . ' /></div>';
		}
	}
}

//Only show products in the front-end search results
function lw_search_filter_pages($query) {
if ($query->is_search) {
$query->set('post_type', 'product');
$query->set( 'wc_query', 'product_query' );
}
return $query;
}
 
add_filter('pre_get_posts','lw_search_filter_pages');

// Register Menus
function register_theme_menus() {
    register_nav_menus(
        array(
            'main-menu' => __( 'Hauptmenu' ),
            'footer-help' => __('Hilfe Menu'),
            'footer-law' => __( 'Rechtliches Menu' )
        )
    );
}
add_action( 'init', 'register_theme_menus' );

// Add Customizer Functions
function theme_customizer_function($wp_customize) {
    // Homepage Panel
    $wp_customize->add_panel('homepage', array(
        'title' => 'Homepage',
        'panel' => 'homepage',
        'priority' => 10,
        'capability' => 'edit_theme_options',
    ));

    // Hero Section
    $wp_customize->add_section('homepage_hero', array(
        'title' => 'Hero',
        'description' => __('Hero Bereich'),
        'priority' => 1,
        'panel' => 'homepage',
    ));
    $wp_customize->add_setting('homepage_hero_title', array(
        'default' => __('Find your fragrance'),
        'sanitize_callback' => 'sanitize_custom_text',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control('homepage_hero_title_control', array(
        'label' => 'Titel',
        'section' => 'homepage_hero',
        'priority' => 1,
        'settings' => 'homepage_hero_title',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_setting('homepage_hero_subtitle', array(
        'default' => 'Deine düfte in Augsburg',
        'sanitize_callback' => 'sanitize_custom_text',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control('homepage_hero_subtitle_control', array(
        'label' => 'Untertitle',
        'section' => 'homepage_hero',
        'priority' => 2,
        'settings' => 'homepage_hero_subtitle',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting('homepage_hero_feature_img', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'transport'   => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'homepage_hero_feature_img_control', array(
        'label' => 'Featured Image',
        'section' => 'homepage_hero',
        'priority' => 3,
        'settings' => 'homepage_hero_feature_img',
        'button_labels' => array(// All These labels are optional
            'select' => 'Hinzufügen',
            'remove' => 'Entfernen',
            'change' => 'Ändern',
            )
    )));
	$wp_customize->add_setting('homepage_hero_bg_img', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'transport'   => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'homepage_hero_bg_img_control', array(
        'label' => 'Hintergrundbild',
        'section' => 'homepage_hero',
        'priority' => 3,
        'settings' => 'homepage_hero_bg_img',
        'button_labels' => array(// All These labels are optional
            'select' => 'Hinzufügen',
            'remove' => 'Entfernen',
            'change' => 'Ändern',
            )
    )));
	
	// Category Section
    $wp_customize->add_section('homepage_category', array(
        'title' => 'Kategorien | unsere Düfte',
        'description' => __('Ändere Bilder der Kategorien.'),
        'priority' => 3,
        'panel' => 'homepage',
    ));
	// Woman
    $wp_customize->add_setting('homepage_category_woman_img', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'homepage_category_woman_img_control', array(
        'label' => 'Damenduft',
        'section' => 'homepage_category',
        'priority' => 3,
        'settings' => 'homepage_category_woman_img',
        'button_labels' => array(// All These labels are optional
            'select' => 'Hinzufügen',
            'remove' => 'Entfernen',
            'change' => 'Ändern',
            )
    )));
	// Men
    $wp_customize->add_setting('homepage_category_men_img', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'homepage_category_men_img_control', array(
        'label' => 'Männerduft',
        'section' => 'homepage_category',
        'priority' => 3,
        'settings' => 'homepage_category_men_img',
        'button_labels' => array(// All These labels are optional
            'select' => 'Hinzufügen',
            'remove' => 'Entfernen',
            'change' => 'Ändern',
            )
    )));
	// Luxury
    $wp_customize->add_setting('homepage_category_luxury_img', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'homepage_category_luxury_img_control', array(
        'label' => 'Luxury Line',
        'section' => 'homepage_category',
        'priority' => 3,
        'settings' => 'homepage_category_luxury_img',
        'button_labels' => array(// All These labels are optional
            'select' => 'Hinzufügen',
            'remove' => 'Entfernen',
            'change' => 'Ändern',
            )
    )));
	// Unisex
    $wp_customize->add_setting('homepage_category_unisex_img', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'homepage_category_unisex_img_control', array(
        'label' => 'Unisex Line',
        'section' => 'homepage_category',
        'priority' => 3,
        'settings' => 'homepage_category_unisex_img',
        'button_labels' => array(// All These labels are optional
            'select' => 'Hinzufügen',
            'remove' => 'Entfernen',
            'change' => 'Ändern',
            )
    )));

    // About Section
    $wp_customize->add_section('homepage_about', array(
        'title' => 'Über Uns',
        'description' => __('Schreibe etwas über dich oder dein Geschäft.'),
        'priority' => 3,
        'panel' => 'homepage',
    ));
    $wp_customize->add_setting('homepage_about_title', array(
        'default' => __('Über Uns'),
        'sanitize_callback' => 'sanitize_custom_text',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control('homepage_about_title_control', array(
        'label' => 'Title',
        'section' => 'homepage_about',
        'priority' => 1,
        'settings' => 'homepage_about_title',
        'type' => '',
    ));
    $wp_customize->add_setting('homepage_about_text', array(
        'default' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
        'sanitize_callback' => 'sanitize_custom_text',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control('homepage_about_text_control', array(
        'default' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
        'label' => 'Text',
        'section' => 'homepage_about',
        'priority' => 2,
        'settings' => 'homepage_about_text',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting('homepage_about_link_text', array(
        'default' => 'more',
        'sanitize_callback' => 'sanitize_custom_text',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control('homepage_about_link_text_control', array(
        'label' => 'Button Text',
        'section' => 'homepage_about',
        'priority' => 2,
        'settings' => 'homepage_about_link_text',
    ));
    $wp_customize->add_setting('homepage_about_link', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control('homepage_about_link_control', array(
        'label' => 'Link',
        'section' => 'homepage_about',
        'priority' => 2,
        'settings' => 'homepage_about_link',
    ));
    $wp_customize->add_setting('homepage_about_img', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'homepage_about_img_control', array(
        'label' => 'Titel Bild',
        'section' => 'homepage_about',
        'priority' => 3,
        'settings' => 'homepage_about_img',
        'button_labels' => array(// All These labels are optional
            'select' => 'Hinzufügen',
            'remove' => 'Entfernen',
            'change' => 'Ändern',
            )
    )));

    // Footer Panel
    $wp_customize->add_panel('footer', array(
        'title' => 'Footer',
        'panel' => 'footer',
        'priority' => 180,
        'capability' => 'edit_theme_options',
    ));

    // First Section
    $wp_customize->add_section('footer_one', array(
        'title' => 'Footer 1',
        'priority' => 1,
        'panel' => 'footer',
    ));
    $wp_customize->add_setting('footer_one_logo', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_one_logo_control', array(
        'label' => 'Titel Bild',
        'section' => 'footer_one',
        'priority' => 1,
        'settings' => 'footer_one_logo',
        'button_labels' => array(// All These labels are optional
            'select' => 'Hinzufügen',
            'remove' => 'Entfernen',
            'change' => 'Ändern',
            )
    )));

    // Second Section
    $wp_customize->add_section('footer_two', array(
        'title' => 'Footer 2',
        'priority' => 1,
        'panel' => 'footer',
    ));
    $wp_customize->add_setting('footer_two_social_one_img', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_two_social_one_img_control', array(
        'label' => 'Social 1',
        'section' => 'footer_two',
        'priority' => 1,
        'settings' => 'footer_two_social_one_img',
        'button_labels' => array(// All These labels are optional
            'select' => 'Hinzufügen',
            'remove' => 'Entfernen',
            'change' => 'Ändern',
            )
    )));
    $wp_customize->add_setting('footer_two_social_one_link', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control('footer_two_social_one_link_control', array(
        'label' => 'Social 1 - Link',
        'section' => 'footer_two',
        'priority' => 2,
        'settings' => 'footer_two_social_one_link',
    ));

    $wp_customize->add_setting('footer_two_social_two_img', array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_two_social_two_img_control', array(
        'label' => 'Social 2',
        'section' => 'footer_two',
        'priority' => 3,
        'settings' => 'footer_two_social_two_img',
        'button_labels' => array(// All These labels are optional
            'select' => 'Hinzufügen',
            'remove' => 'Entfernen',
            'change' => 'Ändern',
            )
    )));
    $wp_customize->add_setting('footer_two_social_two_link', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control('footer_two_social_two_link_control', array(
        'label' => 'Social 2 - Link',
        'section' => 'footer_two',
        'priority' => 4,
        'settings' => 'footer_two_social_two_link',
    ));
    
}
add_action('customize_register', 'theme_customizer_function');

function sanitize_custom_text($input) {
    return htmlspecialchars($input);
}

function sanitize_custom_url($input) {
    return filter_var($input, FILTER_SANITIZE_URL);
}