<?php /* Template Name: Aktualnosci */ ?>

<?php get_header();?>
	
<div id="div-aktualnosci">
	<section class="section-top">
		<img src="<?php image_in_right_language("setting_logo_medium_"); ?>" alt="logo">
		<h1><span><?php echo pll__($news_heading); ?></span></h1>
	</section>
	
	<section class="sections section-bg-color1">
		<img src="<?php echo get_theme_mod('setting_image_aktual1');?>" alt="img" class="image-center">
		<h2><?php echo pll__($news_section1_heading); ?></h2>
		<p><?php echo pll__($news_section1_text1); ?><p>
		<p><?php echo pll__($news_section1_text2); ?><p>
	</section>

	<section class="sections section-bg-color3">
		<img src="<?php echo get_theme_mod('setting_image_aktual2');?>" alt="img" class="image-center">
		<h2><?php echo pll__($news_section2_heading); ?></h2>
		<p><?php echo pll__($news_section2_text); ?><p>
	</section>

	<section class="sections section-bg-color1">
		<img src="<?php echo get_theme_mod('setting_image_aktual3');?>" alt="img" class="image-center">
		<h2><?php echo pll__($news_section3_heading); ?></h2>
		<p><?php echo pll__($news_section3_text1); ?><p>
		<p><?php echo pll__($news_section3_text2); ?><p>
	</section>
	
	<section class="sections center section-kontakt">
		<div>
			<h2><span><?php echo pll__($contact_section); ?></span></h2>
			<p><a href="mailto:somemail.pl">somemail.pl</a></p>
		</div>
	</section>
</div>

<?php get_footer();?>