<?php
/**
 * The template for displaying the footer
 *
 * @package MonTheme
 */
?>

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="footer-columns">
            <div class="footer-column">
                <h4>Informations</h4>
                <ul>
                    <li><a href="#">Conditions de vente</a></li>
                    <li><a href="#">Utiliser une carte cadeau</a></li>
                    <li><a href="#">Programme d'affiliation</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Support</h4>
                <ul>
                    <li><a href="#">Service client</a></li>
                    <a href="<?php echo site_url('/contact'); ?>">Contact</a>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Suivez-nous</h4>
                <ul class="social-icons">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <p class="copyright">© <?php echo date('Y'); ?> MonSite. Tous droits réservés.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
