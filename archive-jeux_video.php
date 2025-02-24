<?php get_header(); ?>

<main class="container">
    <header class="archive-header">
        <h1 class="archive-title">
            Catégorie : <?php single_cat_title(); ?>
        </h1>
    </header>

    <div class="games-grid">
        <?php if (have_posts()) : ?>
            <div class="grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="game-card">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <img class="game-thumbnail" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                        </a>
                        <h2 class="game-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <a href="<?php the_permalink(); ?>" class="btn-game">Lire la suite</a>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- ✅ PAGINATION -->
            <div class="pagination">
                <?php echo paginate_links(); ?>
            </div>

        <?php else : ?>
            <p class="no-games">Aucun jeu trouvé dans cette catégorie.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
