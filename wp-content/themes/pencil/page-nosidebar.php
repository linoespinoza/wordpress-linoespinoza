<?php
/**
 * Template Name: No Sidebar
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pencil
 */

get_header(); ?>
<div class="row">
		<div id="primary" class="content-area col-md-8 col-md-offset-2">
		<main id="main" class="site-main row" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-12' ); ?>>
									<div class="row">
										<header class="entry-header">

												<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

										</header><!-- .entry-header -->


										<div class="entry-content">
												<?php the_content(); ?>
												<?php
														wp_link_pages( array(
																'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pencil' ),
																'after'  => '</div>',
														) );
												?>
										</div><!-- .entry-content -->

										<footer class="entry-footer">
												<?php edit_post_link( esc_html__( 'Edit', 'pencil' ), '<span class="edit-link">', '</span>' ); ?>
										</footer><!-- .entry-footer -->

									</div><!-- .row -->

								</article><!-- #post-## -->

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .row -->
<?php get_footer(); ?>
