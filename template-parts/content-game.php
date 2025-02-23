<div class="game-card">
    <a href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>
        <h2><?php the_title(); ?></h2>
    </a>
    <p><strong>Plateforme :</strong> <?php echo esc_html(SCF::get('plateforme')); ?></p>
    <a class="btn" href="<?php the_permalink(); ?>">Voir le jeu</a>
</div>
