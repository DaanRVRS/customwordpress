<?php
/**
 * Single Post Template
 *
 * Dit template wordt gebruikt voor individuele blogberichten (posts).
 * WordPress laadt dit bestand automatisch wanneer een gebruiker een
 * enkele post opent (post type: 'post').
 *
 * Functionaliteit:
 * - Toont de volledige postinhoud.
 * - Toont titel, publicatiedatum, auteur en featured image.
 * - Toont categorieën en het aantal comments.
 * - Laadt de comments-template indien reacties toegestaan zijn.
 *
 * @package DaanTheme
 */

get_header();
?>

<!-- Main content container -->
<div id="main">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

            <!-- Post header: titel + metadata -->
            <header>
                <div class="title">
                    <h2><?php the_title(); ?></h2>
                </div>

                <div class="meta">
                    <!-- Publicatiedatum -->
                    <time class="published" datetime="<?php echo esc_attr( get_the_date('c') ); ?>">
                        <?php echo esc_html( get_the_date() ); ?>
                    </time>

                    <!-- Auteur -->
                    <span class="author">
                        <span class="name"><?php the_author(); ?></span>
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/images/avatar.jpg' ); ?>"
                             alt="<?php the_author(); ?>">
                    </span>
                </div>
            </header>

            <!-- Featured image -->
            <?php if ( has_post_thumbnail() ) : ?>
                <span class="image featured">
                    <?php the_post_thumbnail('large'); ?>
                </span>
            <?php endif; ?>

            <!-- Volledige inhoud van de post -->
            <div class="content">
                <?php the_content(); ?>
            </div>

            <!-- Footer: categorieën + comment-count -->
            <footer>
                <ul class="stats">
                    <li><?php the_category(', '); ?></li>
                    <li class="icon solid fa-comment">
                        <?php comments_number('0', '1', '%'); ?>
                    </li>
                </ul>
            </footer>

        </article>

        <!-- Reacties-sectie -->
        <?php if ( comments_open() || get_comments_number() ) : ?>
            <section>
                <?php comments_template(); ?>
            </section>
        <?php endif; ?>

    <?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>
