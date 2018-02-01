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
			<div id="hamburgers" onclick="openNav()">
				<svg id="hamburger" width="28px" height="19px" viewBox="0 0 28 19">
					<g id="hamburger_paths" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<g id="Icon/Hamburger/Black" transform="translate(-3.000000, -1.000000)" fill="#3A3A3A">
					<g id="Group" transform="translate(3.000000, 1.000000)">
					<polygon id="Fill-1" points="0 0 0 3.89473684 28 4 28 0"></polygon>
					<polygon id="Fill-1" points="0 7.5 0 11.3947368 28 11.5 28 7.5"></polygon>
					<polygon id="Fill-1" points="0 15 0 18.8947368 28 19 28 15"></polygon>
					</g>
					</g>
					</g>
				</svg>
			</div>

			<div id="primary-logo">
				<svg width="176px" height="39px" viewBox="0 0 176 39">
					<g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<g id="Logo/Color">
					<g id="Page-1">
					<polygon id="Fill-1" fill="#0178BE" points="0.751517857 17.0014035 6.28306878e-05 20.5363563 3.88928241 20.5363563 0.699996693 35.5616374 5.05667659 35.5616374 8.24659061 20.5363563 12.1370668 20.5363563 12.8891501 17.0014035"></polygon>
					<polygon id="Fill-2" fill="#0178BE" points="14.3915575 17.0015295 18.7488657 17.0015295 17.2698313 23.9423302 20.7449967 23.9423302 22.2234028 17.0015295 26.5800827 17.0015295 22.6380853 35.5611336 18.2814054 35.5611336 19.9671528 27.6328385 16.4919874 27.6328385 14.8062401 35.5611336 10.4501885 35.5611336"></polygon>
					<polygon id="Fill-3" fill="#0178BE" points="28.3683069 17.0015295 32.7249868 17.0015295 28.7829894 35.5611336 24.4263095 35.5611336"></polygon>
					<polygon id="Fill-4" fill="#0178BE" points="34.4881415 17.0015295 39.4932341 17.0015295 40.5048082 29.0624381 40.5563294 29.0624381 43.1235913 17.0015295 47.1698876 17.0015295 43.2272619 35.5611336 38.3000794 35.5611336 37.2112235 22.7721997 37.1590741 22.7721997 34.4359921 35.5611336 30.5467725 35.5611336"></polygon>
					<polygon id="Fill-5" fill="#0178BE" points="48.9833697 17.0015295 53.3406779 17.0015295 51.7843618 24.3321637 51.8358829 24.3321637 57.4636276 17.0015295 62.1577083 17.0015295 55.5962996 25.0072874 58.8126025 35.5611336 53.9105522 35.5611336 52.0432242 28.568691 50.5139253 30.3623032 49.3980522 35.5611336 45.0420007 35.5611336"></polygon>
					<polygon id="Fill-6" fill="#F69420" points="64.489795 17.0015295 73.6699868 17.0015295 73.3589749 18.4053081 65.8381415 18.4053081 64.4118849 25.1634728 71.4401257 25.1634728 71.154246 26.5672515 64.1266336 26.5672515 62.2077844 35.5611336 60.5484259 35.5611336"></polygon>
					<g id="Group-69" transform="translate(71.123016, 0.215825)" fill="#F69420">
					<path d="M5.68379299,34.2537742 C8.32959325,34.2537742 10.4042626,32.0703284 11.6746991,26.0653801 C12.9457639,20.0610616 11.8041303,17.8776158 9.15895833,17.8776158 C6.51378638,17.8776158 4.43974537,20.0610616 3.16868056,26.0653801 C1.89824405,32.0703284 3.03862103,34.2537742 5.68379299,34.2537742 M9.44420966,16.4738372 C13.2310152,16.4738372 14.7345536,19.4111291 13.3346858,26.0653801 C11.9078009,32.7196311 9.15895833,35.6575529 5.37278108,35.6575529 C1.58660384,35.6575529 0.0824371693,32.7196311 1.50869378,26.0653801 C2.90918981,19.4111291 5.65803241,16.4738372 9.44420966,16.4738372" id="Fill-7"></path>
					<path d="M16.7822685,25.4676563 L19.6347817,25.4676563 C22.2541931,25.4676563 24.0442394,24.2723347 24.5625926,21.8287899 C25.0294246,19.5672515 24.3552513,18.1892937 21.346918,18.1892937 L18.3128241,18.1892937 L16.7822685,25.4676563 Z M16.9638492,16.7855151 L22.4879233,16.7855151 C25.5735384,16.7855151 26.8967526,18.5533063 26.2998611,21.4389564 C25.8072685,23.6740441 24.5104431,25.6754836 21.9431812,26.1434098 L21.9431812,26.1956815 C24.1994312,26.4035088 24.6920238,27.7291948 24.1736706,30.5883941 L23.7847487,32.6162843 C23.6025397,33.6295996 23.498869,34.6177238 23.9920899,35.345749 L22.0468519,35.345749 C21.7873611,34.6958165 21.9174206,33.7335133 22.0990013,32.7460189 L22.3842526,31.1866847 C22.9805159,27.9112011 22.5915939,26.871435 19.6090212,26.871435 L16.4712566,26.871435 L14.6818386,35.345749 L13.0224802,35.345749 L16.9638492,16.7855151 Z" id="Fill-9"></path>
					<polygon id="Fill-11" points="28.2182077 16.785704 29.8781944 16.785704 29.6444643 33.1095906 29.6966138 33.1095906 36.3353042 16.785704 38.2541534 16.785704 37.9431415 33.1095906 37.995291 33.1095906 44.7112632 16.785704 46.37125 16.785704 38.5136442 35.3453081 36.4389749 35.3453081 36.8278968 19.0207917 36.7757474 19.0207917 30.2671164 35.3453081 28.1918188 35.3453081"></polygon>
					<path d="M52.5933102,28.5350607 L51.9448975,18.0851282 L51.8933763,18.0851282 L46.8361343,28.5350607 L52.5933102,28.5350607 Z M51.1664253,16.7858929 L53.2417229,16.7858929 L54.7716501,35.3454971 L53.0079927,35.3454971 L52.6454597,29.9388394 L46.161961,29.9388394 L43.516789,35.3454971 L41.7531316,35.3454971 L51.1664253,16.7858929 Z" id="Fill-13"></path>
					<path d="M59.9887963,25.4676563 L62.8413095,25.4676563 C65.4607209,25.4676563 67.2501389,24.2723347 67.7684921,21.8287899 C68.2353241,19.5672515 67.5611508,18.1892937 64.5528175,18.1892937 L61.5187235,18.1892937 L59.9887963,25.4676563 Z M60.1697487,16.7855151 L65.6938228,16.7855151 C68.7800661,16.7855151 70.1026521,18.5533063 69.5057606,21.4389564 C69.013168,23.6740441 67.7169709,25.6754836 65.1490807,26.1434098 L65.1490807,26.1956815 C67.405959,26.4035088 67.8985516,27.7291948 67.3795701,30.5883941 L66.9906481,32.6162843 C66.8084392,33.6295996 66.7047685,34.6177238 67.1979894,35.345749 L65.2533796,35.345749 C64.9938889,34.6958165 65.1233201,33.7335133 65.3049008,32.7460189 L65.5901521,31.1866847 C66.1864153,27.9112011 65.7974934,26.871435 62.8155489,26.871435 L59.6771561,26.871435 L57.8877381,35.345749 L56.2283796,35.345749 L60.1697487,16.7855151 Z" id="Fill-15"></path>
					<path d="M71.0608829,33.9416554 L73.7575761,33.9416554 C77.3885615,33.9416554 79.3074107,32.1222222 80.6042361,26.091453 C81.8753009,20.0090418 80.7342956,18.1889789 77.1033102,18.1889789 L74.4059888,18.1889789 L71.0608829,33.9416554 Z M73.0576422,16.78583 L77.5179927,16.78583 C82.9120073,16.78583 83.5352877,20.0090418 82.2642229,26.065632 C80.9673975,32.1222222 78.9706382,35.3454341 73.5766237,35.3454341 L69.1156448,35.3454341 L73.0576422,16.78583 Z" id="Fill-17"></path>
					<path d="M89.1010813,5.13723797 C89.1010813,2.52869096 86.9912269,0.413891138 84.3887798,0.413891138 C81.7863327,0.413891138 79.6764782,2.52869096 79.6764782,5.13723797 C79.6764782,7.74578498 81.7863327,9.8605848 84.3887798,9.8605848 C86.9912269,9.8605848 89.1010813,7.74578498 89.1010813,5.13723797" id="Fill-55"></path>
					<path d="M95.3614054,13.6392623 C95.3614054,11.5653981 93.6838261,9.88388664 91.6141832,9.88388664 C89.5451687,9.88388664 87.8675893,11.5653981 87.8675893,13.6392623 C87.8675893,15.7131264 89.5451687,17.3946379 91.6141832,17.3946379 C93.6838261,17.3946379 95.3614054,15.7131264 95.3614054,13.6392623" id="Fill-57"></path>
					<path d="M101.253667,20.1993612 C101.253667,18.3704813 99.7746329,16.8879802 97.9500298,16.8879802 C96.1247983,16.8879802 94.6457639,18.3704813 94.6457639,20.1993612 C94.6457639,22.0282411 96.1247983,23.511372 97.9500298,23.511372 C99.7746329,23.511372 101.253667,22.0282411 101.253667,20.1993612" id="Fill-59"></path>
					<path d="M104.618816,26.2348538 C104.618816,24.919874 103.555093,23.8536572 102.243188,23.8536572 C100.931283,23.8536572 99.8675595,24.919874 99.8675595,26.2348538 C99.8675595,27.5498336 100.931283,28.6160504 102.243188,28.6160504 C103.555093,28.6160504 104.618816,27.5498336 104.618816,26.2348538" id="Fill-61"></path>
					<path d="M99.7356779,30.1183896 C99.7356779,29.1296356 98.9364716,28.328556 97.9500298,28.328556 C96.963588,28.328556 96.1637533,29.1296356 96.1637533,30.1183896 C96.1637533,31.1071435 96.963588,31.9088529 97.9500298,31.9088529 C98.9364716,31.9088529 99.7356779,31.1071435 99.7356779,30.1183896" id="Fill-63"></path>
					<path d="M94.1189286,33.897067 C94.1189286,33.177229 93.5364881,32.5940531 92.8189616,32.5940531 C92.1008069,32.5940531 91.5183664,33.177229 91.5183664,33.897067 C91.5183664,34.6169051 92.1008069,35.2007108 92.8189616,35.2007108 C93.5364881,35.2007108 94.1189286,34.6169051 94.1189286,33.897067" id="Fill-65"></path>
					<path d="M89.8097487,37.5708862 C89.8097487,36.9757445 89.3284656,36.4933333 88.7347156,36.4933333 C88.1409656,36.4933333 87.6596825,36.9757445 87.6596825,37.5708862 C87.6596825,38.1660279 88.1409656,38.648439 88.7347156,38.648439 C89.3284656,38.648439 89.8097487,38.1660279 89.8097487,37.5708862" id="Fill-67"></path>
					</g>
					</g>
					</g>
					</g>
				</svg>
			</div>

			<!-- Search Icon -->
			<svg id="search" width="26px" height="25px" viewBox="0 0 26 25">
				<g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				<g id="Desktop/Nav" transform="translate(-1380.000000, -23.000000)" fill-rule="nonzero" fill="#0178BE">
				<g id="Combined-Shape">
				<path d="M1395.30211,38.2400291 C1398.22738,35.3107005 1398.22738,30.5613204 1395.30211,27.6319917 C1392.37684,24.7026631 1387.63405,24.7026631 1384.70879,27.6319917 C1381.78352,30.5613204 1381.78352,35.3107005 1384.70879,38.2400291 C1387.63405,41.1693577 1392.37684,41.1693577 1395.30211,38.2400291 Z M1396.10967,40.7705136 C1392.21647,43.8201927 1386.57319,43.5506318 1382.98937,39.9618308 C1379.1145,36.0815773 1379.1145,29.7904435 1382.98937,25.9101901 C1386.86424,22.0299366 1393.14665,22.0299366 1397.02152,25.9101901 C1400.60535,29.4989911 1400.87453,35.1501035 1397.82908,39.0487119 L1404.69244,45.9216016 C1405.16724,46.397064 1405.16724,47.1679408 1404.69244,47.6434032 C1404.21764,48.1188656 1403.44783,48.1188656 1402.97303,47.6434032 L1396.10967,40.7705136 Z"></path>
				</g>
				</g>
				</g>
			</svg>

			<!-- nav dropdown -->
			<div id="nav">
				<div class="inner">
					<button onclick="closeNav()">X</button>
					<?php wp_nav_menu('default-menu'); ?>
				</div> <!-- .inner -->
			</div> <!-- .nav -->

		</div> <!-- #header-inner -->
	</div> <!-- #primary-header -->
	<div id="body-content">
