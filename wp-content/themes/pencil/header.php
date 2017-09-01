<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pencil
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pencil' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
			
		<div class="site-branding">
			<?php $pencil_header_logo = get_theme_mod( 'header_logo' );
						if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php if ( ! empty( $pencil_header_logo ) ) : ?>
							<img src="<?php echo esc_url( get_theme_mod( 'header_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" >
						<?php else : bloginfo( 'name' );
endif; ?>
		</a></h1>
<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php if ( ! empty( $pencil_header_logo ) ) : ?>
							<img src="<?php echo esc_url( get_theme_mod( 'header_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" >
						<?php else : bloginfo( 'name' );
endif; ?>
					</a></p>
			<?php endif; ?>
			<?php if ( empty( $pencil_header_logo ) ) : ?><p class="site-description"><?php bloginfo( 'description' ); ?></p><?php endif;?>
		</div><!-- .site-branding -->
				
				<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'pencil' ); ?></button>
						<div class="nav-func">
						<?php
						$pencil_social_icons_twitter = get_theme_mod( 'social_icons_twitter' );
			$pencil_social_icons_facebook = get_theme_mod( 'social_icons_facebook' );
			$pencil_social_icons_googleplus = get_theme_mod( 'social_icons_googleplus' );
			$pencil_social_icons_instagram = get_theme_mod( 'social_icons_instagram' );
			$pencil_social_icons_pinterest = get_theme_mod( 'social_icons_pinterest' );
			?>
						<?php if ( ! empty( $pencil_social_icons_twitter ) ) : ?><a href="<?php echo esc_url( $pencil_social_icons_twitter ); ?>"><span class="fa fa-twitter fa-lg"></span></a><?php endif; ?>
						<?php if ( ! empty( $pencil_social_icons_facebook ) ) : ?><a href="<?php echo esc_url( $pencil_social_icons_facebook ); ?>"><span class="fa fa-facebook fa-lg"></span></a><?php endif; ?>
						<?php if ( ! empty( $pencil_social_icons_googleplus ) ) : ?><a href="<?php echo esc_url( $pencil_social_icons_googleplus ); ?>"><span class="fa fa-google-plus fa-lg"></span></a><?php endif; ?>
						<?php if ( ! empty( $pencil_social_icons_instagram ) ) : ?><a href="<?php echo esc_url( $pencil_social_icons_instagram ); ?>"><span class="fa fa-instagram fa-lg"></span></a><?php endif; ?>
						<?php if ( ! empty( $pencil_social_icons_pinterest ) ) : ?><a href="<?php echo esc_url( $pencil_social_icons_pinterest ); ?>"><span class="fa fa-pinterest fa-lg"></span></a><?php endif; ?>
						<button class="search-toggle fa fa-search"></button>
						</div>
						<div id="toggled-navbar-bg" >
			<?php wp_nav_menu( array(
	'theme_location' => 'primary',
	'menu_id' => 'primary-menu',
	'container_class' => 'primary-menu',
	'menu_class' => 'primary-menu',
) ); ?>
						</div>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->
		<?php if ( is_home() ) : ?>
			
			<?php get_template_part( 'template-parts/content', 'home-slider' ); ?>
		
		<?php endif; ?>
	<div id="content" class="site-content container">
