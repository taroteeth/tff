(function($){

//--------------- Global Variables ---------------//

var body = document.getElementsByTagName('body'),
    primaryHeader = document.getElementById('primary-header').getBoundingClientRect(),
    primaryNav = document.getElementById('primary-nav'),
    hamburger = document.getElementById("hamburger");


//--------------- Utility Functions ---------------//

function findAncestorByClass (el, cls) {
  while ((el = el.parentElement) && !el.classList.contains(cls));
  return el;
}

function findAncestorById (el, id) {
  while ((el = el.parentElement) && !el.id === id);
  return el;
}

function getScrollPosition() {
  var doc = document.documentElement;
  return (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);
}

//--------------- Utility Functions ---------------//


// add class to body if mobile detected
if(mobileDetected){
	body[0].classList.add('is-mobile');
}


// Body top padding for fixed header
if(primaryHeader) {
  setBodyTopPadding();
  window.onresize = function(){
    setBodyTopPadding();
  };
}

function setBodyTopPadding() {
  var height = document.getElementById('primary-header').getBoundingClientRect().height;
  body[0].style.paddingTop = height + 'px';
}


// Mobile Nav Toggle
function setNavPadding() {
  if(primaryNav) {
    var height = document.getElementById('primary-header').getBoundingClientRect().height;
    if(window.matchMedia('(max-width: 991px)').matches) {
      primaryNav.style.top = height + 'px';
    }
  }
}
setNavPadding();

function toggleNav() {
  if(hamburger) {
    hamburger.addEventListener("click", function(e){
  		e.preventDefault();
      if(window.matchMedia('(min-width: 992px)').matches) {
        primaryNav.style.top = getScrollPosition() + 'px';
      }
  		body[0].classList.toggle("nav-active");
  	});
  }
}
toggleNav();


// Nav slide down
function openNav(){
	document.getElementById('nav').style.height = "80vh";
	document.getElementById('nav').classList.add("active");
  document.getElementById('body-content').classList.add("nav");
	document.getElementById('body-content').style.marginTop = "80vh";
}

// Nav slide up
function closeNav(){
	document.getElementById('nav').style.height = "0px";
	document.getElementById('nav').classList.remove("active");
	document.getElementById('body-content').style.marginTop = "0px";
}



// Correct positioning of orange blurb box on #hero

class blurbPositioning {
	constructor(blurb) {
		this.blurbBox = blurb;
		this.blurbBoxRect = this.blurbBox.getBoundingClientRect(); //gives you top, bottom, height, etc on object
		this.hero = findAncestorByClass(this.blurbBox, 'hero'); // get hero to get container
		this.heroText = this.hero.querySelector('.hero-text-wrapper'); //to get text wrapper
		this.heroTextPadding = parseInt(window.getComputedStyle(this.heroText, null).getPropertyValue('padding-bottom')); //computed style is updated, parseint gets rid of "px"
		this.nextModule = this.hero.nextElementSibling;
		this.nextModulePadding = parseInt(window.getComputedStyle(this.nextModule, null).getPropertyValue('padding-top'));
		this.enableBlurbPositioning();
	}

	enableBlurbPositioning() {
		this.heroText.style.paddingBottom = (this.heroTextPadding + (this.blurbBoxRect.height / 2)) + 'px';
		this.nextModule.style.paddingTop = (this.nextModulePadding + (this.blurbBoxRect.height / 2)) + 'px';
	}
}

var blurbButtons = document.querySelectorAll('.blurb-button');
if(blurbButtons) {
	var blurbButtonInstances = []; //new instance of class for each blurb button
	for(var i = 0; i < blurbButtons.length; i++) {
		blurbButtonInstances[i] = new blurbPositioning(blurbButtons[i]);
	}
}



// contact form label animation
function labelDrift(){
	$('.contact-form input').on('focus', function(){
      var label = $(this).siblings('label');
	    if(label) label.addClass('active');
	  });

	  $('.contact-form input' || '.contact-form textarea').on('blur', function(e){
      e.preventDefault();
	    var label = $(this).siblings('label');
	    if($(this).val() === ''){
	      if(label) label.removeClass('active');
	    }
	  });

    $('.contact-form textarea').on('focus', function(){
        var label = $(this).siblings('label');
  	    if(label) label.addClass('active');
  	  });

      $('.contact-form textarea').on('blur', function(e){
        e.preventDefault();
        var label = $(this).siblings('label');
        if($(this).val() === ''){
          if(label) label.removeClass('active');
        }
      });
}

labelDrift();


//Blog WYSIWYG bxslider
//var adaptiveHeight = (window.matchMedia('(min-width: 992px)').matches) ? false : true;

$('.blog-bxslider').each(function(ele,index){
  $(this).bxSlider({
    pager: true,
    infiniteLoop: true,
		controls: false,
		onSliderLoad: function(){
      var slider = document.querySelector('.blog-bxslider');
	    slider.classList.remove('load-delay');
    }
  });
});


// Clients page autoscroll on click
// $("#button").click(function() {
//     $('html, body').animate({
//         scrollTop: $("#elementtoScrollToID").offset().top
//     }, 2000);
// });

// need to figure out how to confirm the title being scrolled to and category match up


// A N I M A T I O N

// Animate .module-header lines
$(window).on("scroll load", function(){
  $(".hero-title").each(function(){
    var $this = $(this),
        height = $this.innerHeight(),
        scroll = $(window).scrollTop(),
        offset = $this.offset().top,
        windowH = window.innerHeight;
    if((scroll + windowH) > ((offset + height) + (windowH * 0.1))) {
      $this.addClass("active");
    }
  });
});


//animate images from black and white to color on scroll
$(window).on("scroll load", function(){
  $(".grayscale").each(function(){
    var $this = $(this),
        height = $this.innerHeight(),
        scroll = $(window).scrollTop(),
        offset = $this.offset().top,
        windowH = window.innerHeight;

    if((scroll + windowH) > ((offset + height) + (windowH * 0.1))){
      $this.addClass("color");
      $this.removeClass("grayscale");
    }
  });
}); 


// animate text up and in on scroll - used on hero and rte, alt and team grids, resource single article grid
function inFrame(element, window_top, window_bottom) {
  var content_top = $(element).offset().top;
	var content_bottom = content_top + $(element).outerHeight();

	if (window_bottom < content_top) {
		// below window
	} else if (content_bottom < window_top) {
		// above window
	} else {
		// in the window

    // for fades
    $(element).removeClass('trigger_fade');
    $(element).addClass('fade_in');
	}
}

  function contentFadeIn() {
    var window_top = $(window).scrollTop();
    var window_bottom = window_top + $(window).height();
    $('.trigger_fade').each(function(){
      inFrame($(this), window_top, window_bottom);
    })
  }

  window.onscroll = function() {
    contentFadeIn()
  };

  window.onresize = function() {
    contentFadeIn()
  };

  $(document).ready(function(){
    contentFadeIn()
  });

  // number svg animation
  function numberSvgAnimation(){
    var path = document.querySelector('.number-one-path');
    // console.log(path);
    var length = path.getTotalLength();
    // console.log(length);
    // Clear any previous transition
    path.style.transition = path.style.WebkitTransition =
      'none';
    // Set up the starting positions
    path.style.strokeDasharray = length + ' ' + length;
    path.style.strokeDashoffset = length;
    // Trigger a layout so styles are calculated & the browser
    // picks up the starting position before animating
    path.getBoundingClientRect();
    // Define our transition
    path.style.transition = path.style.WebkitTransition =
      'stroke-dashoffset 2s ease-in-out';
    // Go!
    path.style.strokeDashoffset = '0';
  }

numberSvgAnimation();

// KNOWLEDGE BASE AJAX LOADER

class knowledgeBaseQuery {
  constructor() {
    this.currentPage = 0;
    this.total = $('#article-grid').attr('data-total');
    this.totalPages = Math.ceil(this.total / 6);
    this.prevBtn = document.querySelector('#page-counter #prev');
    this.nextBtn = document.querySelector('#page-counter #next');
    this.pageBtns = document.querySelectorAll('#page-counter button.page-num');
    this.loader = document.getElementById('loader');

    this.prevBtn.addEventListener('click', function(){
      this.prev();
    }.bind(this));

    this.nextBtn.addEventListener('click', function(){
      this.next();
    }.bind(this));

    for(var i = 0; i < this.pageBtns.length; i++) {
      var btn = this.pageBtns[i];
      var current = i;
      btn.addEventListener('click', function(e){
        this.goToPage(e.target);
      }.bind(this));
    }

  }

  prev() {
    if(this.currentPage !== 0) { // don't go below 0
      this.loader.classList.add('active');
      this.currentPage = this.currentPage - 1;
      this.loadPage();
      if(this.currentPage == 0) {
        this.prevBtn.classList.add('disable');
      }
    }
    this.nextBtn.classList.remove('disable');
  }

  next() {
    if(this.currentPage < (this.totalPages - 1)) {
      this.loader.classList.add('active');
      this.prevBtn.classList.remove('disable');
      this.currentPage = this.currentPage + 1;
      this.loadPage();
      if(this.currentPage == this.totalPages - 1) {
        this.nextBtn.classList.add('disable');
      }
    }
  }

  goToPage(btn) {
    var page = parseInt(btn.dataset.page);
    if(this.currentPage !== page) {
      this.loader.classList.add('active');
      this.currentPage = page;
      this.loadPage();
      btn.classList.add('active');
    }
  }

	loadPage() {
    $.ajax({
			url: ajaxurl,
      dataType : 'json',
      data: {
        'action': 'knowledge_base_query',
        'currentPage': this.currentPage
      },
			type: 'GET',
			cache: true,
			success: function (data) {
        $('#grid-inner').html(data.html);

        this.loader.classList.remove('active'); // remove loader
			}.bind(this)
		});
	}
}

var resourcesGrid = document.querySelector('body.page-template-page-resources #article-grid');
if(resourcesGrid) {
  var postLoader = new knowledgeBaseQuery();
}

// SEARCH BAR

var searchBarActive = false,
    searchButton = document.querySelector('.submit-button'),
    searchBox = document.getElementById('search-form'),
    searchBar = document.querySelector('.search-field'),
    searchButton = document.querySelector('#search-form .submit-button');

// button click event
if(searchButton){
  searchButton.addEventListener('click', function(e){
    e.preventDefault();
      if(searchBarActive){
        searchBox.submit();
      } else {
        openSearchbar();
      }
  });
}


// body click event
document.body.addEventListener('click', function(e){
  if(searchBarActive){
    var classList = event.target.classList;
    if(!$(e.target).parents('.search-field').length && !$(e.target).parents('.submit-button').length && !$(e.target).hasClass('search-field') && !$(e.target).hasClass('submit-button')){
      closeSearchbar();
    }
  }
});

// search bar click
if(searchBar){
  searchBar.addEventListener('click', function(e){
    openSearchbar();
    e.stopPropagation();
  });
}

function openSearchbar(){
  searchBarActive = true;
  searchBox.classList.add('search-active');
  searchBar.focus();
}

function closeSearchbar(){
  searchBox.classList.remove('search-active');
  searchBarActive = false;
}

})(jQuery);
