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

	  $('.contact-form input').on('blur', function(){
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
    //adaptiveHeight: adaptiveHeight,
		controls: false
	// 	onSliderLoad: function(){
	//     document.getElementsByClassName('blog-bxslider')[0].classList.remove('load-delay');}
  });
});


// AJAX POST LOADER

class sampleName {
  constructor() {
    this.offset = 0;
    this.total = $('#article-grid').attr('data-total');
    this.currentPages = (this.offset * 6) + 6;

  	$("#next, #prev").on('click', function(e){
      var btn = $(e.target);

      if(this.currentPages < this.total && this.offset >= 0){
        this.loadCurrentPage(btn.attr('id'));
      }
      if(this.offset < 0){
        this.offset = 0;
      }
  	}.bind(this));
  }


	loadCurrentPage(id) {
    console.log(id);

    $.ajax({
			url: ajaxurl,
      dataType : 'json',
      data: {
        'action': 'knowledge_base_query',
        'offset': this.offset
      },
			type: 'GET',
			//cache: true,
			success: function (data) {
        if(data.html !== null){ /// WE LEFT OFF HERE 
          this.offset = (btn.attr('id')=='next') ? this.offset + 1 : this.offset - 1;
          console.log(this.offset);

          console.log(data);
          this.total =  parseInt(data.total); // set to vars getting from PHP
          this.currentPages = data.current_pages;

          $('#grid-inner').html(data.html);
        }
			}
		});
	}
}

var postLoader = new sampleName();

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
