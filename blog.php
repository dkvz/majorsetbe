<?php
/**
 * Template Name: Blog section
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Major_Set_Be
 */

get_header();

// I'm using a custom query and custom blog page.
// Because the alternative to doing this is a lot more
// complicated than I thought.
// Also, pagination doesn't just magically work.
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
	'post_type' => 'post',
	'paged' => $paged
);

$query = new WP_Query($args);
?>

	<main id="primary" class="site-main">

		<h1 class="entry-title">Blog &amp; Nouvelles</h1>

		<?php if ( $query->have_posts() ) : ?>

			<!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( $query->have_posts() ) :
				$query->the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/post-card' );

			endwhile;

			the_posts_navigation();


		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		<?php
		/* Copy pasted from here:
			https://wordpress.stackexchange.com/questions/254199/pagination-when-using-wp-query
		*/
		?>
		<div class="pagination">
				<?php 
					echo paginate_links( array(
						//'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
						'total'        => $query->max_num_pages,
						'current'      => max( 1, get_query_var( 'paged' ) ),
						'format'       => '?paged=%#%',
						'show_all'     => false,
						'type'         => 'plain',
						'end_size'     => 2,
						'mid_size'     => 1,
						'add_args'     => false,
						'add_fragment' => '',
					) );
				?>
		</div>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
