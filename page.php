<?php get_header(); ?>

<div class="wrapper">
    <main>
        <?php
        while (have_posts()) : the_post();
            the_content();
        endwhile;
        ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
