<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscore
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->

    <?php if (has_post_thumbnail()) : ?>
        <div class="page-thumbnail">
            <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

    <?php if (get_edit_post_link()) : ?>
        <footer class="entry-footer">
            <?php edit_post_link(__('Modifier cette page', 'underscore'), '<span class="edit-link">', '</span>'); ?>
        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
