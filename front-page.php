<?php get_header(); ?>

<main class="front-page-container"> <!-- ✅ Ajout d'une classe principale pour styliser -->
    
    <!-- ✅ BLOC AVEC L'ARRIÈRE-PLAN BLEU -->
    <div class="content-wrapper">
        
        <!-- ✅ FILTRES LATÉRAUX -->
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

        <!-- ✅ LISTE DES JEUX -->
        <section class="games-grid">
            <h2 class="section-title">Jeux Vidéo</h2>
            <div class="grid">
                <?php
                $query = new WP_Query(array(
                    'post_type'      => 'jeux_video',
                    'posts_per_page' => 8
                ));

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        get_template_part('template-parts/content', 'game');
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="no-games">Aucun jeu trouvé.</p>';
                endif;
                ?>
            </div>

            <!-- ✅ PAGINATION -->
            <div class="pagination">
                <?php echo paginate_links(); ?>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
