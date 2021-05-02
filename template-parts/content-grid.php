<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BeShop Free
 */
$asthir_plus_blogdate = get_theme_mod( 'asthir_blogdate', 1);
$asthir_plus_blogauthor = get_theme_mod( 'asthir_blogauthor', 1);

 ?>
 <div class="col-lg-4 bsgrid-item">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="bshop-single-list">
		<?php asthir_post_thumbnail(); ?>
			<header class="entry-header text-center">
			<?php asthir_single_post_cat(); ?>

					<?php
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

					if ( 'post' === get_post_type() && ( !empty($asthir_plus_blogdate) || !empty($asthir_plus_blogauthor) ) ) :
								?>
								<div class="entry-meta">
									<?php
									if($asthir_plus_blogdate){
									asthir_posted_on();
									}
									if($asthir_plus_blogauthor){
									asthir_posted_by();
									}
									?>
								</div><!-- .entry-meta -->
							<?php endif; ?>
				</header><!-- .entry-header -->


					<div class="entry-content">
							<?php
							the_excerpt();
							?>
					</div><!-- .entry-content -->
				
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>