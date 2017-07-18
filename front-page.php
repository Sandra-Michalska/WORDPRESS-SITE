<?php
/**
 * Custom front-page.php template.
 *
 * Used to display the homepage of your WordPress site.
 */

get_header();?>

<script type="text/javascript">
	document.body.onload = function () {
		homeFullHeight();
	}
</script>

<div id="div-home">
	<section id="section-home">
		<img src="<?php image_in_right_language("setting_logo_big_"); ?>" alt="project logo">
		<p><a href="<?php subpage_in_right_language("/#section1", "/#section1"); ?>"><span><?php get_global_string(learn_more); ?></span></a></p>
	</section>
	
	<section class="sections center section-bg-color1" id="section1">
		<h2><?php echo pll__($frontpage_section1_heading); ?></h2>
		<div id="section1_div1">
			<h3><?php echo pll__($frontpage_section1_heading1); ?></h3>
			<p><?php echo pll__($frontpage_section1_heading1_text); ?></p>
		</div>
		<div id="section1_div2">
			<h3><?php echo pll__($frontpage_section1_heading2); ?></h3>
			<p><?php echo pll__($frontpage_section1_heading2_text); ?></p>
		</div>
		<div id="section1_div3">
			<h3><?php echo pll__($frontpage_section1_heading3); ?></h3>
			<p><?php echo pll__($frontpage_section1_heading3_text); ?></p>
		</div>
		<p class="clear"></p>
	</section>

	<section class="sections center" id="section2">
		<h2><?php echo pll__($frontpage_section2_heading); ?></h2>
		<p><?php echo pll__($frontpage_section2_text); ?></p>
	</section>

	<section class="sections section-bg-color1" id="section3">
		<h2 class="center"><?php echo pll__($frontpage_section3_heading); ?></h2>			
			<div id="section3-div2">
				<img src="<?php echo get_theme_mod('setting_image_ktos');?>" alt="ktos">
			</div>
			<div id="section3-div1">
				<p><?php echo pll__($frontpage_section3_text); ?></p>
			</div>
		<p class="clear"></p>
	</section>

	<section class="sections section-bg-color2" id="section4">
		<h2 class="center"><?php echo pll__($frontpage_section4_heading); ?></h2>
		<div id="section4-div1">
			<img src="<?php echo get_theme_mod('setting_image_ktos2');?>" alt="ktos2">
		</div>
		<div id="section4-div2">
			<p><?php echo pll__($frontpage_section4_text); ?></p>
		</div>
		<p class="clear"></p>
	</section>

	<section class="sections center section-kontakt">
		<div>
			<h2><span><?php echo pll__($contact_section); ?></span></h2>
			<p><a href="mailto:somemail.pl">somemail.pl</a></p>
		</div>
	</section>
</div>

<?php get_footer();?>