<?php
/**
 * En-tête du site (header.php)
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

<header id="masthead" class="site-header" 
    style="background-image: url('<?php echo esc_url(get_template_directory_uri() . "/assets/images/banner.jpg"); ?>');">
    
    <div class="header-overlay"></div> <!-- ✅ Ombre pour améliorer la lisibilité -->

    <div class="header-container">
        
        <!-- ✅ Logo du site -->
        <div class="site-branding">
            <?php if (has_custom_logo()) {
                the_custom_logo();
            } else { ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                </h1>
            <?php } ?>
        </div>

        <!-- ✅ Menu des plateformes -->
        <nav class="platform-menu">
            <ul>
                <li>
                    <a href="<?php echo esc_url(site_url('/plateforme/microsoft-windows/')); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri() . "/assets/icons/pc.png"); ?>" 
                            alt="PC">
                        PC
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(site_url('/plateforme/playstation/')); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri() . "/assets/icons/playstation.png"); ?>" 
                            alt="Playstation">
                        Playstation
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(site_url('/plateforme/xbox/')); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri() . "/assets/icons/xbox.png"); ?>" 
                            alt="Xbox">
                        Xbox
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(site_url('/plateforme/switch/')); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri() . "/assets/icons/switch.png"); ?>" 
                            alt="Switch">
                        Switch
                    </a>
                </li>
            </ul>
        </nav>

        <!-- ✅ Icônes : Recherche, Panier, Profil -->
        <div class="header-icons">
            <a href="<?php echo esc_url(site_url('/recherche/')); ?>" class="icon">
                <img src="<?php echo esc_url(get_template_directory_uri() . "/assets/icons/search.png"); ?>" 
                    alt="Recherche">
            </a>
            <a href="<?php echo esc_url(site_url('/panier/')); ?>" class="icon">
                <img src="<?php echo esc_url(get_template_directory_uri() . "/assets/icons/cart.png"); ?>" 
                    alt="Panier">
            </a>
            <a href="<?php echo esc_url(site_url('/profil/')); ?>" class="icon">
                <img src="<?php echo esc_url(get_template_directory_uri() . "/assets/icons/user.png"); ?>" 
                    alt="Profil">
            </a>
        </div>
        
    </div> <!-- Fin .header-container -->
</header>
