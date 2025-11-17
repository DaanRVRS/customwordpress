<?php
/**
 * Index Template
 *
 * Dit template wordt gebruikt als hoofdoverzicht voor blogposts.
 * WordPress bepaalt automatisch wanneer index.php wordt geladen
 * (bijvoorbeeld wanneer er geen specifiekere template beschikbaar is).
 *
 * Functionaliteit:
 * - Haalt alle posts op via de WordPress Loop.
 * - Toont titel, excerpt/intro, metadata en featured image.
 * - Toont categorieën en comment-count.
 * - Bevat paginering voor oudere/nieuwere posts.
 * - Laadt de sidebar en footer.
 *
 * @package DaanTheme
 */

get_header();
?>

<!-- Main content -->
<div id="main">

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <!-- Individuele post -->
            <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

                <header>
                    <div class="title">
                        <!-- Titel met link naar de volledige post -->
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                        <!-- Optionele excerpt -->
                        <?php if ( has_excerpt() ) : ?>
                            <p><?php echo esc_html( get_the_excerpt() ); ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Metadata: publicatiedatum + auteur -->
                    <div class="meta">
                        <time class="published" datetime="<?php echo esc_attr( get_the_date('c') ); ?>">
                            <?php echo esc_html( get_the_date() ); ?>
                        </time>

                        <!-- Link naar auteurspagina -->
                        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>" class="author">
                            <span class="name"><?php the_author(); ?></span>
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/images/avatar.jpg' ); ?>"
                                 alt="<?php the_author(); ?>">
                        </a>
                    </div>
                </header>

                <!-- Featured image -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" class="image featured">
                        <?php the_post_thumbnail('large'); ?>
                    </a>
                <?php endif; ?>

                <!-- Automatisch ingekorte content -->
                <p>
                    <?php echo esc_html( wp_trim_words( get_the_content(), 40, '…' ) ); ?>
                </p>

                <!-- Footer met categorieën + comments -->
                <footer>
                    <ul class="actions">
                        <li>
                            <a href="<?php the_permalink(); ?>" class="button large">Continue Reading</a>
                        </li>
                    </ul>

                    <ul class="stats">
                        <li><?php the_category(', '); ?></li>
                        <li>
                            <a href="<?php comments_link(); ?>" class="icon solid fa-comment">
                                <?php comments_number('0', '1', '%'); ?>
                            </a>
                        </li>
                    </ul>
                </footer>

            </article><!-- .post -->

        <?php endwhile; ?>

        <!-- Navigatie voor oudere/nieuwere posts -->
        <ul class="actions pagination">
            <li><?php previous_posts_link('&laquo; Previous Page'); ?></li>
            <li><?php next_posts_link('Next Page &raquo;'); ?></li>
        </ul>

    <?php else : ?>

        <!-- Fallback wanneer er geen posts zijn -->
        <p><?php esc_html_e('No posts found.', 'greentech'); ?></p>

    <?php endif; ?>

</div><!-- #main -->

<!-- Sidebar -->
<?php get_sidebar(); ?>

<?php get_footer(); ?>
