var $ = jQuery.noConflict();

// Scrolling functions
function scrollRefresh(local) {
	var clicked = $(local);
	clickedHref = clicked.attr('href');
	
	event.preventDefault();
	$('#sidebar-menu').removeClass('move');
	
	setTimeout(function() {
		document.location.href = clickedHref;
	}, 600);
}

var baseUrl = window.location.origin;
function scrollUp() {
	if(window.location.href.indexOf(baseUrl) > -1 && window.location.hash) {
		var clicked = $(this);
		clicked = $("#sidebarmenu-link-scroll").attr("href", "window.location.origin" + "#body");
			
		var clickedHref = clicked.attr('href');
		var clickedHrefId = clickedHref.substr(clickedHref.indexOf("#"));
		
		$('#sidebar-menu').removeClass('move');
		
		$('html, body').animate({
			scrollTop: $(clickedHrefId).offset().top
		}, 1700, function() {
			window.location.hash = clickedHrefId;
		});
		
		return false;
	} else {
		scrollRefresh(this);
	}
}

function scrollNoRefresh() {
	var clicked = $(this);
	var clickedHref = clicked.attr('href');
	var clickedHrefId = clickedHref.substr(clickedHref.indexOf("#"));
	
	$('#sidebar-menu').removeClass('move');
	
	$('html, body').animate({
		scrollTop: $(clickedHrefId).offset().top
	}, 1700, function() {
		window.location.hash = clickedHrefId;
	});
	
	return false;
}
	
$(document).ready(function() {
	// Front page opacity
	$(window).load(function() {
		$('#section-home img').css('opacity', '1');
		$('#section-home a').addClass('move-up');
	});
	
	// Sidebar menu
	$('#navmenu-menu').on('click', function() {
		$('#sidebar-menu').show();
		$('#sidebar-menu').addClass('move');
	});

	$('#sidebar-x').on('click', function() {
		$('#sidebar-menu').removeClass('move');
	});
	
	$('html').click(function(event) {
		if ($(event.target).closest('#sidebar-menu, #navmenu-menu').length === 0) {
			$('#sidebar-menu').removeClass('move');
		}
	});
	
	// Scrolling
	$('#section-home a, .sidebarmenu-sublinks').on('click', scrollNoRefresh);
	$('.sidebarmenu-links-scroll').on('click', function() {	
		scrollRefresh(this);
	});
	$('#sidebarmenu-link-scroll').on('click', scrollUp);
});

// 100% height
function homeFullHeight() {
	var sectionHomeFullHeight = document.getElementById("section-home");
	sectionHomeFullHeight.style.height = (window.innerHeight) + 'px';
}

function kontaktFullHeight() {
	var divKontaktFullHeight = document.getElementById("div-kontakt");
	divKontaktFullHeight.style.height = (window.innerHeight - 120) + 'px';
}