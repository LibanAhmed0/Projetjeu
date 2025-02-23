<?php get_header(); ?>

<main class="container">
    <div class="content-wrapper">
        <article class="single-game">
            <?php if (has_post_thumbnail()) : ?>
                <img class="game-thumbnail" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
            <?php endif; ?>

            <h1><?php the_title(); ?></h1>

            <p><strong>Éditeur / Développeur :</strong> 
                <?php echo get_the_term_list(get_the_ID(), 'editeurs_developpeurs', '', ', ', ''); ?>
            </p>
            <p><strong>Catégorie :</strong> 
                <?php echo get_the_term_list(get_the_ID(), 'categorie', '', ', ', ''); ?>
            </p>
            <p><strong>Plateforme :</strong> 
                <?php echo get_the_term_list(get_the_ID(), 'plateforme', '', ', ', ''); ?>
            </p>
            <p><strong>Année de sortie :</strong> 
                <?php echo get_the_term_list(get_the_ID(), 'annee_sortie', '', ', ', ''); ?>
            </p>

            <?php
            // Vérifier si SCF est actif avant d'afficher les champs personnalisés
            if (function_exists('SCF::get')) :
                $prix = SCF::get('prix');
                $lien = SCF::get('lien_achat');
                if (!empty($prix)) {
                    echo '<p><strong>Prix :</strong> ' . esc_html($prix) . '</p>';
                }
                if (!empty($lien)) {
                    echo '<a class="btn" href="' . esc_url($lien) . '" target="_blank">Acheter</a>';
                }
            endif;
            ?>

            <a href="<?php echo site_url('/'); ?>" class="btn">Retour à l'accueil</a>
        </article>
    </div>
</main>

<?php get_footer(); ?>
