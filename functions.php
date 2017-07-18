<?php

function flags_redirect_right_subpage1() {
	echo site_url() . "/en/";
	
	if(strpos($_SERVER['REQUEST_URI'], "aktualnosci") !== false) {
		echo site_url() . "/news/";
	} elseif(strpos($_SERVER['REQUEST_URI'], "produkt") !== false) {
		echo site_url() . "/produkt-2/";
	} elseif(strpos($_SERVER['REQUEST_URI'], "kontakt") !== false) {
		echo site_url() . "/contact/";
	} elseif(strpos($_SERVER['REQUEST_URI'], "skomentuj") !== false) {
		echo site_url() . "/feedback/";
	} else {
		$current_url = get_permalink();
		echo $current_url;
	}
}

function flags_redirect_right_subpage2() {
	echo site_url() . "/pl/";
	
	if(strpos($_SERVER['REQUEST_URI'], "news") !== false) {
		echo site_url() . "/aktualnosci/";
	} elseif(strpos($_SERVER['REQUEST_URI'], "product-2") !== false) {
		echo site_url() . "/product/";
	} elseif(strpos($_SERVER['REQUEST_URI'], "contact") !== false) {
		echo site_url() . "/kontakt/";
	} elseif(strpos($_SERVER['REQUEST_URI'], "feedback") !== false) {
		echo site_url() . "/skomentuj/";
	} else {
		$current_url = get_permalink();
		echo $current_url;
	}
}


add_filter('show_admin_bar', '__return_false'); 

