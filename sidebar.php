<?php
/**
 * Sidebar Template
 *
 * Dit template toont de sidebar van het thema.
 * Functionaliteit:
 * - Laadt dynamische widgets via de geregistreerde widget area ('main-sidebar').
 * - Toont een fallback (titel + sitebeschrijving) wanneer er nog geen widgets zijn toegevoegd.
 * - Sluit af met een kleine footer-sectie binnen de sidebar.
 *
 * De widget area wordt geregistreerd in functions.php via register_sidebar().
 *
 * @package DaanTheme
 */
?>

<section id="sidebar">

    <?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>

        <!-- Dynamische WordPress-widgets -->
        <?php dynamic_sidebar( 'main-sidebar' ); ?>

    <?php else : ?>

        <!-- Fallback-inhoud wanneer er nog geen widgets zijn toegevoegd -->
        <section class="widget">
            <h3><?php bloginfo( 'name' ); ?></h3>
            <p><?php bloginfo( 'description' ); ?></p>
        </section>

    <?php endif; ?>

    <!-- Sidebar-footer (bijv. copyright) -->
    <section id="footer">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    </section>

</section>
