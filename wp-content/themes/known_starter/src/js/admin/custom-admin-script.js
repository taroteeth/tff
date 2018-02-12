var body = document.getElementsByTagName('body');

acf.add_action('load', function( $el ){
  if(body[0].classList.contains('post-type-case_study')) {
    var nextStepHeader = document.querySelector('.acf-field-5a39508e4a697');
    var nextStepPage = document.querySelector('.acf-field-5a6606e5ddeb7');

    if(nextStepHeader) nextStepHeader.style.display = 'none';
    if(nextStepPage) nextStepPage.style.display = 'none';
  }
});
