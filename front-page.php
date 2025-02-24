<?php get_header(); ?>

<main class="front-page-container">
    
    <!-- ✅ Ajout du logo en tant qu'image -->
    <div class="frontpage-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/diverse-logo.png" alt="Diverse Logo">
    </div>

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
            <div class="grid">
                <?php
                $query = new WP_Query([
                    'post_type'      => 'jeux_video',
                    'posts_per_page' => 8
                ]);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        get_template_part('template-parts/content', 'game'); // ✅ On utilise un fichier séparé
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
<section class="services">
    <div class="service-item">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/fast.png" alt="Ultra rapide">
        <h3>Ultra rapide</h3>
        <p>Clé instantanée</p>
    </div>
    <div class="service-item">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/secure.png" alt="Ultra sécurisé">
        <h3>Ultra Sécurisé</h3>
        <p>Plus de 10,000 jeux</p>
    </div>
    <div class="service-item">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/support.png" alt="Service client">
        <h3>Service client</h3>
        <p>Conseillers disponibles 24/7</p>
    </div>
</section>


<?php get_footer(); ?>
