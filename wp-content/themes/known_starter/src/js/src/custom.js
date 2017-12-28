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
