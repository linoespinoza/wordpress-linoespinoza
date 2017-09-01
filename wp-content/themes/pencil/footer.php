<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pencil
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php echo wp_kses_post( get_theme_mod( 'footer_text', '<a href="https://wordpress.org/">Proudly powered by WordPress</a><span class="sep"> | </span>Theme: Pencil by <a href="http://fatthemes.com">Fat</a>' ) ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<div class="pencil-search-panel">
	<button class="pencil-search-panel-close"><span class="fa fa-close"></span></button>
	<?php get_search_form(); ?>
</div>
<?php wp_footer(); ?>

</body>
</html>
