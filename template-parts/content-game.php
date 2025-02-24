<div class="game-card">
    <a href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <img class="game-image" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>
        <h3 class="game-title"><?php the_title(); ?></h3>
    </a>
    <a class="btn btn-game" href="<?php the_permalink(); ?>">Voir le jeu</a>
</div>
