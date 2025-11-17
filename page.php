<?php
/**
 * Page Template
 *
 * Dit template wordt gebruikt voor statische pagina’s
 * zoals "Over ons", "Contact", enzovoort.
 *
 * Functionaliteit:
 * - Laadt de header en footer.
 * - Toont de content van de pagina zoals ingevoerd in WordPress.
 * - Toont automatisch de paginatitel.
 * - WordPress gebruikt dit bestand wanneer een gebruiker een individuele pagina opent
 *   (page post type), tenzij er een specifieker template aanwezig is.
 *
 * @package DaanTheme
 */

get_header();
?>

<main id="site-content" role="main">

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <!-- Titel van de pagina -->
            <?php the_title('<h1>', '</h1>'); ?>

            <!-- De volledige inhoud van de pagina -->
            <?php the_content(); ?>

        <?php endwhile; ?>

    <?php endif; ?>

</main>

<?php get_footer(); ?>
