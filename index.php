<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Major_Set_Be
 */

get_header();
?>

	<main id="primary" class="site-main flex-center">

		<section class="hero-wrapper">
			<div class="hero">
				<h1 class="hero-title"><span>Major Set:</span> <span>The Band</span></h1>
				<div class="hero-cta">
					<a href="#upcomingEvents">Prochains concerts</a>
					<a href="#">Engagez-nous!</a>
				</div>
			</div>
		</section>

		<?php
		/*
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		*/
		?>

		<section class="main-section">

			<h1 class="entry-title" id="upcomingEvents">Prochains concerts</h1>

			<?php
			/* We're fetching the upcoming events using the metadata.
			* Event dates are stored as string using a format that
			* allowed comparison: "Y-m-d H:i:s"
			*/
			
			/*
			We could actually use a function called tribe_get_events(), it
			just works: https://theeventscalendar.com/knowledgebase/k/using-tribe_get_events/
			Should be in a try catch in case events calendar is not installed to show
			some kind of meaningful error in that case.
			*/
			$args = array(
				'post_type' => 'tribe_events',
				'orderby' => '_EventStartDate', 
				'order' => 'ASC',
				'meta_query' => array(
					array(
						'key' => '_EventStartDate',
						'value' => date('Y-m-d H:i:s'),
						'compare' => '>=',
					)
				)
			);
			$loop = new WP_Query($args);
			if ( $loop->have_posts() ) {
				while ( $loop->have_posts() ) {
					$loop->the_post();
					//get_template_part( 'template-parts/content', get_post_type() );
					get_template_part( 'template-parts/event-card' );
				}
			} else {
			?>

				<div class="info-card">
					Aucune représentation prévue pour l'instant
				</div>

			<?php
			}
			?>

		</section>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
