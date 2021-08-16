<?php
/**
* Template Name: Work - Top Shelf
*
*/
?>

<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/work/topshelf/assets/css/top-shelf.css?version=<?php echo rand(1, 2000) ?>" type="text/css" />
<div class="case-study-single">
		<div id="top">
			<video autoplay loop id="tsVideo">
				<source src="http://rs-web.s3.amazonaws.com/topshelf-resized-1920.webm" type="video/webm">
				<source src="http://rs-web.s3.amazonaws.com/topshelf-resized-1920.mp4" type="video/mp4">
			</video>
			<div id="topLogo"></div>
		</div>
		<div id="pleasureArea">
			<div id="content">
				<p>The party is rocking, but no one wants to go on a beer run. No problems, because TopShelf is about to save the day.</p>
				<p>Open the app, set your location, and get your favorite drinks delivered right to your door.</p>

				<div id="pleasureItems"></div>
			</div>
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
				<li class="slidee shot9"></li>
				<li class="slidee shot10"></li>								
				<li class="slidee shot11"></li>
				<li class="slidee shot12"></li>								
				<li class="slidee shot15"></li>
				<li class="slidee shot16"></li>
				<li class="slidee shot17"></li>
				<li class="slidee shot19"></li>
				<li class="slidee shot20"></li>
				<li class="slidee shot21"></li>
				<li class="slidee shot22"></li>
				<li class="slidee shot23"></li>
				<li class="slidee shot25"></li>
				<li class="slidee shot26"></li>
				<li class="slidee shot29"></li>
				<li class="slidee clickToView"></li>					
			</ul>
		</div>
		<div id="statementArea">
			<div id="icons"></div>
			<div id="birthday"></div>
			<div id="help"></div>
			<div id="sorry"></div>
			<div id="deliver"></div>
			<div id="way"></div>						
		</div>
		<div id="quote">
			<p>
				"The Rocksauce Team has been AMAZING to work with!  Especially with us being a startup, they've really helped guide our true vision for the app."<br/>
				<span class="attribution">Ryan Browne, CEO &amp; Founder, TopShelf</span>
			</p>
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
	    	 
    </script>s
	
<?php get_footer(); ?>
