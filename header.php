<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TempTest
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'temptest' ); ?></a>

	<header id="masthead" class="site-header">
	
		<div class="site-header__top">

			<div class="container">
					<ul class="site-header__list">
						 
							<li class="site-header__item">
								<?php $arg_email_address = get_theme_mod( 'temptest_header_email', 'default_value' );?>
								<a class="site-header__link" href="<?php echo 'mailto:'. $arg_email_address; ?>" >
									<?php 
										if($arg_email_address!==''){
											/*$arg_email_address = "<span class='site-header__text'>".$arg_email_address.'</span>';*/
											echo '<span class="site-header__icon">'.temptest_get_icon_svg('envelope').'</span>'.$arg_email_address; 
										}
										
									?>
								</a>
							</li>
							<li class="site-header__item">
								<?php
									echo get_theme_mod( 'temptest_header_location', 'default_value' );
								?>
							</li>
							<li class="site-header__item">
								<a href="
									<?php
									$arg_phone_number = preg_replace('/\D+/', '', get_theme_mod( 'temptest_header_phone', 'default_value' ));
									echo 'tel:'. $arg_phone_number;							
									?>
								" class="site-header__link" >
									<?php
										if($arg_phone_number!=='')
										echo '<span class="site-header__icon">'.temptest_get_icon_svg('volume-control-phone').'</span>'.get_theme_mod( 'temptest_header_phone', 'default_value' );
									?>						
							</a></li>
						 
					</ul>
				
					
					<nav class="social-navigation ">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . temptest_get_icon_svg( 'link' ),
								'depth'          => 1,
							) );
							?>
					</nav>
					
			</div><!-- end of container -->

		</div>
		
    <div class="site-header__bottom">

		  <div class="container">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$temptest_description = get_bloginfo( 'description', 'display' );
					if ( $temptest_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $temptest_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'temptest' ); ?></button>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav><!-- #site-navigation -->

			</div><!--.contianer -->	
		</div>
		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