// Add styles
function add_styles() {
    wp_enqueue_style( 'style.css', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'add_styles' );

// Add jQuery validatation plugin
function add_jquery_validation_plugin(){
    wp_enqueue_script('jquery-validate-min', get_stylesheet_directory_uri() . '/js/jquery.validate.min.js', array( 'jquery' ));
}
add_action('wp_enqueue_scripts', "add_jquery_validation_plugin");

// Add the ajaxcomments.js file
function ajaxcomments_js_load() {
	wp_enqueue_script('ajaxcomments', get_template_directory_uri() . "/js/ajaxcomments.js", array('jquery'));
}
add_action('init', 'ajaxcomments_js_load');

// Add script.js
function add_js_script() {
	wp_enqueue_script( 'script.js', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'add_js_script' );


// Get url for the page in the right language version
function subpage_in_right_language($subpage_pol, $subpage_eng) {
    $url = "";
	$get_locale = get_locale();
	
	if($get_locale == "pl_PL") {
		$url = site_url() . $subpage_pol;
		echo $url;
	}
	else if($get_locale == "en_US") {
		$url = site_url() . $subpage_eng;
		echo $url;
	}
}

/***** Lokalizacja - Plugin *****/
// Global variables
function get_global_string($name) {
    global ${$name};
    echo pll__(${$name});
}

// Dowiedz się więcej
$learn_more = "Dowiedz się więcej!";
pll_register_string( 'Dowiedz się więcej!', $learn_more, 'nav', false);

//Nav
$nav_home = "Strona główna";
pll_register_string( 'Strona główna', $nav_home, 'nav', false);

$nav1 = "Aktualności";
pll_register_string( 'Aktualności', $nav1, 'nav', false);

$nav2 = "Produkt!";
pll_register_string( 'Produkt!', $nav2, 'nav', false);

$nav3 = "Kontakt";
pll_register_string( 'Kontakt', $nav3, 'nav', false);

$nav4 = "Skomentuj";
pll_register_string( 'Skomentuj', $nav4, 'nav', false);

// Strona główna
$frontpage_section1_heading = "Sekcja 1 - nagłówek";
pll_register_string( 'Sekcja 1 - nagłówek', $frontpage_section1_heading, 'frontpage', false);

$frontpage_section1_heading1 = "Sekcja 1 - nagłówek 1";
pll_register_string( 'Sekcja 1 - nagłówek 1', $frontpage_section1_heading1 , 'frontpage', false);

$frontpage_section1_heading1_text = "Sekcja 1 - nagłówek 1 - tekst";
pll_register_string( 'Sekcja 1 - nagłówek 1 - tekst', $frontpage_section1_heading1_text, 'frontpage', true);

$frontpage_section1_heading2 = "Sekcja 1 - nagłówek 2";
pll_register_string( 'Sekcja 1 - nagłówek 2', $frontpage_section1_heading2 , 'frontpage', false);

$frontpage_section1_heading2_text = "Sekcja 1 - nagłówek 2 - tekst";
pll_register_string( 'Sekcja 1 - nagłówek 2 - tekst', $frontpage_section1_heading2_text, 'frontpage', true);

$frontpage_section1_heading3 = "Sekcja 1 - nagłówek 3";
pll_register_string( 'Sekcja 1 - nagłówek 3', $frontpage_section1_heading3 , 'frontpage', false);

$frontpage_section1_heading3_text = "Sekcja 1 - nagłówek 3 - tekst";
pll_register_string( 'Sekcja 1 - nagłówek 3 - tekst', $frontpage_section1_heading3_text, 'frontpage', true);

$frontpage_section2_heading = "Sekcja 2 - nagłówek";
pll_register_string( 'Sekcja 2 - nagłówek', $frontpage_section2_heading, 'frontpage', false);

$frontpage_section2_text = "Sekcja 2 - tekst";
pll_register_string( 'Sekcja 2 - tekst', $frontpage_section2_text, 'frontpage', true);

$frontpage_section3_heading = "Sekcja 3 - nagłówek";
pll_register_string( 'Sekcja 3 - nagłówek', $frontpage_section3_heading, 'frontpage', false);

$frontpage_section3_text = "Sekcja 3 - tekst";
pll_register_string( 'Sekcja 3 - tekst', $frontpage_section3_text, 'frontpage', true);

$frontpage_section4_heading = "Sekcja 4 - nagłówek";
pll_register_string( 'Sekcja 4 - nagłówek', $frontpage_section4_heading, 'frontpage', false);

$frontpage_section4_text = "Sekcja 4 - tekst";
pll_register_string( 'Sekcja 4 - tekst', $frontpage_section4_text, 'frontpage', true);

// Aktualności
$news_heading = "AKTUALNOŚCI";
pll_register_string( 'AKTUALNOŚCI', $news_heading, 'aktualności', false);

$news_section1_heading = "Tab1 - Sekcja 1 - nagłówek";
pll_register_string( 'Tab1 - Sekcja 1 - nagłówek', $news_section1_heading, 'aktualności', false);

$news_section1_text1 = "Tab1 - Sekcja 1 - tekst1";
pll_register_string( 'Tab1 - ekcja 1 - tekst1', $news_section1_text1, 'aktualności', true);

$news_section1_text2 = "Tab1 - Sekcja 1 - tekst2";
pll_register_string( 'Tab1 - Sekcja 1 - tekst2', $news_section1_text2, 'aktualności', true);

$news_section2_heading = "Tab1 - Sekcja 2 - nagłówek";
pll_register_string( 'Tab1 - Sekcja 2 - nagłówek', $news_section2_heading, 'aktualności', false);

$news_section2_text = "Tab1 - Sekcja 2 - tekst";
pll_register_string( 'Tab1 - Sekcja 2 - tekst', $news_section2_text, 'aktualności', true);

$news_section3_heading = "Tab1 - Sekcja 3 - nagłówek";
pll_register_string( 'Tab1 - Sekcja 3 - nagłówek', $news_section3_heading, 'aktualności', false);

$news_section3_text1 = "Tab1 - Sekcja 3 - tekst1";
pll_register_string( 'Tab1 - Sekcja 3 - tekst1', $news_section3_text1, 'aktualności', true);

$news_section3_text2 = "Tab1 - Sekcja 3 - tekst2";
pll_register_string( 'Tab1 - Sekcja 3 - tekst2', $news_section3_text2, 'aktualności', true);

// Produkt!
$produkt_heading = "PRODUKT!";
pll_register_string( 'PRODUKT', $product_heading, 'produkt', false);

$produkt_section1_heading = "Tab2 - Sekcja 1 - nagłówek";
pll_register_string( 'Tab2 - Sekcja 1 - nagłówek', $produkt_section1_heading, 'produkt', false);

$produkt_section1_text = "Tab2 - Sekcja 1 - tekst";
pll_register_string( 'Tab2 - Sekcja 1 - tekst', $produkt_section1_text, 'produkt', true);

$produkt_section2_heading = "Tab2 - Sekcja 2 - nagłówek";
pll_register_string( 'Tab2 - Sekcja 2 - nagłówek', $produkt_section2_heading, 'produkt', false);

$produkt_section2_text = "Tab2 - Sekcja 2 - tekst";
pll_register_string( 'Tab2 - Sekcja 2 - tekst', $produkt_section2_text, 'produkt', true);

$produkt_section3_heading = "Tab2 - Sekcja 3 - nagłówek";
pll_register_string( 'Tab2 - Sekcja 3 - nagłówek', $produkt_section3_heading, 'produkt', false);

$produkt_section3_text1 = "Tab2 - Sekcja 3 - tekst1";
pll_register_string( 'Tab2 - Sekcja 3 - tekst1', $produkt_section3_text1, 'produkt', true);

$produkt_section3_text2 = "Tab2 - Sekcja 3 - tekst2";
pll_register_string( 'Tab2 - Sekcja 3 - tekst2', $produkt_section3_text2, 'produkt', true);

// Kontakt
$contact_section = "Kontakt";
pll_register_string( 'Kontakt', $contact_section, 'sekcja kontakt', false);

$contact_section_text = "Jeśli chcesz się z nami skontaktować, napisz na:";
pll_register_string( 'Jeśli chcesz się z nami skontaktować, napisz na:', $contact_section_text, 'sekcja kontakt', true);

// Skomentuj
$feedback_heading = "SKOMENTUJ";
pll_register_string( 'SKOMENTUJ', $feedback_heading, 'skomentuj', false);

$feedback_survey = "Ankieta";
pll_register_string( 'Ankieta', $feedback_survey, 'skomentuj', false);

$feedback_survey_text = "Dodaj swój komentarz poniżej.";
pll_register_string( 'Dodaj swój komentarz poniżej.', $feedback_survey_text, 'skomentuj', false);

$feedback_survey_name = "Imię";
pll_register_string( 'Imię', $feedback_survey_name, 'skomentuj', false);

$feedback_survey_placeholder_name = "Wpisz swoje imię";
pll_register_string( 'Wpisz swoje imię', $feedback_survey_placeholder_name, 'skomentuj', false);

$feedback_survey_email = "Email";
pll_register_string( 'Email', $feedback_survey_email, 'skomentuj', false);

$feedback_survey_placeholder_email = "Podaj Twój adres email";
pll_register_string( 'Podaj Twój adres email', $feedback_survey_placeholder_email, 'skomentuj', false);

$feedback_survey_comment = "Komentarz";
pll_register_string( 'Komentarz', $feedback_survey_comment, 'skomentuj', false);

$feedback_survey_placeholder_comment = "Treść komentarza";
pll_register_string( 'Treść komentarza', $feedback_survey_placeholder_comment, 'skomentuj', false);

$feedback_survey_submit = "Wyślij";
pll_register_string( 'Wyślij', $feedback_survey_submit, 'skomentuj', false);

$feedback_comments = "Komentarze";
pll_register_string( 'Komentarze', $feedback_comments, 'skomentuj', false);

$feedback_comments_added = "Dodane komentarze";
pll_register_string( 'Dodane komentarze', $feedback_comments_added, 'skomentuj', false);

$feedback_comments_p = "Brak komentarzy.";
pll_register_string( 'Brak komentarzy.', $feedback_comments_p, 'skomentuj', false);

// Get image in the right language version
function image_in_right_language($image_name_beginning) {
	$get_locale = get_locale();

	if($get_locale == "pl_PL") {
		echo get_theme_mod($image_name_beginning . 'pol');
	}
	else if($get_locale == "en_US") {
		echo get_theme_mod($image_name_beginning . 'eng');
	}
}

/***** Customizer - Sekcje "Strona główna", "Aktualności" i "Produkt" *****/
add_action('customize_register', 'custom_wp_theme_customize_register');

function custom_wp_theme_customize_register($wp_customize) {
	// Obrazki - logo - polski
	$wp_customize->add_section( 'logo', array(
		'title'	=> __( 'Logo', 'custom_wp_theme' ),
		'priority'	=> 1,
	) );
	
	$wp_customize->add_setting( 'setting_logo_small_pol', array(
	) );
 
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'control_logo_small_pol',
        array(
			'label' => 'Polski',
            'section' => 'logo',
            'settings' => 'setting_logo_small_pol'
        )
    ) );
	
	$wp_customize->add_setting( 'setting_logo_medium_pol', array(
	) );
 
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'control_logo_medium_pol',
        array(
            'section' => 'logo',
            'settings' => 'setting_logo_medium_pol'
        )
    ) );
	
	$wp_customize->add_setting( 'setting_logo_big_pol', array(
	) );
 
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'control_logo_big_pol',
        array(
            'section' => 'logo',
            'settings' => 'setting_logo_big_pol'
        )
    ) );
	
	// Obrazki - logo - angielski
	$wp_customize->add_setting( 'setting_logo_small_eng', array(
	) );
 
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'control_logo_small_eng',
        array(
			'label' => 'Angielski',
            'section' => 'logo',
            'settings' => 'setting_logo_small_eng'
        )
    ) );
	
	$wp_customize->add_setting( 'setting_logo_medium_eng', array(
	) );
 
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'control_logo_medium_eng',
        array(
            'section' => 'logo',
            'settings' => 'setting_logo_medium_eng'
        )
    ) );
	
	$wp_customize->add_setting( 'setting_logo_big_eng', array(
	) );
 
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'control_logo_big_eng',
        array(
            'section' => 'logo',
            'settings' => 'setting_logo_big_eng'
        )
    ) );
	
	// Obrazki - strona główna
	$wp_customize->add_section( 'section_home', array(
		'title'	=> __( 'Strona główna', 'custom_wp_theme' ),
		'priority'	=> 2,
	) );
	
	$wp_customize->add_setting( 'setting_image_flag_pol', array(
	) );
 
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'control_image_flag_pol',
        array(
			'label' => 'flaga - pol',
            'section' => 'section_home',
            'settings' => 'setting_image_flag_pol'
        )
    ) );
	
	$wp_customize->add_setting( 'setting_image_flag_eng', array(
	) );
 
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'control_image_flag_eng',
        array(
			'label' => 'flaga - eng',
            'section' => 'section_home',
            'settings' => 'setting_image_flag_eng'
        )
    ) );

	$wp_customize->add_setting( 'setting_image_ktos', array(
	) );
 
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'control_image_ktos',
        array(
            'section' => 'section_home',
            'settings' => 'setting_image_ktos'
        )
    ) );
	
	$wp_customize->add_setting( 'setting_image_ktos2', array(
	) );
 
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'control_image_ktos2',
        array(
            'section' => 'section_home',
            'settings' => 'setting_image_ktos2'
        )
    ) );
	
	// Obrazki - aktualności
	$wp_customize->add_section( 'section_aktualnosci', array(
		'title'	=> __( 'Aktualności', 'custom_wp_theme' ),
		'priority'	=> 3,
	) );
	
	$wp_customize->add_setting( 'setting_image_aktual1', array(
	) );
 
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'control_image_aktual1',
        array(
			'label' => 'Sekcja 1',
            'section' => 'section_aktualnosci',
            'settings' => 'setting_image_aktual1'
        )
    ) );
	
	$wp_customize->add_setting( 'setting_image_aktual2', array(
	) );
	
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'control_image_aktual2',
        array(
			'label' => 'Sekcja 2',
            'section' => 'section_aktualnosci',
            'settings' => 'setting_image_aktual2'
        )
    ) );

	$wp_customize->add_setting( 'setting_image_aktual3', array(
	) );
 
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'control_image_aktual3',
        array(
			'label' => 'Sekcja 3',
            'section' => 'section_aktualnosci',
            'settings' => 'setting_image_aktual3'
        )
    ) );
	
	// Obrazki - Produkt
	$wp_customize->add_section( 'section_product', array(
		'title'	=> __( 'Product', 'custom_wp_theme' ),
		'priority'	=> 4,
	) );
	
	$wp_customize->add_setting( 'setting_image_product1', array(
	) );
 
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'control_image_product1',
        array(
			'label' => 'Sekcja 1',
            'section' => 'section_product',
            'settings' => 'setting_image_product1'
        )
    ) );
	
	$wp_customize->add_setting( 'setting_image_product3', array(
	) );
 
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'control_image_product3',
        array(
			'label' => 'Sekcja 3',
            'section' => 'section_product',
            'settings' => 'setting_image_product3'
        )
    ) );
	
	$wp_customize->add_setting( 'setting_image_product4', array(
	) );
 
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'control_image_product4',
        array(
            'section' => 'section_product',
            'settings' => 'setting_image_product4'
        )
    ) );
}

?>