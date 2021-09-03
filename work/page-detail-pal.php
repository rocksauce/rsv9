<?php
/**
* Template Name: Work - Detail Pal
*
*/
?>

<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/work/detail-pal/assets/css/details.css?version=<?php echo rand(1, 2000) ?>" type="text/css" />

<div class="case-study-single">
		<div class="angledLight">
		</div>
		<div class="patternBG">
			<div class="logoD"></div>
			<div class="phoneArea">
				<div class="phone"></div>
				<div class="text">
					<h1>Activity Tracking<br>For your Best Friend!</h1>
					<p>Okay, let's be honest—DETAILS&#174; Pet Activity Link is one of our favorite projects here at Rocksauce Studios! We love our pets, we love fitness trackers, and of course, we love making beautiful apps for iPhone and Android.</p>

<p>DETAILS&#174; PAL initially came to us as just a simple concept, a bright idea in an appreneur's head. After Rockauce poured some of our UX & Artistic magic on it, it grew to be a flagship tech project for one of the pet world's leading companies - R2P Pet.</p>
				</div>
			</div>
			<div class="uxArea">
				<div class="text">			
					<h1>Details PAL Ux Design &amp;<br>Strategy</h1>
				</div>
				<div class="ux"></div>
			</div>
			<div class="logoArea">
				<div class="internal">
					<div class="logos"></div>
					<div class="text">
						<h1>Logo Design</h1>
						<p>Before being renamed to DETAILS&#174; PAL, Rocksauce worked up some logos for the original name, EmBark.</p>
						<p>Keeping the core concept of activity at the forefront, we toyed with a few different styles to show the concept of paws moving, dogs jumping or standing, and most adorably, a floppy eared puppy in a sweatband.
</p>
					</div>
				</div>
			</div>
			<div class="colorsElements">
				<div class="text">
					<h1>Colors &amp;<br>Elements</h1>
					<p>The universal truth about having a pet is that it makes you happy. Whether bouncing around, chasing each other, or rolling around on their back, pets bring down stress levels and make you smile.</p>

					<p>We infused every element of the DETAILS&#174; PAL with that same spirit. In the app, we focused on bright, bold colors, easily accessible, with playful icons and interface elements, and fonts that are legible but soothing.</p>

					<p>Details PAL Ux Design  is as much fun to use as it is easy!</p>
				</div>
				<div class="elements"></div>
			</div>
			<div class="theAppContent">
				<h1>The App</h1>
				<table border="0" cellpadding="0" cellspacing="0" class="screenShots">
					<tr>
						<td><img src="http://res.cloudinary.com/rocksauce-studios/image/upload/v1454899679/etepeg5yuubwjxg6pc7s.png" /></td>
						<td><img src="http://res.cloudinary.com/rocksauce-studios/image/upload/v1454899678/lxhyo8gfdhcoxzdrqwdq.png" /></td>						
						<td><img src="http://res.cloudinary.com/rocksauce-studios/image/upload/v1454899678/wge0mm69opborlqxyh7o.png" /></td>						
					</tr>
					<tr>
						<td><img src="http://res.cloudinary.com/rocksauce-studios/image/upload/v1454899678/vmgfknbdhegn04ek8pm8.png" /></td>
						<td><img src="http://res.cloudinary.com/rocksauce-studios/image/upload/v1454899679/hicnprsdtqnhtdrxtszv.png" /></td>						
						<td><img src="http://res.cloudinary.com/rocksauce-studios/image/upload/v1454899679/f2m3jgnynh2v62boxjc9.png" /></td>						
					</tr>
					<tr>
						<td><img src="http://res.cloudinary.com/rocksauce-studios/image/upload/v1454899678/qdafxikz5dvdlbwpqhgo.png" /></td>
						<td><img src="http://res.cloudinary.com/rocksauce-studios/image/upload/v1454899678/qqzy2v0uq1hosnzpbnhl.png" /></td>						
						<td><img src="http://res.cloudinary.com/rocksauce-studios/image/upload/v1454899678/xnv0hstv0unbuuk0t1yr.png" /></td>						
					</tr>
					<tr>
						<td><img src="http://res.cloudinary.com/rocksauce-studios/image/upload/v1454899678/abuk4ulaydmjg81f1g47.png" /></td>
						<td><img src="http://res.cloudinary.com/rocksauce-studios/image/upload/v1454899678/avpva8yb2ihkncsupjwu.png" /></td>						
						<td><img src="http://res.cloudinary.com/rocksauce-studios/image/upload/v1454899678/ru0xjc7lvijkmi6mxmf9.png" /></td>		
					</tr>
					<tr>
						<td><img src="http://res.cloudinary.com/rocksauce-studios/image/upload/v1454899678/lsul0kxsfqj0zije4vrp.png" /></td>
						<td><img src="http://res.cloudinary.com/rocksauce-studios/image/upload/v1454899677/svatexr42o9j6cop2vfg.png" /></td>						
						<td><img src="http://res.cloudinary.com/rocksauce-studios/image/upload/v1454899678/del4bu6juxqkjc3abvly.png" /></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="theAppBG"></div>
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
