<?php
/**
 * Template part for displaying header slider.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pencil
 */

$pencil_sticky_posts = get_option( 'sticky_posts' );

if ( ! empty( $pencil_sticky_posts ) ) :

	$pencil_slider_posts_array_args = array(
			'posts_per_page'   => 99,
			'offset'           => 0,
			'category'         => '',
			'category_name'    => '',
			'orderby'          => 'date',
			'order'            => 'DESC',
			'include'          => $pencil_sticky_posts,
			'exclude'          => '',
			// 'meta_key'         => 'pencil-meta-slider-checkbox',
			// 'meta_value'       => '1',
			'post_type'        => 'post',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'author'	   => '',
			'post_status'      => 'publish',
			'suppress_filters' => true,
	);
	$pencil_slider_posts_array = get_posts( $pencil_slider_posts_array_args ); ?>
		<div class="container-fluid">
			<div class="row">
				<div class="featured-posts">
					<div class="pencil-featured-slider" style="height:<?php echo absint( get_theme_mod( 'home_page_slider_height', 300 ) ); ?>px">
						
				<?php foreach ( $pencil_slider_posts_array as $slide ) : ?>
						<div class="pencil-featured-slider-wrapper">
							<?php if ( has_post_thumbnail( $slide->ID ) ) : ?>
							
						   <?php $pencil_wp_get_attachment_image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $slide->ID ), get_theme_mod( 'home_page_slider_img_size', 'full' ) ); ?>
							
							<div class="featured-image" style="background:#000 url(<?php echo esc_url( $pencil_wp_get_attachment_image_src[0] ); ?>) no-repeat center;background-size: cover;height:<?php echo absint( get_theme_mod( 'home_page_slider_height', 300 ) ); ?>px;">
							<div class="pencil-featured-slider-title-wrapper">
							<h2 class="pencil-featured-slider-header"><a href="<?php echo esc_url( get_permalink( $slide->ID ) ); ?>" rel="bookmark"><?php echo get_the_title( $slide->ID ) ?></a></h2>
							</div>
							</div>
							<?php else : ?>
							<div class="no-featured-image" style="height:<?php echo absint( get_theme_mod( 'home_page_slider_height', 300 ) ); ?>px;">
							<h2 class="pencil-featured-slider-header"><a href="<?php echo esc_url( get_permalink( $slide->ID ) ); ?>" rel="bookmark"><?php echo get_the_title( $slide->ID ) ?></a></h2>
							</div>
							<?php endif; ?>
						</div>

				<?php endforeach; ?>
						
					</div>
				</div>
			</div>
		</div>
<?php endif; ?>
