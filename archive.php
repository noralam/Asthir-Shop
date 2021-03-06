<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Asthir
 */

get_header();
$asthir_plus_blog_container = get_theme_mod( 'asthir_blog_container', 'container');
if ( is_active_sidebar( 'sidebar-1' ) && is_active_sidebar( 'sidebar-left' )  ) {
	$asthir_plus_column_set = '6';
}elseif ( is_active_sidebar( 'sidebar-1' ) ||  is_active_sidebar( 'sidebar-left' )  ) {
	$asthir_plus_column_set = '9';
}else{
	$asthir_plus_column_set = '12';
}


?>
<div class="<?php echo esc_attr($asthir_plus_blog_container); ?> mt-5 mb-5 pt-3 pb-3">
	<div class="row">
		<?php if ( is_active_sidebar( 'sidebar-left' ) ): ?>
			<div class="col-lg-3">
				<aside id="left-widget" class="widget-area">
				<?php dynamic_sidebar( 'sidebar-left' ); ?>
				</aside>
			</div>
		<?php endif; ?>
		<div class="col-lg-<?php echo esc_attr($asthir_plus_column_set); ?>">
			<main id="primary" class="site-main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header archive-header text-center mb-5">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<?php
					$asthir_plus_plus_blog_style = get_theme_mod( 'asthir_plus_blog_style','style2'  );

					if( $asthir_plus_plus_blog_style == 'style2' && ( ! is_single() ) ):
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
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;
					if( $asthir_plus_plus_blog_style == 'style2' && ( !is_single() ) ):
						?>
						</div>
						</div>
					<?php
					endif;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</main><!-- #main -->
		</div>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ): ?>
		<div class="col-lg-3">
			<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>
	</div> <!-- end row -->
</div> <!-- end container -->

<?php
get_footer();