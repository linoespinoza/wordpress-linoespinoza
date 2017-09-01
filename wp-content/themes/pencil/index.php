<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pencil
 */

get_header(); ?>
	 <div class="row">
	<div id="primary" class="content-area<?php
					$pencil_home_page_layout = get_theme_mod( 'home_page_layout', 'masonry' );
					echo ( empty( $pencil_home_page_layout ) ) ? ' col-md-12' : ' col-md-8'; ?>">
			<div class="pencil-page-intro">
						<?php echo esc_html__( 'Latest Posts', 'pencil' );?>
			</div>
		<main id="main" class="site-main row masonry-container" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
							<?php if ( ! is_sticky() ) : ?>
				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content-home', get_theme_mod( 'home_page_layout', 'masonry' ) );
				?>
							<?php endif; ?>
			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if ( ! empty( $pencil_home_page_layout ) ) { get_sidebar();} ?>
	</div><!-- .row -->
<?php get_footer(); ?>
