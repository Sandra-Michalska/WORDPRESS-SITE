<?php /* Template Name: Kontakt */ ?>

<?php get_header();?>

<script type="text/javascript">	
	document.body.onload = function () {
		kontaktFullHeight();
	}
</script>

<div id="div-kontakt">
	<section class="section-top">
		<img src="<?php image_in_right_language("setting_logo_medium_"); ?>" alt="logo">
	</section>

	<section class="sections center section-bg-color3" id="section-kontakt">
		<div>
			<h2><?php echo pll__($contact_section); ?></h2>
			<p><?php echo pll__($contact_section_text); ?></p>
			<p><a href="mailto:somemail.pl">somemail.pl</a></p>
		</div>
	</section>
</div>

<?php get_footer();?>