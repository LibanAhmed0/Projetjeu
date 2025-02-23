<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscore
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Aucun contenu trouvé', 'underscore'); ?></h1>
    </header><!-- .page-header -->

    <div class="page-content">
        <?php if (is_home() && current_user_can('publish_posts')) : ?>
            <p><?php printf(
                wp_kses(
                    __('Prêt à publier votre premier article ? <a href="%1$s">Commencez ici</a>.', 'underscore'),
                    array('a' => array('href' => array()))
                ),
                esc_url(admin_url('post-new.php'))
            ); ?></p>
        <?php elseif (is_search()) : ?>
            <p><?php esc_html_e('Désolé, aucun résultat ne correspond à votre recherche. Essayez d’autres mots-clés.', 'underscore'); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php esc_html_e('Nous ne trouvons pas ce que vous cherchez. Essayez notre liste de jeux !', 'underscore'); ?></p>
            <a href="<?php echo get_post_type_archive_link('jeux_video'); ?>" class="btn">Voir les jeux</a>
        <?php endif; ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->
