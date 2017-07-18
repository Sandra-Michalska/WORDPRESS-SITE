<?php /* Template Name: Skomentuj */ ?>

<?php get_header(); ?>

<div id="div-skomentuj">
	<section class="section-top">
		<img src="<?php image_in_right_language("setting_logo_medium_"); ?>" alt="logo">
		<h1><span><?php echo pll__($feedback_heading); ?></span></h1>
	</section>
		
	<section class="sections section-bg-color1" id="section-ankieta">
		<h2 class="center"><?php echo pll__($feedback_survey);?></h2>
	
		<?php 
		if (strpos($_SERVER['REQUEST_URI'], "skomentuj") !== false) {
			if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 2 ); };
		}

		if (strpos($_SERVER['REQUEST_URI'], "feedback") !== false) {
			if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 3 ); };
		}
		?>
	</section>
	
	<section class="sections section-bg-color2" id="section-komentarz">
		<h2 class="center"><?php echo pll__($feedback_comments);?></h2>

		<form method="post" id="comment-form" action="<?php subpage_in_right_language("/pl/ajax/", "/en/ajax2/"); ?>" novalidate>
			<p id="comment-status" class="comment-bold"><?php echo pll__($feedback_survey_text); ?></p>
			
			<p class="comment-bold"><label for="author"><?php echo pll__($feedback_survey_name); ?> <span>*</span></label><br/></p>
			<input id="author" name="author" type="text" placeholder="<?php echo pll__($feedback_survey_placeholder_name); ?>">
		  
			<p class="comment-bold"><label for="email"><?php echo pll__($feedback_survey_email); ?> <span>*</span></label><br/></p>
			<input id="email" name="email" type="text" placeholder="<?php echo pll__($feedback_survey_placeholder_email); ?>">
		  
			<p class="comment-bold"><label for="comment"><?php echo pll__($feedback_survey_comment); ?> <span>*</span></label><br/></p>
			<textarea id="comment" name="comment" placeholder="<?php echo pll__($feedback_survey_placeholder_comment); ?>"></textarea>	
			
			<input name="submit" type="submit" id="comment-button" value="<?php echo pll__($feedback_survey_submit); ?>">
			
		</form>
	</section>
	
	<section class="sections section-bg-color1" id="section-komentarze-dodane">
		<div id="komentarze-dodane">
			<header>
				<h2><?php echo pll__($feedback_comments_added); ?></h2>
			</header>

			<ol id="posts-list">
				<!-- Display all comments from db -->
				<?php
				libxml_use_internal_errors(true);
				libxml_clear_errors();
				$file = $_SERVER['DOCUMENT_ROOT'] . "\wordpress\wp-content\\themes\custom wp theme\commentTemplate.html";
				echo $DOCUMENT_ROOT;
				$doc = new DOMDocument();
				$doc_object = $doc->loadHTMLFile($file);
				$doc_str = $doc->saveHTML();
				
				$db_data = $wpdb->get_results( 'SELECT id, date, author, comment FROM ajax_form_data ORDER BY id DESC', OBJECT );
				foreach($db_data as $id) {
					$doc_str_db_data = str_replace(["date-to-replace", "author-to-replace", "comment-to-replace"], [$id->date, $id->author, $id->comment], $doc_str);
					echo $doc_str_db_data;
				}
				?>
			</ol>
		</div>
	</section>
</div>

<?php get_footer();?>