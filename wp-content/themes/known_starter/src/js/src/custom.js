
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
var body = document.getElementsByTagName('body');

if(mobileDetected){
	body[0].classList.add('is-mobile');
}



// Mobile Nav Toggle

function toggleMobileNav() {
	var hamburger = document.getElementById("hamburger");

	hamburger.addEventListener("click", function(e){
		e.preventDefault();
		document.body[0].classList.toggle("mobile-nav-active");
	});
}

toggleMobileNav();



// Correct positioning of orange blurb box on #hero

class blurbPositioning {
	constructor(blurb) {
		this.blurbBox = blurb;
		this.blurbBoxRect = this.blurbBox.getBoundingClientRect();
		this.hero = findAncestorByClass(this.blurbBox, 'hero');
		this.heroText = this.hero.querySelector('.hero-text-wrapper');
		this.nextModule = this.hero.nextElementSibling;
    this.heroTextPadding;
    this.nextModulePadding;

    this.calculatePositions();

    window.addEventListener('resize', function(){
      this.calculatePositions();
    }.bind(this));
	}

  calculatePositions() {
    this.heroTextPadding = parseInt(window.getComputedStyle(this.heroText, null).getPropertyValue('padding-bottom'));
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
	jQuery('.contact-form input').on('focus', function(){
	    var label = jQuery(this).siblings('label');
	    if(label) label.addClass('active');
	  });

	  jQuery('.contact-form input').on('blur', function(){
	    var label = jQuery(this).siblings('label');
	    if(jQuery(this).val() === ''){
	      if(label) label.removeClass('active');
	    }
	  });
}

labelDrift();



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
