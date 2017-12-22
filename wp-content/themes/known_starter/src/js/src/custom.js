// add class to body if mobile detected

if(mobileDetected){
	document.body.classList.add('is-mobile');
}

console.log('test');

// Mobile Nav Toggle
function toggleMobileNav() {
	var hamburger = document.getElementById("hamburger");

	hamburger.addEventListener("click", function(e){
		e.preventDefault();
		document.body.classList.toggle("mobile-nav-active");
	});
}

toggleMobileNav();
