<?php 
/*This file is part of BeShop child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

if ( ! defined( 'ASTHIR_PLUS_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ASTHIR_PLUS_VERSION', '1.0.1' );
}



function asthir_plus_fonts_url() {
	$fonts_url = '';

		$font_families = array();

		$font_families[] = 'Oxygen:400,500,700';
		$font_families[] = 'Rubik:400,500,500i,700,700i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );


	return esc_url_raw( $fonts_url );
}


function asthir_plus_enqueue_child_styles() {
	wp_enqueue_style( 'asthir-shop-google-font',asthir_plus_fonts_url(), array(), null );
	wp_enqueue_style( 'asthir-shop-parent-style', get_template_directory_uri() . '/style.css',array('asthir-main','asthir-google-font', 'asthir-default','asthir-woocommerce-style'), '', 'all');
   wp_enqueue_style( 'asthir-shop-main',get_stylesheet_directory_uri() . '/assets/css/main.css',array(), ASTHIR_PLUS_VERSION, 'all');

   	wp_enqueue_script( 'masonry.pkgd-js', get_stylesheet_directory_uri() . '/assets/js/masonry.pkgd.js',array('jquery'), ASTHIR_PLUS_VERSION, false );
   	wp_enqueue_script( 'asthir-shop-main-js', get_stylesheet_directory_uri() . '/assets/js/main.js',array('jquery'), ASTHIR_PLUS_VERSION, true );

  
}
add_action( 'wp_enqueue_scripts', 'asthir_plus_enqueue_child_styles');




/**
 * Customizer additions.
 */
 require get_stylesheet_directory() . '/inc/customizer.php';


 function asthir_plus_body_class( $classes ) {
	$asthir_plus_widget_style = get_theme_mod('asthir_plus_widget_style', '2');

		$classes[] = 'asthir-widget'.$asthir_plus_widget_style;

		return $classes;
 }
 add_action('body_class','asthir_plus_body_class');
// // Nav walker for menu


function asthir_plus_main_menu_witthlogo_display(){
	$asthir_plus_menu_position = get_theme_mod( 'asthir_menu_position', 'right' );

?>
		<div class="asthir-main-nav bg-dark text-white">
			<div class="container">
				<div class="asthir-nav-logo">
					<div class="row">
						<div class="col-lg-auto mr-auto col-sm-9">
							<div class="asthir-logotext asthir-menulogo text-left">
								<?php the_custom_logo(); ?>
							<?php if (display_header_text() == true || (display_header_text() == true && is_customize_preview()) ): ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
								$asthir_plus_description = get_bloginfo( 'description', 'display' );
								if ( $asthir_plus_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo $asthir_plus_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
								<?php endif; ?>	
								<?php endif; ?>	
							</div>
						</div>
						<div class="asthir-shop-col col-lg-auto col-sm-3">
							<nav id="site-navigation" class="main-navigation text-<?php echo esc_attr($asthir_plus_menu_position); ?>">
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="mshow"><?php esc_html_e( 'Menu', 'asthir-shop' ); ?></span><span class="mhide"><?php esc_html_e( 'Close Menu', 'asthir-shop' ); ?></span></button>
								<?php
								if ( has_nav_menu( 'menu-1' ) ) {

									wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
										'walker'        => new Asthir_Walker_Nav_Menu(),
									)
									);

								} elseif ( ! has_nav_menu( 'expanded' ) ) { ?>
								<ul id="primary-menu" class="menu nav-menu">
								<?php
									wp_list_pages(
										array(
											'match_menu_classes' => true,
											'show_sub_menu_icons' => true,
											'title_li' => false,
											'walker'   => new Asthir_Walker_Page(),
										)
									);
									?>
								</ul>
								<?php

								}
								
								?>
								<button class="screen-reader-text mmenu-hide"><?php esc_html_e( 'Close Menu', 'asthir-shop' ); ?></button>
							</nav><!-- #site-navigation -->
						</div>
					</div>
				</div>
			</div>
		</div>

<?php
	}
add_action('asthir_plus_main_menulogo','asthir_plus_main_menu_witthlogo_display');


