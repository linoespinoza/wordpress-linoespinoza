<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pencil
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-6 masonry' ); ?>>
	<header class="entry-header">
				<?php if ( has_post_thumbnail() ) : ?>
				<div class="featured-image">
				<a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark">
				<?php the_post_thumbnail( 'medium' ); ?>   
				</a>
				</div>
				<?php endif; ?>
				<?php echo wp_kses_post( pencil_post_format_icon( get_the_ID() ) ); ?>
				<div class="featured-image-cat">
				<?php echo wp_kses_post( get_the_category_list( esc_html__( ' &#x2f; ', 'pencil' ) ) ); ?>
				</div>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php pencil_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->
