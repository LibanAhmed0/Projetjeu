<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscore
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
    </header><!-- .entry-header -->

    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>">
            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
        </a>
    <?php endif; ?>

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

    <footer class="entry-footer">
        <a href="<?php the_permalink(); ?>" class="btn">Voir plus</a>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
