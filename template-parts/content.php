<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscore
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if (is_singular()) : ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php else : ?>
            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>">
            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
        </a>
    <?php endif; ?>

    <div class="entry-content">
        <?php if (is_singular()) : ?>
            <?php the_content(); ?>
        <?php else : ?>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="btn">Lire la suite</a>
        <?php endif; ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
