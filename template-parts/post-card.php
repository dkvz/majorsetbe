<?php
/**
 * Template part for displaying posts in a list context
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Major_Set_Be
 */

?>

<article id="post-<?php the_ID(); ?>" class="post-card">
	<header>
		<?php
		//if ( is_singular() ) :
			//the_title( '<h1 class="post-card-title">', '</h1>' );
		//else :
			//the_title( '<h1 class="post-card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			the_title( 
				'<h1 class="post-card-title">', 
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="Permalien vers l\'article"><img class="icon" src="' . get_bloginfo('template_url') . '/assets/link-teal.svg" alt="Permalien vers l\'article" /></a></h1>' 
			);
    //endif; 
    ?>
    <div class="post-card-meta">
      <img class="icon" src="<?php bloginfo('template_url'); ?>/assets/calendar-alt-red.svg" alt="Icône de calendrier" />
      <?php
      //major_set_be_posted_on();
      echo '<span>' . esc_attr( get_the_date() ) . '</span>';
      major_set_be_posted_by();
      ?>
    </div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php major_set_be_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'major_set_be' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
    );

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'major_set_be' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php major_set_be_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
