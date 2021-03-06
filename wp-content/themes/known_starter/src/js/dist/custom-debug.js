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

function getViewportHeight() {
  return Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
}

function getViewportWidth() {
  return Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
}

function inWindow(currentScroll, eleTop, eleHeight, vH) {
  if( (currentScroll + vH) > (eleTop + currentScroll) && (currentScroll + primaryHeader.height) < (eleTop + currentScroll + eleHeight) ) {
    return true;
  }
}

function setVendor(element, property, value) {
  element.style["webkit" + property] = value;
  element.style["moz" + property] = value;
  element.style["ms" + property] = value;
  element.style["o" + property] = value;
  element.style[property] = value;
}

// easing functions http://goo.gl/5HLl8
Math.easeInOutQuad = function (t, b, c, d) {
  t /= d/2;
  if (t < 1) {
    return c/2*t*t + b
  }
  t--;
  return -c/2 * (t*(t-2) - 1) + b;
};

Math.easeInCubic = function(t, b, c, d) {
  var tc = (t/=d)*t*t;
  return b+c*(tc);
};

Math.inOutQuintic = function(t, b, c, d) {
  var ts = (t/=d)*t,
  tc = ts*t;
  return b+c*(6*tc*ts + -15*ts*ts + 10*tc);
};

// requestAnimationFrame for Smart Animating http://goo.gl/sx5sts
var requestAnimFrame = (function(){
  return  window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || function( callback ){ window.setTimeout(callback, 1000 / 60); };
})();

function scrollTo(to, callback, duration) {
  // because it's so fucking difficult to detect the scrolling element, just move them all
  function move(amount) {
    document.documentElement.scrollTop = amount;
    document.body.parentNode.scrollTop = amount;
    document.body.scrollTop = amount;
  }
  function position() {
    return document.documentElement.scrollTop || document.body.parentNode.scrollTop || document.body.scrollTop;
  }
  var start = position(),
      change = (to - start) - (primaryHeader.height + 30),
      currentTime = 0,
      increment = 20;
      duration = (typeof(duration) === 'undefined') ? 500 : duration;
  var animateScroll = function() {
    // increment the time
    currentTime += increment;
    // find the value with the quadratic in-out easing function
    var val = Math.easeInOutQuad(currentTime, start, change, duration); // change to make duration based on distance
    // move the document.body
    move(val);
    // do the animation unless its over
    if (currentTime < duration) {
      requestAnimFrame(animateScroll);
    } else {
      if (callback && typeof(callback) === 'function') {
        // the animation is done so lets callback
        callback();
      }
    }
  };
  animateScroll();
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
      e.stopPropagation();
      if(window.matchMedia('(min-width: 992px)').matches) {
        primaryNav.style.top = getScrollPosition() + 'px';
      }
  		body[0].classList.toggle("nav-active");
      closeSearchbar();
  	});
  }
}
toggleNav();

