<?php get_header(); ?>

<div class="wrapper">
    <main>
        <?php
        while (have_posts()) : the_post();
        ?>

            <article>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </article>

        <?php endwhile; ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
