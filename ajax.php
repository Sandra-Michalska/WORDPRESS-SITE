<?php /* Template Name: Ajax */ ?>

<?php
	// Get field values sent with the POST request
	$author = htmlspecialchars($_POST['author']);
	$email  = htmlspecialchars($_POST['email']);
	$comment  = htmlspecialchars($_POST['comment']);

	// Localization - sentences used in server side validation
	$polish = array(
		"enterName" 		=> "Wpisz swoje imię<br>",
		"enterNameLetters" 	=> "Imię może zawierać tylko litery<br>",
		"nameMaxLength"		=> "Imię może składać się najwyżej z 20 liter<br>",
		"enterEmail" 		=> "Wpisz swój adres email<br>",
		"enterEmailValid" 	=> "Wpisz poprawny adres email<br>",
		"enterComment"		=> "Wpisz swój komentarz<br>",
		"commentMaxLength"	=> "Komentarz może składać się najwyżej z 300 znaków<br>"
	);
	$english = array(
		"enterName" 		=> "Please enter your name<br>",
		"enterNameLetters" 	=> "Please use letters only<br>",
		"nameMaxLength"		=> "The name can contain no more than 20 letters<br>",
		"enterEmail" 		=> "Please enter your email address<br>",
		"enterEmailValid" 	=> "Please enter a valid email address<br>",
		"enterComment" 		=> "Please enter your comment",
		"commentMaxLength"	=> "The comment can contain no more than 300 signs<br>"
	);
	
	$get_locale2 = get_locale();
	if($get_locale2 == "pl_PL") {
		$language = $polish;
	}
	else if($get_locale2 == "en_US") {
		$language = $english;
	}

	// Form validation
	$errorServerside = "";
	if(empty($author)) {
		$errorServerside = $language["enterName"];
	}
	
	if(!ctype_alpha($author) AND !empty($author)) {
		$errorServerside .= $language["enterNameLetters"];
	}
	
	if(strlen($author) > 20) {
		$errorServerside .= $language["nameMaxLength"];
	}

	if(empty($email)) {
		$errorServerside .= $language["enterEmail"];
	} 
	
	if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email) AND !empty($email)) {
		$errorServerside .= $language["enterEmailValid"];
	}
	
	if(empty($comment)) {
		$errorServerside .= $language["enterComment"];
	}
	
	if(strlen($comment) > 300) {
		$errorServerside .= $language["commentMaxLength"];
	}
	
	// Add form data to the database
	if (!strlen($errorServerside)) {
		
		// Get current date and time
		date_default_timezone_set('Europe/Warsaw'); 
		$date = date('Y/m/d H:i');
		
		global $wpdb;
		$wpdb->query("START TRANSACTION");
		$wpdb->insert( 
			'ajax_form_data', 
			array( 
				'author' => $author,
				'email' => $email,
				'comment' => $comment,
				'date' => $date
			), 
			array( 
				'%s', 
				'%s', 
				'%s',
				'%s'
			) 
		);
		$wpdb->query("COMMIT");
	}
	
	// Load the html template and add form data to it
	libxml_use_internal_errors(true);
	libxml_clear_errors();
	$file = $_SERVER['DOCUMENT_ROOT'] . "\wordpress\wp-content\\themes\custom wp theme\commentTemplate.html";
	$doc = new DOMDocument();
	$doc_object = $doc->loadHTMLFile($file);
	$doc_str = $doc->saveHTML();
	
	$doc_str_db_data = str_replace(["date-to-replace", "author-to-replace", "comment-to-replace"], [$date, $author, $comment], $doc_str);
	
	// Create an array with errors and html template
	$formDataArray = array(
		"errorServerside" => $errorServerside,
		"template" => $doc_str_db_data
	);
	
	// Send response in JSON
	echo json_encode($formDataArray);
?>