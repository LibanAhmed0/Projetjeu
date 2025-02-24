<?php get_header(); ?>

<main class="container">
    <div class="content-wrapper">
        <article class="single-game">
            
            <!-- ✅ Affichage de l'image du jeu -->
            <?php if (has_post_thumbnail()) : ?>
                <img class="game-thumbnail" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
            <?php endif; ?>

            <div class="game-info">
                <!-- ✅ Titre du jeu -->
                <h1 class="game-title"><?php the_title(); ?></h1>

                <!-- ✅ Affichage du Synopsis -->
                <?php 
                $synopsis = get_post_meta(get_the_ID(), 'synopsis', true);
                if (!empty($synopsis)) : ?>
                    <p class="game-synopsis"><strong>Synopsis :</strong> <span><?php echo esc_html($synopsis); ?></span></p>
                <?php endif; ?>

                <!-- ✅ Affichage des taxonomies -->
                <p><strong>Éditeur / Développeur :</strong> 
                    <?php echo get_the_term_list(get_the_ID(), 'editeurs_developpeurs', '<span>', ', ', '</span>'); ?>
                </p>
                <p><strong>Catégorie :</strong> 
                    <?php echo get_the_term_list(get_the_ID(), 'categorie', '<span>', ', ', '</span>'); ?>
                </p>
                <p><strong>Plateforme :</strong> 
                    <?php echo get_the_term_list(get_the_ID(), 'plateforme', '<span>', ', ', '</span>'); ?>
                </p>
                <p><strong>Année de sortie :</strong> 
                    <?php echo get_the_term_list(get_the_ID(), 'annee_sortie', '<span>', ', ', '</span>'); ?>
                </p>

                <!-- ✅ Affichage du Prix et du Lien d'achat -->
                <?php 
                $prix = get_post_meta(get_the_ID(), 'prix', true);
                $lien_achat = get_post_meta(get_the_ID(), 'lien_achat', true);

                if (!empty($prix)) : ?>
                    <p><strong>Prix :</strong> <span><?php echo esc_html($prix); ?>€</span></p>
                <?php endif; ?>

                <?php if (!empty($lien_achat)) : ?>
                    <a class="btn-game" href="<?php echo esc_url($lien_achat); ?>" target="_blank">Acheter</a>
                <?php endif; ?>

                <!-- ✅ Bouton Retour -->
                <a href="<?php echo site_url('/'); ?>" class="btn-game return-btn">Retour à l'accueil</a>
            </div>
        </article>
    </div>
</main>

<?php get_footer(); ?>
