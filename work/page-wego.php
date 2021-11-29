<?php
/**
* Template Name: Work - Wego
*
*/
?>

<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/work/wego/assets/css/wego.css?version=<?php echo rand(1, 2000) ?>" type="text/css" />
<div class="case-study-single">
		<div id="top">			
		</div>
		<div id="content">
			<div class="left">
				<h1>WeGo is you on the go!</h1>
				<p>WeGo is a family of wearable fitness motivators built to make it easy to track daily activities. From the innovative people at EBBrands, a name known for high quality life accessories, WeGo fits all budgets and lifestyles with ease.</p>
				<p>Whether you prefer a wrist-wearable or a clip-on device, choose the WeGo that works best for you and connect it to the iPhone or Android app.</p>
				<p>Track your daily progress, sleep quality, calories &amp; fat-burned, how many miles you've moved and more.</p>
				</p>
			</div>
			<div class="right"></div>	
		</div>		
		<div class="frame">
			<ul class="slidee_container">
				<li class="slidee clickToView"></li>
				<li class="slidee shot1"></li>
				<li class="slidee shot7"></li>				
				<li class="slidee shot2"></li>
				<li class="slidee shot3"></li>
				<li class="slidee shot4"></li>
				<li class="slidee shot5"></li>
				<li class="slidee shot6"></li>
				<li class="slidee clickToView"></li>								
			</ul>
		</div>
		<div id="bottomOfPage"></div>	
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
