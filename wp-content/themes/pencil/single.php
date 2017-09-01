<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pencil
 */

get_header(); ?>
<div class="row">
		<div id="primary" class="content-area col-md-8<?php if ( ! get_theme_mod( 'single_page_sidebar', 1 ) ) { echo ' col-md-offset-2'; } ?>">
		<main id="main" class="site-main row" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
					
					<?php if ( is_attachment() ) : ?>
					<div class="col-md-12">
						<div class="category-list">
							<?php echo esc_html__( 'Attachment page', 'pencil' );?>
						</div>
					</div>
					
					<?php elseif ( is_single() ) : ?>
					<div class="col-md-12">
						<div class="category-list">
							<?php echo wp_kses_post( get_the_category_list( esc_html__( ' &#x2f; ', 'pencil' ) ) );?>
						</div>
					</div>
					<?php endif; ?>
					
			<?php get_template_part( 'template-parts/content-single', get_post_format() ); ?>
					
			<?php if ( get_theme_mod( 'single_post_navigation', 1 ) ) :

							the_post_navigation(
									array(
										'prev_text'          => '<div class="pencil-previous-article">' . esc_html__( 'Previous article', 'pencil' ) . '</div><div class="pencil-previous-article-title">%title</div>',
										'next_text'          => '<div class="pencil-next-article">' . esc_html__( 'Next article', 'pencil' ) . '</div><div class="pencil-next-article-title">%title</div>',
										// 'screen_reader_text' => __( 'Post navigation' ),
										)
							);

						endif; ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php if ( get_theme_mod( 'single_page_sidebar', 1 ) ) { get_sidebar(); } ?>
</div><!-- .row -->
<?php get_footer(); ?>
