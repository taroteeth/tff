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

function toggleNav() {
	var hamburger = document.getElementById("hamburger");

	hamburger.addEventListener("click", function(e){
		e.preventDefault();
		document.body[0].classList.toggle("nav-active");
	});
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



// CONTACT FORM SUBMISSION

class contactForm {
  constructor(form) {
    this.form = form;
    this.fields = form.querySelectorAll('.field');
    this.fieldsArr = [];
    this.errors = false;

    for(var i = 0; i < this.fields.length; i++) {
      this.fieldsArr[i] = {
        'ele': this.fields[i],
        'input': this.fields[i].querySelector('input'),
        'value': this.fields[i].querySelector('input').value,
        'inlineMsg': this.fields[i].querySelector('.inline-msg')
      }
    }

    // Messages
    this.validationErrors = {
      'required': 'Required',
      'name': 'At least 4 characters',
      'email': 'Enter a valid email address',
      'invalid': 'invalid characters',
      'human': 'incorrect'
    }

    form.addEventListener('submit', function(evt) {
      evt.preventDefault();
      this.clearErrors();
      this.validateForm();
    }.bind(this));
  }

  clearErrors() {
    this.errors = false;
    for(var i = 0; i < this.fieldsArr.length; i++) {
      this.fieldsArr[i].ele.classList.remove('error');
      if(this.fieldsArr[i].inlineMsg) {
        this.fieldsArr[i].inlineMsg.innerHTML = '';
      }
    }
  }

  validateForm() {
    for(var i = 0; i < this.fieldsArr.length; i++) {
      var input = this.fieldsArr[i].input,
          value = input.value,
          inlineMsg = this.fieldsArr[i].inlineMsg;

      if(input.required && !value) {
        this.errors = true;
        inlineMsg.innerHTML = this.validationErrors.required;
        this.fieldsArr[i].ele.classList.add('error');
      }

      // if(!this.validateChars(value)) {
      //   this.errors = true;
      //   inlineMsg.innerHTML = this.validationErrors.invalid;
      //   this.fieldsArr[i].ele.classList.add('error');
      // }

      // TODO General special characters validation
      // TODO Better way to implement error class on fields

      switch(input.type) {
        case 'text':
          if(input.name == 'full_name'){
            if(!this.validateName(value)) {
              this.errors = true;
              inlineMsg.innerHTML = this.validationErrors.name;
              this.fieldsArr[i].ele.classList.add('error');
            }
          }
          if(input.name == 'not_human') {
            if(!value) {
              this.errors = true;
              inlineMsg.innerHTML = this.validationErrors.required;
              this.fieldsArr[i].ele.classList.add('error');
            } else if(value !== '9') {
              this.errors = true;
              inlineMsg.innerHTML = this.validationErrors.human;
              this.fieldsArr[i].ele.classList.add('error');
            }
          }
          break;
        case 'email':
          if(!this.validateEmail(value)) {
            this.errors = true;
            inlineMsg.innerHTML = this.validationErrors.email;
            this.fieldsArr[i].ele.classList.add('error');
          }
          break;
        case 'message':
          // TODO validate textarea
          break;
      }
    }

    if(!this.errors) {
      this.submitForm();
    }
  }

  validateName(value) {
    if(value){
      if(value.length <= 3) {
        return false;
      } else {
        return true;
      }
    }
  }

  validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }

  validateChars(value){
    var re = /[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/g;
    return re.test(String(value).toLowerCase());
  }

  validateRequired() {

  }



  submitForm() {
    console.log('success!');
  }
}

if(document.getElementById('contact-form')) {
  var contactFormObj = new contactForm(document.getElementById('contact-form'));
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
