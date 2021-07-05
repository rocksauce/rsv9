<?php
/**
* Template Name: Work - The Highball
*
*/
?>

<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/work/assets/css/highball-style.css" type="text/css" />

<div class="case-study-single">
	<logo></logo>
	<div id="smallQuote">
		<p>"You’re always remembering songs you wanna sing, except when you’re actually at karaoke."</p>
		<p class="attribution">- Sebastian Stan</p>
	</div>
	<div class="appStoreLinks">
		<a href="https://apps.apple.com/us/app/the-highball/id381042337" target="_blank" class="appStoreButton appleButton">
			<div id="apple"></div>
		</a>
		<a href="https://play.google.com/store/apps/details?id=com.rocksaucestudios.highball" target="_blank" class="appStoreButton">
			<div id="google"></div>
		</a>
	</div>
	<div id="phoneFrameHolder">
		<video autoplay muted loop playsinline>
			<source src="<?php echo get_stylesheet_directory_uri(); ?>/work/assets/videos/highball-ios.mp4" type="video/mp4" placeholder="<?php echo get_stylesheet_directory_uri(); ?>/work/assets/images/video-placeholder.jpg">
		</video>
		<div id="phoneFrame"></div>
	</div>
	<div id="description">
		<div class="text">
			<h1>Highball is amazing.</h1>
			<h2>Their app wasn’t.</h2>
			<p>Thousands of Austinites head to the Highball to sing their hearts out in the coolest karaoke rooms in the galaxy. Owned by the world-renowned Alamo Drafthouse Cinemas, the Highball offers great music, food, drinks, and the best karaoke experience you could imagine.</p>
			<p>Problem was, their app had issues. Designed at the beginning of the mobile revolution, Highball was buggy, slow, non-responsive, and worst of all, unusable when the connection was bad. </p>
			<p><strong>So we rebuilt it from the ground-up.</strong></p>
		</div>
		<div id="highballPhotos"></div>
	</div>
	<div class="frame">
		<ul class="slidee_container">
			<li class="slidee clickToView"></li>
			<li class="slidee shot1"></li>
			<li class="slidee shot2"></li>
			<li class="slidee shot3"></li>
			<li class="slidee shot5"></li>
			<li class="slidee shot6"></li>
			<li class="slidee shot7"></li>
			<li class="slidee shot8"></li>
			<li class="slidee clickToView"></li>
		</ul>
	</div>
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/work/js/sly.min.js"></script>
<script>
    (function () {
    		var $frame = $('.frame');
    		var $wrap  = $frame.parent();

    		// Call Sly on frame
    		$frame.sly({
    			horizontal: 1,
    			itemNav: 'centered',
    			smart: 1,
    			activateMiddle: 1,
    			activateOn: 'click',
    			mouseDragging: 1,
    			touchDragging: 1,
    			releaseSwing: 1,
    			startAt: 0,
    			scrollBy: 1,
    			speed: 300,
    			elasticBounds: 1,
    			dragHandle: 1,
    			dynamicHandle: 1,
    			clickBar: 1
    		});
    	}());


    	$( document ).ready(function() {
			$(window).resize(function(e) {
		        $frame.sly('reload');
			});
		});

</script>

<?php get_footer(); ?>
