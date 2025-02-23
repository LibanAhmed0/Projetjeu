<?php
/**
 * En-tête du site (header)
 *
 * @package MonTheme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="site-header" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/banner.jpg');">
    <div class="header-overlay"></div> <!-- ✅ Ombre pour lisibilité -->

    <div class="header-container">
        <!-- ✅ Logo -->
        <div class="site-branding">
            <?php if (has_custom_logo()) {
                the_custom_logo();
            } else { ?>
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php } ?>
        </div>

        <!-- ✅ Conteneur du menu pour ajouter une bordure -->
        <div class="platform-menu-wrapper">
            <nav class="platform-menu">
                <ul>
                    <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/pc.png" alt="PC"> PC</a></li>
                    <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/playstation.png" alt="Playstation"> Playstation</a></li>
                    <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/xbox.png" alt="Xbox"> Xbox</a></li>
                   <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/switch.png" alt="Switch"> Switch</a></li>

                </ul>
            </nav>
        </div>

        <!-- ✅ Icônes : Recherche, Panier, Profil -->
        <div class="header-icons">
            <a href="#" class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/search.png" alt="Recherche"></a>
            <a href="#" class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/cart.png" alt="Panier"></a>
            <a href="#" class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/user.png" alt="Profil"></a>
        </div>
    </div>
</header>
