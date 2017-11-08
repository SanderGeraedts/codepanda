<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Silverbee_Starter
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main row" role="main">
            <aside class="col-md-2 col-md-offset-2">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/intropic.jpg"
                     alt="A picture of my face.">
            </aside>
            <div class="col-md-6 content">
                <div>
					<?php while ( have_posts() ) : the_post();
						the_content();
					endwhile; ?>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
