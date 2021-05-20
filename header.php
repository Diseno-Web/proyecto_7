<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package proyect7
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div class="loader"><div class="spinner"></div></div>

<!-- HEADER -->
<header class="exalt-sidebar-menu">
	<div class="desktop-menu-btn"></div>
	<div class="mobile-menu-btn"></div>  
	<div class="header-inner"> 

		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
				<img class="logo-icon" src="<?php echo get_custom_logo_src(); ?>" alt="<?php echo img_atributos(get_custom_logo_src())[alt]; ?>">
				<?php if ( is_front_page() && is_home() ) :?>

				<h1 class="logo-text ocultatexto"><?php bloginfo( 'name' ); ?></h1>
				<h2 class="logo-tagline ocultatexto"><?php bloginfo( 'description', 'display' ); ?></h1>

				<?php else : ?>
				<p class="logo-text ocultatexto "><?php bloginfo( 'name' ); ?></p>
				<p class="logo-tagline ocultatexto"><?php bloginfo( 'description', 'display' ); ?></p>
 
				<?php endif; ?>

				<!-- <span class="logo-text"><?php //bloginfo( 'name' ); ?></span> -->
				<!-- <span class="logo-tagline"><?php //bloginfo( 'description', 'display' ); ?></span> -->
			</a>
		</div><!-- navbar-header -->

		<div class="nav-wrap">    
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'menu-primary',
				)
			);
			?>
			    
		<!-- 	<ul id="menu-primary">
				<li><a class="scroll" title="Home" href="#header_banner">Home</a></li>
				<li><a class="scroll" title="About Us" href="#about">Nosotros</a></li>
				<li><a class="scroll" title="Our Services" href="#services">Servicios</a></li> 
				<li><a class="scroll" title="Our Projects" href="#projects">Proyectos</a></li> 
				<li><a class="scroll" title="Testimonial" href="#testimonial">Noticias</a></li>                       
				<li><a class="scroll" title="Contact Us" href="#contact">Contactanos</a></li>
			</ul> -->
		</div>

		<div class="exalt-sidebar-menu-footer">
			<div class="footer-social">
				<ul class="list-inline">
				<?php if(get_option('my_facebook_url')) { ?>
					<li><a href="<?php echo  get_option('my_facebook_url') ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
				<?php } if(get_option('my_twitter_url')) { ?>
					<li><a href="<?php echo  get_option('my_twitter_url') ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
				<?php } if(get_option('my_instagram_url')) { ?>
					<li><a href="<?php echo  get_option('my_instagram_url') ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
				<?php } if(get_option('my_linkedin_url')) { ?>
					<li><a href="<?php echo  get_option('my_linkedin_url') ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
				<?php } ?>
				</ul>
			</div>
			<!-- footer-social -->
			
			<div class="copyright-txt">© 2021 Desarrollado por <a href="http://rogersoto.com"> Roger Soto</a> </div><!-- footer-copyright -->
		</div><!-- salmond-sidebar-menu-footer -->
	</div><!-- header-inner -->
</header><!-- header-area -->
