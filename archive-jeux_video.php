<?php get_header(); ?>

<main class="container">
    <h1>Liste des Jeux Vidéo</h1>

    <?php if (have_posts()) : ?>
        <div class="grid">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'game'); ?> <!-- 🔥 Utilisation d'un fichier externe -->
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
