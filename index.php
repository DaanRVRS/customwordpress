<?php get_header(); ?>

<div class="wrapper">
    <main>
        <h2>Berichten</h2>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <article>
                    <h3>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>

                    <?php the_excerpt(); ?>
                </article>

            <?php endwhile; ?>
        <?php else : ?>
            <p>Geen berichten gevonden.</p>
        <?php endif; ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
