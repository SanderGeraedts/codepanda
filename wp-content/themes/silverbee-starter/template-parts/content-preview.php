<article id="post-<?php the_ID(); ?>" <?php post_class( 'row' ); ?>>
    <div class="col-md-3 post-thumbnail">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail(); ?>
		<?php else : ?>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/placeholder.png"
                 alt="Sorry, no picture! Probably to lazy to upload an image...">
		<?php endif; ?>
    </div>
    <div class="col-md-9">
        <header class="entry-header">
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<?php if ( 'post' === get_post_type() ) : ?>
                <div class="entry-meta">
					<?php silverbee_starter_posted_on(); ?>
                </div><!-- .entry-meta -->
				<?php
			endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div><!-- .entry-content -->
    </div>
</article>