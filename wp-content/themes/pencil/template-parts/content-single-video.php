<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pencil
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-12' ); ?>>
	
		<!--<div class="category-list">
				<?php echo wp_kses_post( get_the_category_list( esc_html__( ' &#x2f; ', 'pencil' ) ) );?>
		</div>-->
	
		<header class="entry-header row">
				
				<div class="entry-meta col-md-2">
			<?php pencil_posted_on(); ?>
		</div><!-- .entry-meta -->
			
		<?php the_title( '<h1 class="entry-title col-md-10">', '</h1>' ); ?>

	</header><!-- .entry-header -->
		
		<div class="featured-media row">
				<div class="featured-image col-md-12"> 
				<?php echo hybrid_media_grabber( array( // WPCS: XSS OK.
					'type' => 'video',
					) ); ?>
				</div>
		</div>
		
		<div class="row">
		
	<div class="entry-content col-md-10 col-md-push-2">
		<?php pencil_media_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pencil' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer col-md-12">
		<?php pencil_entry_footer(); ?>
	</footer><!-- .entry-footer -->
		
		</div><!-- .row -->
		
</article><!-- #post-## -->
