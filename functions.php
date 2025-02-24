<?php
/**
 * Fonctions du thème WordPress
 *
 * @package MonTheme
 */

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

/* ==========================
   CONFIGURATION DU THÈME
   ========================== */
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

/* ==========================
   CHARGEMENT DES STYLES ET SCRIPTS
   ========================== */
function mon_theme_scripts() {
    wp_enqueue_style('mon-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_enqueue_style('front-page-style', get_template_directory_uri() . '/css/components/front-page.css', array(), _S_VERSION);
    wp_enqueue_style('single-jeux-style', get_template_directory_uri() . '/css/components/single-jeux_video.css', array(), _S_VERSION);

    wp_enqueue_script('mon-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'mon_theme_scripts');

/* ==========================
   ENREGISTREMENT DES WIDGETS
   ========================== */
function mon_theme_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'mon-theme'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Ajoutez des widgets ici.', 'mon-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'mon_theme_widgets_init');

/* ==========================
   CUSTOM POST TYPE : JEUX VIDÉO
   ========================== */
function create_games_cpt() {
    register_post_type('jeux_video', array(
        'label'         => __('Jeux Vidéo', 'mon-theme'),
        'public'        => true,
        'show_ui'       => true,
        'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive'   => true,
        'rewrite'       => array('slug' => 'jeux-video'),
        'show_in_rest'  => true,
    ));
}
add_action('init', 'create_games_cpt');

/* ==========================
   TAXONOMIES PERSONNALISÉES
   ========================== */
function create_game_taxonomies() {
    $taxonomies = array(
        'editeurs_developpeurs' => 'Éditeurs / Développeurs',
        'categorie'             => 'Catégories',
        'plateforme'            => 'Plateformes',
        'annee_sortie'          => 'Années de sortie',
    );

    foreach ($taxonomies as $slug => $name) {
        register_taxonomy($slug, 'jeux_video', array(
            'labels'            => array(
                'name'          => $name,
                'singular_name' => rtrim($name, 's'),
            ),
            'hierarchical'      => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'rewrite'           => array('slug' => $slug),
            'show_in_rest'      => true,
        ));
    }
}
add_action('init', 'create_game_taxonomies');

/* ==========================
   CHAMPS PERSONNALISÉS (Synopsis, Prix, Lien d'achat)
   ========================== */
function add_game_custom_fields($post) {
    $synopsis = get_post_meta($post->ID, 'synopsis', true);
    $prix = get_post_meta($post->ID, 'prix', true);
    $lien_achat = get_post_meta($post->ID, 'lien_achat', true);
    ?>
    <div class="form-field">
        <label for="synopsis"><?php _e('Synopsis', 'mon-theme'); ?></label>
        <textarea id="synopsis" name="synopsis" rows="4" cols="50"><?php echo esc_textarea($synopsis); ?></textarea>
    </div>
    <div class="form-field">
        <label for="prix"><?php _e('Prix (€)', 'mon-theme'); ?></label>
        <input type="number" id="prix" name="prix" value="<?php echo esc_attr($prix); ?>">
    </div>
    <div class="form-field">
        <label for="lien_achat"><?php _e('Lien d’achat', 'mon-theme'); ?></label>
        <input type="url" id="lien_achat" name="lien_achat" value="<?php echo esc_url($lien_achat); ?>">
    </div>
    <?php
}

function save_game_custom_fields($post_id) {
    if (array_key_exists('synopsis', $_POST)) {
        update_post_meta($post_id, 'synopsis', sanitize_text_field($_POST['synopsis']));
    }
    if (array_key_exists('prix', $_POST)) {
        update_post_meta($post_id, 'prix', sanitize_text_field($_POST['prix']));
    }
    if (array_key_exists('lien_achat', $_POST)) {
        update_post_meta($post_id, 'lien_achat', esc_url($_POST['lien_achat']));
    }
}
add_action('save_post', 'save_game_custom_fields');

/**
 * Ajout des méta-boxes pour les champs personnalisés
 */
add_action('add_meta_boxes', function() {
    add_meta_box('game_details', __('Détails du Jeu', 'mon-theme'), 'add_game_custom_fields', 'jeux_video', 'normal', 'high');
});

function traiter_formulaire_contact() {
    if (!isset($_POST['nom']) || !isset($_POST['email']) || !isset($_POST['message'])) {
        wp_die('Tous les champs sont requis.');
    }

    $nom = sanitize_text_field($_POST['nom']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    $to = get_option('admin_email'); // Envoi à l’admin du site
    $subject = "Nouveau message de contact de $nom";
    $headers = "From: $email";

    wp_mail($to, $subject, $message, $headers);

    wp_redirect(home_url('/merci')); // ✅ Redirection après envoi
    exit;
}
add_action('admin_post_envoyer_message', 'traiter_formulaire_contact');
add_action('admin_post_nopriv_envoyer_message', 'traiter_formulaire_contact');
