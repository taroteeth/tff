(function($){

//--------------- Global Variables ---------------//

var body = document.getElementsByTagName('body'),
    primaryHeader = document.getElementById('primary-header').getBoundingClientRect(),
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

function sampleName(){
	var offset = 0;
	loadCurrentPage();
	$("#next, #prev").click(function(){
		offset = ($(this).attr('id')=='next') ? offset + 6 : offset - 6;
		if(offset < 0)
		offset = 0;
		else
		loadCurrentPage();
	});

	function loadCurrentPage() {
		$.ajax({
			url: 'resources-grid.php?offset=' + offset,
			type: 'POST',
			cache: true,
			success: function (data) {
				$('#grid-inner').html(data);
			}
		});
	}
}

sampleName();

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



// class AjaxPostLoader {
// 	constructor(){ //what runs as soon as the class is set up
// 		this.nextbtn = document.getElementById('next-btn');
// 		this.prevbtn = document.getElementById('prev-btn');
// 		//how do I set up number buttons?
// 		this.wrapper = document.getElementById('article-grid');
// 		this.currentPage = parseInt(this.wrapper.dataset.page) + 1; //hmm?
// 		this.postLoadCounter = 6; //every load cycle will bring in 6 posts
// 		this.totalPosts = this.wrapper.dataset.total; //is this wrong because
// 		this.pageOffset = this.wrapper.dataset.offset;
// 		this.excludePages = this.wrapper.dataset.exclude;
//
// 		console.log(this.excludePages);
//
// 		this.nextbtn.addEventListener('click', function(e){
// 			e.preventDefault();
// 			this.clickHandler();
// 		}.bind(this)); //changes reference of this to up one level (constructor)
// 	}
//
// 	//next button?
// 	clickHandler(){
// 		$.ajax(
// 			{
// 				method : 'post', //declares type we are using, sending data to php file
// 				url : ajaxurl,
// 				data : {
// 					'action' : 'load_more_posts',
// 					'wrapper' : this.currentPage,
// 					'offset' : this.pageOffset,
// 					'exclude' : this.excludePages
// 				},
// 				dataType : 'JSON',
// 				error : function(xhr, status, error){
// 					console.log(xhr, status, error);
// 				},
// 				success : function(data, status, xhr){
// 					this.pageOffset = parseInt(this.pageOffset) +
// 					parseInt(data.offset);
// 					console.log(this.pageOffset, this.totalPosts);
// 					this.currentPage = this.currentPage + 1;
//
// 					if(this.pageOffset >= parseInt(this.totalPosts)){
// 						this.nextbtn.style.display = 'none';
// 					}
//
// 					$('#grid-inner').append(data.html);
//
// 				}.bind(this)
// 			}
// 		);
// 	}
// }
//
// if(document.getElementById('next-btn')){
// 	var postLoader = new ajaxPostLoader;
// }

})(jQuery);
