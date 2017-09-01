<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pencil
 */

?>

<section class="no-results not-found col-md-12">

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php // Translators: comments number.
				printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'pencil' ), array(
	'a' => array(
		'href' => array(),
	),
) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php printf( '<span class="lead">%s</span><br/>%s', esc_html__( 'Sorry, but nothing matched your search terms.', 'pencil' ), esc_html__( 'Please try again with some different keywords.', 'pencil' ) ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php printf( '<span class="lead">%s</span><br/>%s', esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'pencil' ), esc_html__( 'Perhaps searching can help.', 'pencil' ) ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
