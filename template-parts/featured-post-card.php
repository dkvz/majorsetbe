<?php
/**
 * Template part for displaying the pinned posts on the home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Major_Set_Be
 */

?>

<article id="post-<?php the_ID(); ?>" class="post-card featured text-align-initial">
	<header>
		<?php
			the_title( 
				'<h1 class="post-card-title">', 
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="Permalien vers l\'article"><img class="icon" src="' . get_bloginfo('template_url') . '/assets/link-teal.svg" alt="Permalien" /></a></h1>' 
			);
    ?>
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
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
