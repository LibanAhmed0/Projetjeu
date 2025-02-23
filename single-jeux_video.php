<?php get_header(); ?>

<main class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="single-game">
            <h1><?php the_title(); ?></h1>

            <!-- Image du jeu -->
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
            <?php endif; ?>

            <!-- Informations du jeu -->
            <div class="game-details">
                <p><strong>Éditeur / Développeur :</strong> <?php echo esc_html(SCF::get('editeurs_developpeurs')); ?></p>
                <p><strong>Catégorie :</strong> <?php echo esc_html(SCF::get('categorie')); ?></p>
                <p><strong>Plateforme :</strong> <?php echo esc_html(SCF::get('plateforme')); ?></p>
                <p><strong>Année de sortie :</strong> <?php echo esc_html(SCF::get('annee_sortie')); ?></p>
                <p><strong>Note :</strong> <?php echo esc_html(SCF::get('note_du_jeu')); ?>/10</p>
                
                <?php if (SCF::get('lien_officiel')) : ?>
                    <p><a href="<?php echo esc_url(SCF::get('lien_officiel')); ?>" target="_blank" class="btn">Site officiel</a></p>
                <?php endif; ?>
            </div>

            <!-- Description complète -->
            <div class="game-description">
                <?php the_content(); ?>
            </div>
        </article>

        <!-- Bouton retour -->
        <p><a href="<?php echo get_post_type_archive_link('jeux_video'); ?>" class="btn">Retour à la liste</a></p>

    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
