<?php get_header(); ?>

<section id="home" class="banner">
    <div class="wrapper">
        <h2><?php bloginfo('description'); ?></h2>
        <p>Welkom op onze website.</p>
    </div>
</section>

<section id="content">
    <div class="wrapper">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </div>
</section>

<?php get_footer(); ?>
