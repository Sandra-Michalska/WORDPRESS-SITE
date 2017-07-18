<?php
/**
 * The template for displaying the head elements, header, sidebar menu.
 *
 * Contains the opening of the "site-content" div.
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title(); ?> <?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href='http://fonts.googleapis.com/css?family=Habibi&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Hind&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="body">
<header>
	<nav id="navmenu">
		<a href="<?php echo get_settings('home'); ?>"><img src="<?php image_in_right_language("setting_logo_small_"); ?>" id="navmenu-logo" alt="project logo"></a>
		<ul>
			<li><a href="<?php subpage_in_right_language("/aktualnosci/", "/news/"); ?>"><?php get_global_string(nav1); ?></a></li>
			<li><a href="<?php subpage_in_right_language("/produkt/", "/product-2/"); ?>"><?php get_global_string(nav2); ?></a></li>
			<li><a href="<?php subpage_in_right_language("/kontakt/", "/contact/"); ?>"><?php get_global_string(nav3); ?></a></li>
			<li><a href="<?php subpage_in_right_language("/skomentuj/", "/feedback/"); ?>"><?php get_global_string(nav4); ?></a></li>
		</ul>
		<a id="flag1" href="<?php echo site_url(); ?>/pl/"><img src="<?php echo get_theme_mod('setting_image_flag_pol');?>" alt="flag 1"></a>
		<a id="flag1" href="<?php flags_redirect_right_subpage2(); ?>"><img src="<?php echo get_theme_mod('setting_image_flag_pol');?>" alt="flag 1"></a>
		<a id="flag2" href="<?php flags_redirect_right_subpage1(); ?>"><img src="<?php echo get_theme_mod('setting_image_flag_eng');?>" alt="flag 2"></a>
		<p id="navmenu-menu">MENU</p>
	</nav>
</header>
<div id="content" class="site-content">
	<div id="sidebar-menu">
		<p id="sidebar-x">X</p>
		<ul>
			<li><a class="sidebarmenu-links" id="sidebarmenu-link-scroll" href="<?php echo get_settings('home'); ?>"><?php get_global_string(nav_home); ?></a></li>
				<ul>
					<li><a id="link-section1" class="sidebarmenu-sublinks" href="<?php subpage_in_right_language("/#section1", "/#section1"); ?>"><?php get_global_string(frontpage_section1_heading); ?></a></li>
					<li><a id="link-section2" class="sidebarmenu-sublinks" href="<?php subpage_in_right_language("/#section2", "/#section2"); ?>"><?php get_global_string(frontpage_section2_heading); ?></a></li>
					<li><a id="link-section3" class="sidebarmenu-sublinks" href="<?php subpage_in_right_language("/#section3", "/#section3"); ?>"><?php get_global_string(frontpage_section3_heading); ?></a></li>
					<li><a id="link-section4" class="sidebarmenu-sublinks" href="<?php subpage_in_right_language("/#section4", "/#section4"); ?>"><?php get_global_string(frontpage_section4_heading); ?></a></li>
				</ul>
			<li><a class="sidebarmenu-links sidebarmenu-links-scroll" href="<?php subpage_in_right_language("/aktualnosci/", "/news/"); ?>"><?php get_global_string(nav1); ?></a></li>
			<li><a class="sidebarmenu-links sidebarmenu-links-scroll" href="<?php subpage_in_right_language("/product/", "/product-2/"); ?>"><?php get_global_string(nav2); ?></a></li>
			<li><a class="sidebarmenu-links sidebarmenu-links-scroll" href="<?php subpage_in_right_language("/kontakt/", "/contact/"); ?>"><?php get_global_string(nav3); ?></a></li>
			<li><a class="sidebarmenu-links sidebarmenu-links-scroll" href="<?php subpage_in_right_language("/skomentuj/", "/feedback/"); ?>"><?php get_global_string(nav4); ?></a></li>
			
		</ul>
	</div>
