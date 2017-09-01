<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pencil
 */

get_header(); ?>
	 <div class="row">
	<div id="primary" class="content-area<?php
					$pencil_home_page_layout = get_theme_mod( 'home_page_layout', 'masonry' );
					echo ( empty( $pencil_home_page_layout ) ) ? ' col-md-12' : ' col-md-8'; ?>">

			<div class="pencil-page-intro">
						<?php echo esc_html__( 'Error 404', 'pencil' ); ?>
			</div>
			
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
							<div class="pencil-404">
								<h1>404</h1>
							</div>
				<div class="page-content">
									<p><?php printf( '<span class="lead">%s</span><br/>%s', esc_html__( 'It looks like nothing was found at this location.', 'pencil' ), esc_html__( 'Maybe try a search?', 'pencil' ) ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
		
	</div><!-- #primary -->

<?php if ( ! empty( $pencil_home_page_layout ) ) { get_sidebar(); } ?>
	</div><!-- .row -->
<?php get_footer(); ?>
