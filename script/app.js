//---------------
//###### FUNCTIONS
//---------------
function ajaxAndScroll(button, ajaxFile) {
	$(button).on('click', function () {
		$('#main-content').children().hide('fade', 200, function () {
			$('#main-content').load(ajaxFile).hide().show('fade', 200);
			$('html, body').animate({
				scrollTop: $("#home").offset().top
			}, 0);
		});
	});
}


//---------------
//###### LOGIN REGISTER SECTION
//---------------
$('#login').hide().show('fade', 500);
$('#register').hide().show('fade', 500);
$('#index').hide().show('fade', 500);
$('#index a').on('click', function (evt) {
	evt.preventDefault();
	const linkhref = $(this).attr('href');
	$('#index').hide('fade', 500, function () {
		window.location.replace(linkhref);
	});
});



//---------------
//###### HOME PAGE
//---------------

$('#home').hide();
$('#home').show('fade', 800);

// popovers bootstrap
$('[data-toggle="popover"]').popover();
$(".nav-top-button-container, .nav-left-button-container").hover(
	function () {
		$(this).popover('show');
	},
	function () {
		$(this).popover('hide');
	}
);

// footer animation
$('#footer-button').on('click', function () {
	if (!$(this).children().hasClass('button-rotate')) {
		$('#footer-button').animate({
			bottom: 129,
		}, 400, "linear", function () {
			$(this).children().addClass('button-rotate');
		});
		$('#footer').animate({
			bottom: 0
		}, 400, "linear");
	} else {
		$('#footer-button').animate({
			bottom: 0,
		}, 400, "linear", function () {
			$(this).children().removeClass('button-rotate');
		});
		$('#footer').animate({
			bottom: -130
		}, 400, "linear");
	}
});

//---------------
//###### TOP NAV
//---------------

// HOME
ajaxAndScroll('.home-button', 'ajax/welcome-page.php');

// PROFILE
ajaxAndScroll('.profile-button', 'ajax/profile-page.php');


$('.logout-button').on('click', function () {
	$('#input-logout').click();
});

//---------------
//###### TOP MOBILE OR LEFT NAV
//---------------

// CALC AJAX
ajaxAndScroll('.calc-button', 'ajax/calc.php');

// DIET AJAX
ajaxAndScroll('.diet-button', 'ajax/diet.php');

// TIPS AND RECOMMENDED
ajaxAndScroll('.recommended-button', 'ajax/tips.php');