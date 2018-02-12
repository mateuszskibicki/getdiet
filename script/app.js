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

$('.home-button').on('click', function () {
  $('#main-content').children().hide('fade', 500, function () {
    $('#main-content').load('ajax/welcome-page.php').hide().show('fade', 500);
    $('html, body').animate({
      scrollTop: $("#home").offset().top
    }, 500);
  });
});

$('.profile-button').on('click', function () {
  $('#main-content').children().hide('fade', 500, function () {
    $('#main-content').load('ajax/profile-page.php').hide().show('fade', 500);
    $('html, body').animate({
      scrollTop: $("#home").offset().top
    }, 500);
  });
});


$('.logout-button').on('click', function () {
  $('#input-logout').click();
});

//---------------
//###### TOP MOBILE OR LEFT NAV
//---------------


// CALC AJAX
$('.calc-button').on('click', function () {
  $('#main-content').children().hide('fade', 500, function () {
    $('#main-content').load('ajax/calc.php').hide().show('fade', 500);
    $('html, body').animate({
      scrollTop: $("#home").offset().top
    }, 500);
  });
});


















