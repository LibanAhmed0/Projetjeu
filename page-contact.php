<?php
/**
 * Template Name: Page de Contact
 */
get_header(); ?>

<main class="contact-container">
    <div class="contact-wrapper">
        <h1>Contactez-nous</h1>
        <p>Besoin d'informations ou d'aide ? Remplissez le formulaire ci-dessous :</p>

        <!-- ✅ Formulaire personnalisé -->
        <form class="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="envoyer_message">

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit" class="btn-contact">Envoyer</button>
        </form>
    </div>
</main>

<?php get_footer(); ?>
