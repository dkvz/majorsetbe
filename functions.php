<?php
/**
 * Major Set Be functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Major_Set_Be
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'major_set_be_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function major_set_be_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Major Set Be, use a find and replace
		 * to change 'major_set_be' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'major_set_be', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'major_set_be' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'major_set_be_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/**
		 * Attempting to add styling to the Guntenberg editor.
		 */
		add_theme_support( 'editor-styles' );
		add_editor_style( 'editor-styles.css' );

		/**
		 * Adding the theme colors to Guntenberg:
		 */
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => __( 'Primaire', 'themeLangDomain' ),
				'slug' => 'primary',
				'color' => '#112f41',
			),
			array(
				'name' => __( 'Turquoise', 'themeLangDomain' ),
				'slug' => 'title-1',
				'color' => '#068587',
			),
			array(
				'name' => __( 'Accent 1', 'themeLangDomain' ),
				'slug' => 'accent-1',
				'color' => '#f2b134',
			),
			array(
				'name' => __( 'Accent 2', 'themeLangDomain' ),
				'slug' => 'accent-2',
				'color' => '#ed553b',
			),
			array(
				'name' => __( 'Blanc', 'themeLangDomain' ),
				'slug' => 'background-1',
				'color' => '#fff',
			),
			array(
				'name' => __( 'Clair', 'themeLangDomain' ),
				'slug' => 'background-2',
				'color' => '#e9f6f3',
			),
			array(
				'name' => __( 'Gris', 'themeLangDomain' ),
				'slug' => 'grayed',
				'color' => '#778582',
			),
		) );

	}
endif;
add_action( 'after_setup_theme', 'major_set_be_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function major_set_be_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'major_set_be_content_width', 640 );
}
add_action( 'after_setup_theme', 'major_set_be_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function major_set_be_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'major_set_be' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'major_set_be' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'major_set_be_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function major_set_be_scripts() {
	wp_enqueue_style( 'major_set_be-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'major_set_be-style', 'rtl', 'replace' );

	wp_enqueue_script( 'major_set_be-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'major_set_be_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Seen this on Stackoverflow, I'm trying to disable
 * the "url/website" field in comment forms.
 */
function prefix_disable_comment_url($fields) { 
	unset($fields['url']);
	return $fields;
}
add_filter('comment_form_default_fields','prefix_disable_comment_url');

/**
 * Custom sidebar block I created to hold the social media links
 * because putting the sidebar into the footer for the theme means 
 * I need custom widgets to put things in there
 */
class ms_social_icons_widget extends WP_Widget {
  
  function __construct() {
    parent::__construct(      
      // Base ID of your widget
      'ms_social_icons', 
      // Widget name will appear in UI
      __('Major Set social icons', 'ms_social_icons_domain'), 
      // Widget description
      array( 
        'description' => __( 'Widget for displaying social media links', 'ms_social_icons_domain' ), 
      ) 
    );
  }
    
  // Creating widget front-end
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    
    // before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( empty( $title ) ) $title = "Social";
		echo $args['before_title'] . $title . $args['after_title'];
		?>
		<div class="social-icons">
			<a href="https://www.facebook.com/majorset" target="_blank" rel="noopener noreferrer" title="Visitez notre page Facebook!">
				<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/facebook.svg" alt="Logo Facebook">
				<span class="screen-reader-text">Visitez notre page Facebook!</span>
			</a>
			<a href="https://www.youtube.com/channel/UCkF2fp-EuKz1rnB9hL2HbjA" target="_blank" rel="noopener noreferrer" title="Visitez notre chaîne YouTube!">
				<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/youtube.svg" alt="Logo Youtube">
				<span class="screen-reader-text">Visitez notre chaîne YouTube!</span>
			</a>
			<a href="https://www.instagram.com/major_set/" rel="noopener noreferrer" target="_blank" title="Suivez-nous sur Instagram!">
				<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/instagram.svg" alt="Logo Instagram">
				<span class="screen-reader-text">Suivez-nous sur Instagram!</span>
			</a>
			<a href="https://open.spotify.com/intl-fr/artist/0TrNi8a9FepQer3cU70Ojq?si=u1Rz5ymmQde7iW8hQuWDPQ" target="_blank" rel="noopener noreferrer" title="Ecoutez-nous sur Spotify!">
				<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/spotify.svg" alt="Logo Spotify">
				<span class="screen-reader-text">Ecoutez-nous sur Spotify!</span>
			</a>
		</div>
    <?php
    //echo __( 'SOCIAL ICONS SHOULD BE HERE', 'ms_social_icons_domain' );
    echo $args['after_widget'];
  }
   
  
  // Widget Backend 
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'Title', 'ms_social_icons_domain' );
    }
    // Widget admin form
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php 
  }
  
  /*
  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
  }
  */

} 
 
 
// Register and load the widget
function ms_load_widget() {
  register_widget( 'ms_social_icons_widget' );
}
add_action( 'widgets_init', 'ms_load_widget' );

/**
 * Changes Past Event Reverse Chronological Order
 *
 * @param array $template_vars An array of variables used to display the current view.
 *
 * @return array Same as above. 
 */
function tribe_past_reverse_chronological_v2( $template_vars ) {
 
  if ( ! empty( $template_vars['is_past'] ) ) {
    $template_vars['events'] = array_reverse( $template_vars['events'] );
  }
 
  return $template_vars;
}
// Change List View to Past Event Reverse Chronological Order 
add_filter( 'tribe_events_views_v2_view_list_template_vars', 'tribe_past_reverse_chronological_v2', 100 );
// Change Photo View to Past Event Reverse Chronological Order
add_filter( 'tribe_events_views_v2_view_photo_template_vars', 'tribe_past_reverse_chronological_v2', 100 );