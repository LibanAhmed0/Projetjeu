<?php get_header(); ?>

<main class="container">
    <h1>Liste des Jeux Vidéo Indépendants</h1>

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
                    
                    <p><strong>Éditeur / Développeur :</strong> <?php echo esc_html(SCF::get('editeurs_developpeurs')); ?></p>
                    <p><strong>Catégorie :</strong> <?php echo esc_html(SCF::get('categorie')); ?></p>
                    <p><strong>Plateforme :</strong> <?php echo esc_html(SCF::get('plateforme')); ?></p>
                    <p><strong>Année de sortie :</strong> <?php echo esc_html(SCF::get('annee_sortie')); ?></p>
                    
                    <a class="btn" href="<?php the_permalink(); ?>">Voir le jeu</a>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>

    <?php else : ?>
        <p>Aucun jeu trouvé.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
