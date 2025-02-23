<?php get_header(); ?>

<main class="front-page-container">
    <div class="content-wrapper">
        
        <aside class="filters">
            <h3>Genre</h3>
            <ul>
                <li><button data-filter="action">Action</button></li>
                <li><button data-filter="rpg">RPG</button></li>
                <li><button data-filter="simulation">Simulation</button></li>
                <li><button data-filter="sport">Sport</button></li>
            </ul>

            <h3>Plateforme</h3>
            <ul>
                <li><button data-filter="ps5">Playstation</button></li>
                <li><button data-filter="xbox">Xbox</button></li>
                <li><button data-filter="steam">Steam</button></li>
            </ul>

            <h3>Prix</h3>
            <ul>
                <li><button data-filter="promo">En promo</button></li>
                <li><button data-filter="gratuit">Gratuit</button></li>
            </ul>
        </aside>

        <section class="games-grid">
            <h2 class="section-title">Jeux Vidéo</h2>
            <div class="grid">
                <?php
                $query = new WP_Query([
                    'post_type' => 'jeux_video',
                    'posts_per_page' => 8
                ]);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        ?>
                        <div class="game-card">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                                <h3><?php the_title(); ?></h3>
                            </a>
                            <a class="btn" href="<?php the_permalink(); ?>">Voir le jeu</a>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="no-games">Aucun jeu trouvé.</p>';
                endif;
                ?>
            </div>

            <div class="pagination">
                <?php echo paginate_links(); ?>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
