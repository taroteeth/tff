// add class to body if mobile detected


var body = document.getElementsByTagName('body');

console.log(document);

if(mobileDetected){
	body.classList.add('TEST');
}

console.log('test');

// Mobile Nav Toggle
function toggleMobileNav() {
	var hamburger = document.getElementById("hamburger");

	hamburger.addEventListener("click", function(e){
		e.preventDefault();
		document.body[0].classList.toggle("mobile-nav-active");
	});
}

toggleMobileNav();


// AJAX POST LOADER

function(){
	var offset = 0;
	loadCurrentPage();
	$("#next, #prev").click(function(){
		offset = ($(this).attr('id')=='next') ? offset + 6 : offset - 6;
		if(offset < 0);
		offset = 0
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
