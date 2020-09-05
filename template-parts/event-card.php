<?php
/**
 * Template part for displaying events in a list of events
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Major_Set_Be
 */

$event = tribe_get_event( get_the_ID() );

// DO I ACTUALLY NEED THAT $event VARIABLE?

?>

<article class="event-card" id="post-<?php the_ID(); ?>">
	<header>
		<?php
		if ( is_singular() ) :
			the_title( '<h1>', '</h1>' );
		else :
			the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif; ?>
    <!-- .entry-meta -->
		<div class="event-schedule">
			<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/calendar-alt.svg" alt="Icône de calendrier" />
			<?php 
				echo tribe_events_event_schedule_details(null, '<h2>', '</h2>'); 
			?>
		</div>
	</header><!-- .entry-header -->

	<div class="event-card-content">
		<?php major_set_be_post_thumbnail(); ?>
		<div class="event-content">
			<?php if ( tribe_has_venue() ): ?>
				<div class="event-meta">
					<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/map-marker-alt.svg" alt="Icône marqueur emplacement" />
					<span><?php echo tribe_get_venue(); ?></span>
				</div>
			<?php endif; ?>
			<?php if ( $cost = tribe_get_cost() ): ?>
				<div class="event-meta">
					<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/euro-sign.svg" alt="Icône Euro" />
					<span><?php echo $cost; ?></span>
				</div>
			<?php endif; ?>
			
			<?php the_excerpt(); ?>

		</div>
	</div><!-- .entry-content -->

	<footer class="event-card-footer">
		<?php major_set_be_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
