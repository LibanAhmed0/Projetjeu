<?php
/**
 * The template for displaying the footer (juste la partie rose)
 *
 * @package MonTheme
 */
?>

<footer id="colophon" class="site-footer">
    <div class="container footer-main">
        <div class="footer-left">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/trustpilot.png" alt="Trustpilot">
        </div>

        <div class="footer-links">
            <a href="#">Les conditions de vente</a>
            <a href="#">Utiliser une carte cadeau</a>
            <a href="#">Programme d'affiliation</a>
            <a href="<?php echo site_url('/contact'); ?>">Nous contacter</a>
        </div>

        <div class="footer-social">
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/youtube.png" alt="YouTube"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/discord.png" alt="Discord"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/instagram.png" alt="Instagram"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/x.png" alt="Twitter/X"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/facebook.png" alt="Facebook"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/twitch.png" alt="Twitch"></a>
        </div>

        <div class="footer-locale">
            <span>🌍 France | 🇫🇷 Français | 💶 EUR</span>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
