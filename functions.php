<?php
/**
 * Fonctions du thème WordPress
 *
 * @package MonTheme
 */

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

/**
 * Configuration du thème
 */
function mon_theme_setup() {
    load_theme_textdomain('mon-theme', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('custom-background', array('default-color' => 'ffffff', 'default-image' => ''));
    add_theme_support('custom-logo', array('height' => 250, 'width' => 250, 'flex-width' => true, 'flex-height' => true));

    register_nav_menus(array(
        'menu-principal' => __('Menu Principal', 'mon-theme'),
    ));
}
add_action('after_setup_theme', 'mon_theme_setup');

/**
 * Définition de la largeur du contenu
 */
function mon_theme_content_width() {
    $GLOBALS['content_width'] = apply_filters('mon_theme_content_width', 640);
}
add_action('after_setup_theme', 'mon_theme_content_width', 0);

/**
 * Enregistrement des widgets (sidebar)
 */
function mon_theme_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'mon-theme'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Ajoutez des widgets ici.', 'mon-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'mon_theme_widgets_init');

/**
 * Chargement des styles et scripts
 */
function mon_theme_scripts() {
    wp_enqueue_style('mon-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_enqueue_style('front-page-style', get_template_directory_uri() . '/css/components/front-page.css', array(), _S_VERSION);
    wp_enqueue_script('mon-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'mon_theme_scripts');

/**
 * Création du Custom Post Type : Jeux Vidéo
 */
function create_games_cpt() {
    register_post_type('jeux_video', array(
        'label' => __('Jeux Vidéo', 'mon-theme'),
        'public' => true,
        'show_ui' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'jeux-video'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'create_games_cpt');

/**
 * Création des taxonomies personnalisées pour les Jeux Vidéo
 */
function create_game_taxonomies() {
    $taxonomies = array(
        'editeurs_developpeurs' => 'Éditeurs / Développeurs',
        'categorie' => 'Catégories',
        'plateforme' => 'Plateformes',
        'annee_sortie' => 'Années de sortie',
    );

    foreach ($taxonomies as $slug => $name) {
        register_taxonomy($slug, 'jeux_video', array(
            'labels' => array(
                'name' => $name,
                'singular_name' => rtrim($name, 's'),
            ),
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'rewrite' => array('slug' => $slug),
            'show_in_rest' => true,
        ));
    }
}
add_action('init', 'create_game_taxonomies');
