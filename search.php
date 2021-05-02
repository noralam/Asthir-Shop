<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Asthir Shop
 */

get_header();


$asthir_plus_blog_container = get_theme_mod( 'asthir_blog_container', 'container');


if( is_active_sidebar( 'sidebar-1' ) ||  is_active_sidebar( 'sidebar-left' )  ) {
	$asthir_plus_column_set = '9';
}else{
	$asthir_plus_column_set = '12';
}

?>
<div class="<?php echo esc_attr($asthir_plus_blog_container); ?> mt-3 mb-5 pt-5 pb-3">
	<div class="row">
		<div class="col-lg-<?php echo esc_attr($asthir_plus_column_set); ?>">
			<main id="primary" class="site-main">

				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;
					$asthir_plus_blog_style = get_theme_mod( 'asthir_plus_blog_style','style2'  );

					if( $asthir_plus_blog_style == 'style2' && ( ! is_single() ) ):
						?>
						<div class="bs-gridh">
						<div class="row bs-grid">
					<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;
					if( $asthir_plus_blog_style == 'style2' && ( !is_single() ) ):
						?>
						</div>
						</div>
					<?php
					endif;
				//	the_posts_navigation();
					the_posts_pagination();
				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</main><!-- #main -->
		</div>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ||  is_active_sidebar( 'sidebar-left' ) ): ?>
		<?php $asthir_plus_widget_style = get_theme_mod('asthir_plus_widget_style', '2'); ?>
		<div class="col-lg-3">
			<div class="asthir-widgets<?php echo esc_html($asthir_plus_widget_style); ?>">
				<div class="top-sidebar">
					<?php get_sidebar(); ?>
				</div>
				<aside id="left-widget" class="widget-area">
					<?php dynamic_sidebar( 'sidebar-left' ); ?>
				</aside>
			</div>
		</div>
	<?php endif; ?>
	</div> <!-- end row -->
</div> <!-- end container -->

<?php
get_footer();