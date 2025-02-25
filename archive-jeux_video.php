<?php get_header(); ?>

<main class="archive-container">
    
    <!-- ✅ TITRE DE L'ARCHIVE -->
    <header class="archive-header">
        <h1 class="archive-title"><?php post_type_archive_title(); ?></h1>
    </header>

    <!-- ✅ GRILLE DES JEUX -->
    <section class="archive-grid">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="archive-game-card">
                <a href="<?php the_permalink(); ?>">
                    <img class="archive-game-thumbnail" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                </a>
                <h2 class="archive-game-title"><?php the_title(); ?></h2>
                <a class="archive-btn-game" href="<?php the_permalink(); ?>">Lire la suite</a>
            </article>
        <?php endwhile; else : ?>
            <p class="no-games">Aucun jeu trouvé.</p>
        <?php endif; ?>
    </section>

    <!-- ✅ PAGINATION -->
    <div class="pagination">
        <?php echo paginate_links(); ?>
    </div>

</main>

<?php get_footer(); ?>