// //body event listener for nav
document.body.addEventListener('click', function(e){
  if(body[0].classList.contains('nav-active')){
    if(!$(e.target).parents('#primary-nav').length){
      body[0].classList.remove('nav-active');
    }
  }
});


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

	  $('.contact-form input', '.contact-form textarea').on('blur', function(e){
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


// Clients page autoscroll on clicl
class clientScroll {
  constructor(ele){
    this.element = ele;
    this.list = this.element.querySelectorAll('.categories-list .cat-title'); // target the as in the industry module

    if(this.list.length){
      for( var i = 0; i < this.list.length; i++){
        this.list[i].addEventListener('click', function(e){
          e.preventDefault;
          var item = e.target;
          var id = item.dataset.id;
          var target = this.element.querySelector('.category-submodule p.title[data-id='+id+']'); //how you match it thoooo
          var targetTop = target.getBoundingClientRect().top;

          scrollTo((targetTop + getScrollPosition()), function(){
          }, 1500);

        }.bind(this));
      }
    }
  }

}
var industryModules = document.querySelectorAll('.industry-module');

if(industryModules.length){
  var industryClasses = [];
  for( var i = 0; i < industryModules.length; i++ ){
    industryClasses[i] = new clientScroll(industryModules[i]);
  }
}


// A N I M A T I O N

class animations {
  constructor() {
    this.eleArr = [];
    this.elements = document.querySelectorAll('.trigger_fade, .trigger_tile, .trigger_circle_grow, .grayscale, .trigger_bubble_grow, .trigger_img_slide_left, .trigger_img_slide_right, .hero-title, .logo');
    this.interval;
    this.currentScroll;

    this.setValues(true);

    this.toBeLoaded = this.eleArr.length;

    if(this.eleArr.length) {
      this.init();
    }
  }

  setValues(init = false) {
    for(var i = 0; i < this.elements.length; i++) {
      var rect = this.elements[i].getBoundingClientRect();

      if(init) {
        this.eleArr[i] = {
          'ele': this.elements[i],
          'top': rect.top,
          'bottom': rect.bottom,
          'height': rect.height,
          'loaded': false
        }
      } else {
        this.eleArr[i]['top'] = rect.top;
      }
    }
  }

  init() {
    this.interval = setInterval(function(){
      this.currentScroll = getScrollPosition();
      this.setValues(); // keep ele top updated
      if(this.toBeLoaded > 0) {
        for(var i = 0; i < this.eleArr.length; i++) {
          if(!this.eleArr[i]['loaded']) {
            if( inWindow(this.currentScroll, this.eleArr[i]['top'], this.eleArr[i]['height'], getViewportHeight()) ) {
              this.eleArr[i]['ele'].classList.add('animate');
              this.eleArr[i]['loaded'] = true;
              this.toBeLoaded = this.toBeLoaded - 1;
            }
          }
        }
      } else {
        clearInterval(this.interval);
      }
    }.bind(this), 30);
  }
}

var animationInstance = new animations();


  // number svg animation
  function numberSvgAnimation(){
    var path = document.querySelector('.number-one-path');
    var length = path.getTotalLength();
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
      'stroke-dashoffset 4s ease-in-out';
    // Go!
    path.style.strokeDashoffset = '0';
  }

numberSvgAnimation();


// header logo scroll function
function logoScroll(){

  var homeHero = document.getElementById('home-logo');

  if(homeHero){
    var headerLogo = document.getElementById('primary-logo');
    var body = document.getElementsByTagName('body')[0].getBoundingClientRect();
    var heroPos = homeHero.getBoundingClientRect();
    var heroTop = heroPos.top;

    document.addEventListener('scroll', function(){
      if(getScrollPosition() >= heroTop){
        headerLogo.classList.add('active');
      } else {
        headerLogo.classList.remove('active');
      }
    })
  }
}

logoScroll();

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
    this.gridInner = document.querySelector('#article-grid #grid-inner');
    this.rows = this.gridInner.querySelectorAll('.row');
    this.rowCounter = 0;
    this.row1;
    this.row2;
    this.ajaxData = '';

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

  scrollUp(){
    var gridTopOffset = (document.getElementById('articles-header').getBoundingClientRect().top - (primaryHeader.height + 30)) + getScrollPosition();
    scrollTo(gridTopOffset, function(){
      this.gridInner.style.minHeight = 0;
    }.bind(this), 1000);
  }

  removeRows() {
    setVendor(this.rows[this.rowCounter], 'transform', 'translateX(-100px)');
    setVendor(this.rows[this.rowCounter], 'opacity', '0');

    this.rowCounter++;
    if( this.rowCounter < this.rows.length ){
      setTimeout( function(){
        this.removeRows();
      }.bind(this), 300 );
    }

    if( this.rowCounter == this.rows.length ) {
      setTimeout(function(){
        // Remove last posts
        this.gridInner.innerHTML = '';
        this.rowCounter = 0;
        // Animate new posts
        this.addRows();
      }.bind(this), 300);
    }
  }

  addRows() {
    setVendor(this.row1, 'opacity', '0');
    setVendor(this.row1, 'transform', 'translateX(50px)');
    setVendor(this.row2, 'opacity', '0');
    setVendor(this.row2, 'transform', 'translateX(50px)');

    this.gridInner.appendChild(this.row1);
    this.gridInner.appendChild(this.row2);
    this.rows = this.gridInner.querySelectorAll('.row');

    setTimeout(function(){
      setVendor(this.row1, 'opacity', '1');
      setVendor(this.row1, 'transform', 'translateX(0)');
    }.bind(this), 100);

    setTimeout(function(){
      setVendor(this.row2, 'opacity', '1');
      setVendor(this.row2, 'transform', 'translateX(0)');

      this.scrollUp();
    }.bind(this), 300);
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
      beforeSend: function() {
        // set minimum height on row container
        var total = 0;
        for(var i = 0; i < this.rows.length; i++) {
          total = total + this.rows[i].getBoundingClientRect().height;
        }
        this.gridInner.style.minHeight = total+'px';
      }.bind(this),
			success: function (data) {
        this.ajaxData = data.html;
        var tempDiv = document.createElement('div');
        tempDiv.innerHTML = this.ajaxData;
        this.row1 = tempDiv.children[0];
        this.row2 = tempDiv.children[1];

        this.loader.classList.remove('active');

        // Slide/fade out rows
        this.removeRows();

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

// Animated number svgs
class numberSVGSClass {
  constructor() {
    this.svgs = numberSVGS;
    this.arr = [];
    this.interval;
    this.allLoaded = false;

    for(var i = 0; i < this.svgs.length; i++) {
  		this.arr[i] = {
        // get exact length of path for dash animation
        'length': this.svgs[i].getElementsByTagName('path')[0].getTotalLength(),
        'load': false
      }
  		this.svgs[i].style.strokeDashoffset = this.arr[i]['length'];
  		this.svgs[i].style.strokeDasharray = this.arr[i]['length'];
  	}

    window.addEventListener('scroll', function(){
      for(var i = 0; i < this.arr.length; i++) {
        var scroll = getScrollPosition();
        var eleOffset = this.svgs[i].getBoundingClientRect();

        // check to see if in browser window - current scroll position plus viewport height (to account for extra space), check to see if greater than the getboundingclientrect needs to be added to current scroll position, then add height of element to check for bottom of element
        if( (scroll + getViewportHeight()) > ((eleOffset.top + scroll) + eleOffset.height) ) {
          if(!this.arr[i]['load']){
            this.arr[i]['load'] = true;
            this.svgs[i].style.transition = 'all 3000ms ease';
            this.svgs[i].style.strokeDashoffset = 0;
          }
        }
      }
    }.bind(this));
  }
}

var numberSVGS = document.querySelectorAll('.numbersvg');
if(numberSVGS) {
  var numberSVGSInstance = new numberSVGSClass();
}

})(jQuery);
