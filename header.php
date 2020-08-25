<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Major_Set_Be
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'major_set_be' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-wrapper">
			<div class="site-branding">
				<?php
				if (the_custom_logo()):
					the_custom_logo();
				else:
					?>
					<svg viewBox="0 0 93 45" xmlns="http://www.w3.org/2000/svg"><g transform="translate(-33 -145)"><path d="m47 167c1.7-1.2 3.4-3.7 4-5.9 0.28-1.1 0.13-1.4-0.69-1.4-1.1 0.031-1.9 0.95-3.2 3.4-1 2.1-1.6 3.8-1.4 4.1 0.27 0.33 0.49 0.3 1.2-0.17zm-1.7 0.39c-0.25-0.46-0.085-1.3 0.55-2.8 1.5-3.6 3.5-5.6 5-5 0.26 0.095 0.6 0.17 0.74 0.17 0.38 0 0.34 0.68-0.14 2.2-0.52 1.6-0.52 2.4 0.0096 3.5 0.65 1.3 1.9 2 2.8 1.4 0.59-0.41 0.77-0.29 0.32 0.21-0.44 0.48-0.65 0.5-2 0.23-0.83-0.17-1.8-1.4-2-2.6-0.06-0.32-0.15-0.58-0.21-0.58-0.055 1.5e-4 -0.3 0.31-0.54 0.7-0.58 0.92-2 2.3-2.7 2.6-0.78 0.37-1.6 0.33-1.8-0.08zm-12 1.5c-0.15-0.093-0.081-0.75 0.28-2.8 1.1-6.1 1.6-10 1.9-15 0.14-2.2 0.19-2.6 0.47-2.9 0.17-0.17 0.31-0.23 0.31-0.14 0 0.098-0.21 2.4-0.47 5.1-0.83 8.6-1.8 16-2.1 16-0.086 0.027-0.24-6e-3 -0.35-0.072zm73-3.7c0.67-0.44 2.1-2.1 2.1-2.5 0-0.89-2.3 0.95-2.9 2.3-0.37 0.88-0.28 0.91 0.79 0.2zm9.5 4.6c-1.7-0.6-2.2-2.3-1.4-6.5 0.055-0.54 0.49-2.2 0.51-2.7-0.13 9e-3 -0.89 0.067-1.7 0.13-1.2 0.094-1.4 0.076-1.4-0.11 0-0.29 0.66-0.42 2.1-0.42 0.61-1e-3 1-0.091 1.1-0.15 0.097-0.063 0.34-1 0.67-2.2 0.33-1.2 0.93-2.2 1-2.2 0.076 0 0.087 0.12 0.024 0.27-0.14 0.33-1.2 3.8-1.2 4-3e-3 0.064 1.1 0.12 2.5 0.12 1.9 0 2.5 0.044 2.4 0.2-0.048 0.14-0.74 0.21-2.6 0.24-2.2 0.038-2.5 0.074-2.6 0.31-0.3 0.95-0.73 3.5-0.82 4.7-0.17 2.5 0.87 3.6 2.3 3.9 1.7 0.4 5-1.1 8.7-3.8l0.62-0.46-0.62 0.56c-1.9 1.7-4.8 3.9-6.9 4.4-1.4 0.37-1.9-0.04-2.8-0.33zm-27 1c-0.68-0.2-1-0.61-1-1.2 0-0.85 1.2-2.4 3-3.7 1.7-1.3 1.8-1.2 0.4 0.071-1.8 1.7-2.6 3-2.6 3.5 0 0.87 1.3 0.87 4.7 0.6 4.6-0.37 7.6-0.74 8.5-1.6 1.3-1.2 0.36-2.3-3.9-4.8-2.4-1.4-3.4-2.2-4.1-3.1-1.3-1.7-1.4-4-0.35-6.2 1.5-3.2 4-5.8 6.7-7.1 1.9-0.88 4.2-0.8 4.8 0.17 0.42 0.78 0.073 1.7-1.1 3-0.76 0.84-0.84 0.89-1 0.63-0.11-0.15-0.21-0.33-0.21-0.38 0-0.054 0.37-0.4 0.82-0.76 1.4-1.1 1.7-1.9 1-2.5-0.74-0.69-3.3-0.15-5.4 1.2-2.7 1.7-5.3 5.4-5.8 8-0.15 0.71-0.083 1.1 0.12 1.9 0.47 1.9 1.6 2.7 5 4.7 3.3 1.9 4.5 3.5 4.5 4.6 0 0.67-0.83 1.4-2.1 1.8-1.3 0.43-4.4 1.1-6.3 1.3-1.7 0.19-5.1 0.19-5.8 2e-3zm18-1.5c-0.78-0.4-1.1-0.98-1.2-2-0.058-0.7-0.12-0.86-0.31-0.78-0.24 0.093-0.66-0.16-0.66-0.4 0-0.075 0.24-0.14 0.53-0.14 0.48 0 0.55-0.066 0.84-0.74 0.9-2.1 3.1-4 3.5-2.9 0.25 0.66-0.92 2.3-2.3 3.2-1.4 0.89-1.1 1.1-1.1 1.8 0 1.3 0.58 1.6 2.4 1.6 1.2 0 2.7-0.18 4-0.88 0.74-0.4 0.8-0.42 0.4-0.091-1.6 1.3-4.9 2-6.2 1.4zm-53 20c1.4-0.83 2.3-3.3 3.2-8.2 0.58-3.4 1.4-12 1.2-13-0.046-0.046-0.48 0.22-0.97 0.6-2.5 1.9-6.3 7.7-7.4 11-0.68 2.2-0.8 5.4-0.26 6.7 0.37 0.89 1 1.6 1.9 2.1 0.93 0.53 1.7 0.58 2.4 0.15zm-1.7 0.64c-1.2-0.4-2.3-1.4-2.9-2.7-0.79-1.7-0.87-4.4-0.21-6.9 0.35-1.3 1.5-4 2.4-5.3 1.5-2.3 3.7-4.8 5.6-6.3l1.2-0.98 0.08-3.4c0.086-3.6 0.26-4.6 0.71-4.2 0.2 0.2 0.2 0.28 0.037 0.48-0.14 0.17-0.24 1.2-0.33 3.5-0.07 1.8-0.11 3.2-0.094 3.3 0.018 0.018 0.52-0.28 1.1-0.66 0.6-0.38 1.3-0.77 1.5-0.87 0.43-0.18 0.44-0.22 0.36-0.95-0.1-0.86 0.16-0.98 0.42-0.19 0.2 0.61 0.16 0.6 0.75 0.3l0.52-0.26-0.62 0.54c-0.61 0.54-0.62 0.55-0.35 0.95 0.6 0.92 1.3 0.94 2 0.062 0.4-0.49 0.49-0.76 0.54-1.6 0.062-0.98 0.049-1-0.48-1.6-0.48-0.48-0.65-0.55-1.3-0.55-0.76-2e-3 -1.3-0.2-1.1-0.4 0.057-0.057 0.69-0.12 1.4-0.13 1.2-0.027 1.4-0.08 3.2-0.9 5.8-2.7 6.1-2.8 7-2.6 0.61 0.15 1 0.95 1 2-3.1e-4 0.47-0.18 2.8-0.39 5.2-0.21 2.4-0.39 4.7-0.39 5.2-4.7e-4 0.88-0.16 1.1-0.48 0.74-0.22-0.27-0.072-2.7 0.48-7.7 0.45-4.1 0.39-4.9-0.43-5.1-0.51-0.13-2.3 0.55-4.8 1.8-1.2 0.59-2.5 1.2-3 1.3-1.4 0.39-1.4 0.34-0.91 0.81 0.49 0.51 0.89 1.4 0.89 2-0.0049 0.63-0.51 1.7-1 2-0.61 0.48-1.6 0.46-2.2-0.044-0.23-0.21-0.41-0.46-0.41-0.55 0-0.3-0.32-0.17-1.9 0.8l-1.5 0.96-0.1 1.8c-0.35 6.2-0.57 8.6-1.2 12-0.52 3.1-1.1 5.1-1.6 6-0.8 1.3-2.4 2.1-3.5 1.7zm-14 0.4c-0.37-0.27-0.31-0.95 0.47-5 0.3-1.6 1-5.5 1.6-8.8 2.3-13 3.7-19 6.7-28l0.45-1.4-3 3c-3.2 3.2-4.4 4.2-4.8 3.8-0.3-0.3-1.6-4.6-1.6-5.3-0.0044-0.92 0.27-0.84 0.47 0.14 0.25 1.2 1.2 4.5 1.4 4.6 0.39 0.39 2-1 5-4.5 3.1-3.5 3.6-4.1 3.8-3.8 0.065 0.11-0.071 0.38-0.32 0.64-0.24 0.25-0.44 0.65-0.46 0.89-0.015 0.24-0.49 1.9-1.1 3.7-2.7 8.5-4.1 15-6.2 27-0.52 3-1.2 6.8-1.5 8.4-0.39 2.1-0.52 3.2-0.45 3.7 0.12 0.91-0.15 1.4-0.61 1.1z" stroke-width=".16"/></g></svg>
				<?php endif; 
				/*
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$major_set_be_description = get_bloginfo( 'description', 'display' );
				if ( $major_set_be_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $major_set_be_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif;  */ ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'major_set_be' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
