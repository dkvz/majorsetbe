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

// First make the query for the featured article, if any.
// It's juste the latest element in category "Annonces".
$ftArgs = array(
	'category_name' => 'annonces',
	'posts_per_page' => 1,
	'offset' => 0,
	'orderby' => 'ID',
	'order' => 'DESC',
	'post_status' => 'publish',
	'suppress_filters' => true 
);

$ftLoop = new WP_Query($ftArgs);

?>

	<main id="primary" class="site-main flex-center">

		<section class="hero-wrapper">
			<div class="hero">
				<h1 class="hero-title"><span>Major Set:</span> <span>The Band</span></h1>
				<div class="hero-cta">
					<a href="#upcomingEvents">Prochains concerts</a>
					<a href="/contact">Engagez-nous!</a>
				</div>
				<?php if ( $ftLoop->have_posts() ): ?>
				<div class="scroll-down-wrapper mt-2 hide-md">
					<a class="scroll-down" href="#mainSection" title="Afficher la suite">
						<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/arrow-down.svg" alt="Afficher la suite" />
					</a>
				</div>
				<?php endif; ?>
			</div>
		</section>

		<?php if ( $ftLoop->have_posts() ): ?>
		<div class="scroll-down-wrapper abs-bottom hide-lg">
			<a class="scroll-down" href="#mainSection" title="Afficher la suite">
				<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/arrow-down.svg" alt="Afficher la suite" />
			</a>
		</div>
		<?php endif; ?>

		<section class="main-section" id="mainSection">

			<?php if ( $ftLoop->have_posts() ): ?>
			<h1 class="entry-title">
				<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/thumbtack.svg" alt="Message épinglé" />
				A la une
			</h1>
			<?php 

				$ftLoop->the_post();
				get_template_part( 'template-parts/featured-post-card' );

			?>
			<hr>
			<?php endif; ?>

			<div class="hero-cta mb-2">
				<a href="https://www.youtube.com/channel/UCkF2fp-EuKz1rnB9hL2HbjA" target="_blank" rel="noopener noreferrer">
					<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/facebook-white.svg" alt="Notre page Facebook">
					Retrouvez-nous sur Facebook
				</a>
				<a href="https://www.facebook.com/majorset" target="_blank" rel="noopener noreferrer">
					<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/youtube-white.svg" alt="Notre chaîne YouTube">
					Notre chaîne YouTube
				</a>
			</div>
			<hr>

			<h1 class="entry-title" id="upcomingEvents">Prochains concerts</h1>

			<?php
			/* We're fetching the upcoming events using the metadata.
			* Event dates are stored as string using a format that
			* allowed comparison: "Y-m-d H:i:s"
			*/

			// Before that we need to reset wp_query:
			wp_reset_postdata();
			
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
