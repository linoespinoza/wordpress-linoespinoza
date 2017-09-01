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
	
		<header class="entry-header row">
				
				<div class="entry-meta col-md-2 col-sm-3 col-xs-4">
			<?php pencil_posted_on(); ?>
		</div><!-- .entry-meta -->
			
		<?php the_title( '<h1 class="entry-title col-md-10 col-sm-9 col-xs-8">', '</h1>' ); ?>

	</header><!-- .entry-header -->

		<div class="row">
		
	<div class="entry-content col-md-10 col-md-push-2">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer col-md-12">
		<?php pencil_entry_footer(); ?>
	</footer><!-- .entry-footer -->
		
		</div><!-- .row -->
		
</article><!-- #post-## -->

