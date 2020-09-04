<?php
/**
 * Template part for displaying events in a list of events
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Major_Set_Be
 */

$event = tribe_get_event( get_the_ID() );

?>

<article id="post-<?php the_ID(); ?>">
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>

		
    <!-- .entry-meta -->
		
    
	</header><!-- .entry-header -->

	<?php major_set_be_post_thumbnail(); ?>

	<div class="entry-content">
		
		<?php 
		echo tribe_events_event_schedule_details(null, '<h2>', '</h2>'); 
		?>
		
    <pre>
    <?php print_r($event); ?>
    </pre>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php major_set_be_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
