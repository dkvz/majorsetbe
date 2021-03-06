<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Major_Set_Be
 */

/*
This used to be the root element:

<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
	<header>
		<?php the_title( sprintf( '<h2 class="post-card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

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
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<?php /*
	<footer class="entry-footer">
		<?php major_set_be_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	*/
	?>
</article><!-- #post-<?php the_ID(); ?> -->
