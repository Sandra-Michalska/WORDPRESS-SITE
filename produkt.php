<?php /* Template Name: Produkt */ ?>

<?php get_header();?>

<div id="div-produkt">
	<section class="section-top">
		<img src="<?php image_in_right_language("setting_logo_medium_"); ?>" alt="logo">
		<h1><span><?php echo pll__($product_heading); ?></span></h1>
	</section>
	
	<section class="sections center section-bg-color1">
		<img src="<?php echo get_theme_mod('setting_image_product1');?>" alt="img">
		<h2><?php echo pll__($product_section1_heading); ?></h2>
		<p><?php echo pll__($product_section1_text); ?></p>
	</section>
	
	<section class="sections center section-bg-color2">
		<h2><?php echo pll__($product_section2_heading); ?></h2>
		<p><?php echo pll__($product_section2_text); ?></p>
	</section>
	
	<section class="sections center section-bg-color1">
		<h2><?php echo pll__($product_section3_heading); ?></h2>
		<p><?php echo pll__($product_section3_text1); ?></p>
		<a href="http://www.somewww.pl/" target="_blank"><img src="<?php echo get_theme_mod('setting_image_product3');?>" alt="img"></a>
			<p><?php echo pll__($product_section3_text2); ?></p>
		<a href="http://www.somewww.pl/" target="_blank"><img src="<?php echo get_theme_mod('setting_image_product4');?>" alt="img"></a>
	</section>
	
	<section class="sections center section-kontakt">
		<div>
			<h2><span><?php echo pll__($contact_section); ?></span></h2>
			<p><a href="mailto:somemail.pl">somemail.pl</a></p>
		</div>
	</section>
</div>

<?php get_footer();?>