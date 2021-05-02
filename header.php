<?php
/**
 * The header for our theme 
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Asthir Shop
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
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'asthir-shop' ); ?></a>
<?php 
$asthir_plus_extralogo = get_theme_mod( 'asthir_plus_extralogo' );
$asthir_plus_header_style = get_theme_mod( 'asthir_header_style', 'style1' );
$asthir_plus_navlogo = get_theme_mod( 'asthir_plus_navlogo', 1 );
?>

	<header id="masthead" class="asthir-header site-header">
		<?php if(has_header_image() && empty($asthir_plus_extralogo) ): ?>
			<div class="asthir-header-img-top">
				<?php the_header_image_tag(); ?>
			</div>
		<?php endif; ?>
		
		<?php

		if($asthir_plus_header_style == 'style1'){
			if($asthir_plus_extralogo){
				do_action( 'asthir_logo_text' );
			}
			if($asthir_plus_navlogo){
				do_action( 'asthir_plus_main_menulogo' );
			}else{
				do_action( 'asthir_main_menu' );
			}
		}else{
			if($asthir_plus_navlogo){
				do_action( 'asthir_plus_main_menulogo' );
			}else{
				do_action( 'asthir_main_menu' );
			}
			if($asthir_plus_extralogo){
				do_action( 'asthir_logo_text' );
			}

		}

		 ?>
	</header><!-- #masthead -->