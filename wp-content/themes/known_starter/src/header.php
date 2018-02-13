<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>


		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,700" rel="stylesheet">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<script type="text/javascript">
		    window.mobilecheck = function() {
		      var check = false;
		      (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
		      return check;
		    };
		    var mobileDetected = window.mobilecheck();
	    </script>

		<?php wp_head(); ?>
		<!-- <script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
    </script> -->


	</head>
<body <?php body_class(); ?>>
	<?php include('inc/master-svg.svg'); ?>

	<div id="body-wrapper">

			<div id="primary-header">
				<div id="header-inner">

					<!-- Menu Hamburger -->
					<div id="hamburgers">
						<div id="hamburger">
						  <span></span>
						  <span></span>
						  <span></span>
						</div>
					</div>

					<div id="primary-logo">
						<?php echo '<a href="'. get_permalink('6') .'"></a>'; ?>
						<svg viewBox="0 0 176 39">
							<use href="#color-logo"></use>
						</svg>
					</div>

					<!-- Search Icon -->
					<form role="search" method="get" id="search-form" class="search-form" action="<?php echo get_bloginfo('home'); ?>">

						<button type="submit" class="submit-button">
							<svg id="search" width="26px" height="25px" viewBox="0 0 26 25">
								<g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<g id="Desktop/Nav" transform="translate(-1380.000000, -23.000000)" fill-rule="nonzero" fill="#0178BE">
								<g id="Combined-Shape">
								<path d="M1395.30211,38.2400291 C1398.22738,35.3107005 1398.22738,30.5613204 1395.30211,27.6319917 C1392.37684,24.7026631 1387.63405,24.7026631 1384.70879,27.6319917 C1381.78352,30.5613204 1381.78352,35.3107005 1384.70879,38.2400291 C1387.63405,41.1693577 1392.37684,41.1693577 1395.30211,38.2400291 Z M1396.10967,40.7705136 C1392.21647,43.8201927 1386.57319,43.5506318 1382.98937,39.9618308 C1379.1145,36.0815773 1379.1145,29.7904435 1382.98937,25.9101901 C1386.86424,22.0299366 1393.14665,22.0299366 1397.02152,25.9101901 C1400.60535,29.4989911 1400.87453,35.1501035 1397.82908,39.0487119 L1404.69244,45.9216016 C1405.16724,46.397064 1405.16724,47.1679408 1404.69244,47.6434032 C1404.21764,48.1188656 1403.44783,48.1188656 1402.97303,47.6434032 L1396.10967,40.7705136 Z"></path>
								</g>
								</g>
								</g>
							</svg>
					</button> <!-- .submit-button -->

					<label>
						<span class="screen-reader-text">Search for:</span>
						<input type="search" class="search-field" placeholder="Search website..." value="" name="s" autocomplete="off"/>
					</label>
					</form> <!-- search-form -->

				</div> <!-- #header-inner -->
			</div> <!-- #primary-header -->

			<!-- nav dropdown -->
			<div id="primary-nav">
				<div class="inner">
					<?php wp_nav_menu('default-menu'); ?>

					<div id="circle-1">
					<svg version="1.1" viewBox="0 0 500 500" preserveAspectRatio="xMinYMin meet">
					<circle cx="250" cy="250" r="200" />
					</svg>
					</div>

					<div id="circle-2">
					<svg version="1.1" viewBox="0 0 500 500" preserveAspectRatio="xMinYMin meet">
					<circle cx="250" cy="250" r="200" />
					</svg>
					</div>

				</div> <!-- .inner -->
			</div> <!-- .nav -->

			<div id="body-wrapper-inner">

			<div id="body-content">
