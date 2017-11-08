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
            <section id="introduction" class="row">
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
            </section>
            <section class="row" id="categories">
				<?php $categories = get_categories();

				$counter = 0;
				foreach ( $categories as $category ) : ?>
					<?php if ( $counter == 3 ) {
						break;
					} ?>
                    <div class="col-md-4 category">
                        <h2>
                            <a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name ?></a>
                        </h2>
                        <p><?php echo $category->description; ?></p>
                    </div>
					<?php $counter ++; ?>
				<?php endforeach; ?>
            </section>
            <section class="row" id="lastest-post">
                <div class="col-md-8 col-md-offset-2">
					<?php
					// the query
					$the_query = new WP_Query( array(
						'posts_per_page' => 1,
					) );
					?>
					<?php if ( $the_query->have_posts() ) : ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                            <header class="entry-header">
									<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                                    <div class="entry-meta">
										<?php silverbee_starter_posted_on(); ?>
                                    </div><!-- .entry-meta -->
                            </header><!-- .entry-header -->
                            <div class="entry-content">
								<?php the_content(); ?>
                            </div>

						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
                </div>
            </section>
        </main><!-- #main -->

    </div><!-- #primary -->

<?php
get_footer();
