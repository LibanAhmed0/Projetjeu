<?php get_header(); ?>

<main class="container">
    <h1>Liste des Jeux Vidéo</h1>

    <?php if (have_posts()) : ?>
        <div class="grid">
            <?php while (have_posts()) : the_post(); ?>
                <div class="game-card">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <h2><?php the_title(); ?></h2>
                    </a>
                    <a class="btn" href="<?php the_permalink(); ?>">Voir le jeu</a>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>

    <?php else : ?>
        <p>Aucun jeu trouvé.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
