var $ = jQuery.noConflict();

$(document).ready(function() {
	
	// Localization - sentences used in client side validation
	var translation = {
		polish : {
			processing:			"Przetwarzanie...",
			error: 				"Błąd. Sprawdź, czy poprawnie wypełniłeś wszystkie pola",
			success: 			"Twój komentarz został wysłany. Dziękujemy",
			error2: 			"Coś poszło nie tak. Spróbuj ponownie pózniej",
			validationAuthor: 	"Wpisz swoje imię (maksymalnie 20 znaków, tylko litery)",
			validationEmail: 	"Wpisz poprawny adres email",
			validationComment: 	"Dodaj swój komentarz (maksymalnie 300 znaków)"
		},
	
		english : {
			processing: 		"Processing...",
			error: 				"Error. You might have left one of the fields blank",
			success: 			"Thanks for your comment. We appreciate your response",
			error2: 			"Something went wrong. Try again in a while",
			validationAuthor: 	"Please enter your name (no more than 20 characters, letters only)",
			validationEmail: 	"Please enter a valid email address",
			validationComment: 	"Please provide a comment (no more than 300 characters)"
		}
	};

	var language;
	if(window.location.href.indexOf('skomentuj') > -1) {
		language = translation.polish;
	} else if (window.location.href.indexOf('feedback') > -1) {
		language = translation.english;
	} else {
		language = translation.english; // default
	}

	var commentForm = $('#comment-form');
	var commentStatus = $('#comment-status');
	
	// Form validation with jQuery Validation Plugin
	// jQuery validation plugin - the lettersonly method added
	jQuery.validator.addMethod("lettersonly", function(value, element) {
		return this.optional(element) || /^[a-z]+$/i.test(value);
	});
	
	commentForm.validate({
		rules: {
			// each key = the name attribute of an input field
			author: {
				required: true,
				maxlength: 20,
				lettersonly: true
			},
			email: {
				required: true,
				email: true
			},
			comment: {
				required: true,
				maxlength: 300
			}
		},

		messages: {
			author: "<br>" + language.validationAuthor,
			email: "<br>" + language.validationEmail,
			comment: "<br>" + language.validationComment
		},
		
		errorPlacement: function(error, element) {
			error.appendTo($(commentStatus));
			error.css("color", "red");
		},
	
		submitHandler: function(form) {
			// Serialize and store form data in a variable ("key=value&key2=value2")
			var formData = commentForm.serialize();
	
			// Comment status - processing
			commentStatus.html("<p>" + language.processing + "</p>");
		
			// Extract action URL from commentForm (form data are sent to this file)
			var formUrl = commentForm.attr('action');

			// Post the form with data using AJAX
			$.ajax({
				type: 'post',
				url: formUrl,
				data: formData,
				dataType: 'json',
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					commentStatus.html("<p>" + language.error + "</p>");
				},
				success: function(data, textStatus) {	// server response is stored in "data"!!!
			
					// Check whether there are any server side errors; display them; stop code execution
					if(data["errorServerside"] !== "") {
						commentStatus.html(data["errorServerside"]);
						commentStatus.css("color", "red");
						return;
					}
					
					if(textStatus == 'success') {
						
						// Comment status - success
						commentStatus.html("<p>" + language.success + "</p>");
						
						// Display the comments added 
						var postsList = $('#posts-list');
						$('#posts-list').prepend(data["template"]);

						// Clear fields after submitting a comment
						$('#author, #email, #comment').val('');
						
					} else {
						// Comment status - error
						commentStatus.html("<p>" + data["errorServerside"] + "</p>");
					} 
				}
			});
		}
	});
});