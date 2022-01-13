<?php /* Template Name: 404 Template page */ ?>

<?php get_header();

$category = get_queried_object();
$sliderNumberPosts = 4; //get this from configuration 5
$listNumberPosts = 2; //get this from configuration 4
$blockListNumberPost = 2; //get this from configuration 4
$blockListNumberPostRight = 1; //get this from configuration 4
$lastPostsNumber = 6;

$total_posts = $sliderNumberPosts + $listNumberPosts + $blockListNumberPost + $blockListNumberPostRight + $lastPostsNumber;

$show_design_safari = true;
$category_id = 0;

if (!isset($category->term_id)) {
    $list_query_options = array(
        'posts_per_page' => $sliderNumberPosts - 1,
    );
} else {
    $category_id = $category->cat_ID;

    $list_query_options = array(
        'cat' => $category->cat_ID,
        'posts_per_page' => $sliderNumberPosts,
    );

    $show_design_safari = false;
}

$list_query_options['post_type'] = 'post';
$list_query_options['order'] = 'DESC';
$list_query_options['orderby'] = 'date';

?>





<div id="et-main-area">
    <div class="blog-bkg">
        <article id="post-0" class="post-0 page type-page status-publish hentry">
            <div class="entry-content">
                <div class="et-l et-l--post">
                    <div class="et_builder_inner_content et_pb_gutters1 rsv9_blog_content">




                        <div class="et_pb_section et_pb_section_1 blog-intro et_section_regular">
                            <div class="et_pb_row et_pb_row_1">
                                <div class="et_pb_column et_pb_column_3_5 et_pb_column_1  et_pb_css_mix_blend_mode_passthrough">
                                    <div class="et_pb_module et_pb_post_slider et_pb_post_slider_0 et_pb_slider et_pb_post_slider_image_background et_pb_slider_fullwidth_off et_pb_slider_with_overlay et_pb_bg_layout_dark">
                                        <div class=" ">

                                            <?php

                                            $lists_posts = new WP_Query($list_query_options);


                                            ?>
                                            <div class=" et_pb_bg_layout_dark et_pb_post_slide-<?= get_the_ID() ?> et-pb-active-slide" style="background-image: url(<?= get_the_post_thumbnail_url() ?>);">
                                                <div class="et_pb_slide_overlay_container"></div>
                                                <div class="et_pb_container clearfix" style="height: 410px;">
                                                    <div class="et_pb_slider_container_inner">
                                                        <div class="et_pb_slide_description">
                                                            <h2 class="et_pb_slide_title">

                                                                Let's Try That <span>Again</span>

                                                            </h2>
                                                            <div class="et_pb_slide_content ">
                                                                Dragée tootsie roll lemon drops jujubes sweet. Marzipan apple pie brownie bonbon pastry cotton candy cookie marzipan. Powder topping halvah pie marzipan halvah marzipan. Chocolate soufflé cupcake pudding cake chocolate bar.
                                                            </div>
                                                        </div> <!-- .et_pb_slide_description -->
                                                    </div>
                                                </div> <!-- .et_pb_container -->
                                            </div> <!-- .et_pb_slide -->
                                            <?php



                                            ?>
                                        </div> <!-- .et_pb_slides -->

                                    </div> <!-- .et_pb_slider -->

                                </div> <!-- .et_pb_column -->
                                <div class="et_pb_column et_pb_column_2_5 et_pb_column_2  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                    <div class="et_pb_module et_pb_blog_0 small-posts et_pb_posts et_pb_bg_layout_light ">
                                        <div class="et_pb_ajax_pagination_container posts_list_rsv9">

                                            <?php

                                            $list_query_options['posts_per_page'] = $listNumberPosts;
                                            $list_query_options['post__not_in'] = $excluded_posts_ids;

                                            $list = new WP_Query($list_query_options);

                                            if ($list->have_posts()) {
                                                while ($list->have_posts()) : $list->the_post();

                                                    $excluded_posts_ids[] = get_the_ID();
                                                    $image = get_the_post_thumbnail_url();
                                                    if ($image == '') {
                                                        $image = '/wp-content/themes/rsv9/images/no-image.png';
                                                    }
                                            ?>
                                                    <article id="post-<?= get_the_ID() ?>" class="et_pb_post clearfix et_pb_blog_item_0_0 post-<?= get_the_ID() ?> post type-post status-publish format-standard has-post-thumbnail hentry category-media">

                                                        <a href="<?= the_permalink() ?>" class="entry-featured-image-url"><img loading="lazy" src="<?= $image ?>" alt="<?= rs_the_title(50) ?>" class="" width="1080" height="675"></a>
                                                        <h2 class="entry-title"><a href="<?= the_permalink() ?>"><?= rs_the_title(50) ?></a></h2>

                                                        <div class="post-content">
                                                            <div class="post-content-inner et_multi_view_hidden"></div>
                                                        </div>
                                                    </article> <!-- .et_pb_post -->

                                            <?php
                                                    wp_reset_postdata();
                                                endwhile;
                                            }
                                            ?>
                                        </div>
                                    </div> <!-- .et_pb_posts -->
                                </div> <!-- .et_pb_column -->

                            </div> <!-- .et_pb_row -->
                        </div> <!-- .et_pb_section -->

                        <div class="no-finding-search">
                            <div class="text">
                                <p>Not findig What You're Looking For</p>
                            </div>
                            <div class="form">
                                <input type="text" name="search-404" id="search-404" placeholder="Try searching here">
                            </div>
                        </div>

                        <div class="menu_section et_pb_section et_pb_section_0 blog-links et_section_regular">
                            <div class="et_pb_row et_pb_row_0">
                                <div class="et_pb_column et_pb_column_4_4 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                    <div class="et_pb_module et_pb_text et_pb_text_0  et_pb_text_align_left et_pb_bg_layout_light">
                                        <div class="et_pb_text_inner">
                                            <ul>
                                                <li><a href="/blog">All</a></li>
                                                <?php
                                                $categories = get_categories(array(
                                                    'orderby' => 'name',
                                                    'parent'  => 0
                                                ));

                                                $limit = get_option('divi_categories_to_show');

                                                $count = 1;

                                                foreach ($categories as $category) {

                                                    if ($count <= ($limit)) {

                                                        printf(
                                                            '<li><a href="%1$s">%2$s</a></li>',
                                                            esc_url(get_category_link($category->term_id)),
                                                            esc_html($category->name)
                                                        );
                                                    }

                                                    $count++;
                                                }

                                                ?>
                                            </ul>

                                        </div>
                                    </div> <!-- .et_pb_text -->
                                </div> <!-- .et_pb_column -->


                            </div> <!-- .et_pb_row -->
                        </div>


                        <div class="et_pb_section et_pb_section_5">
                            <div class="et_pb_row et_pb_row_5">
                                <div class="et_pb_column et_pb_column_4_4 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough et-last-child">

                                    <div class="et_pb_module et_pb_blog_0 blog-all et_pb_posts et_pb_bg_layout_light ">

                                        <div class="et_pb_ajax_pagination_container rs-posts-thum">
                                            <?php

                                            $list_query_options['posts_per_page'] = $lastPostsNumber;
                                            $list_query_options['post__not_in'] = $excluded_posts_ids;

                                            $downBlock = new WP_Query($list_query_options);

                                            if ($downBlock->have_posts()) {
                                                while ($downBlock->have_posts()) : $downBlock->the_post();
                                                    $excluded_posts_ids[] = get_the_ID();
                                                    $image = get_the_post_thumbnail_url();
                                                    if ($image == '') {
                                                        $image = '/wp-content/themes/rsv9/images/no-image.png';
                                                    }
                                            ?>
                                                    <article id="post-<?= get_the_ID() ?>" class="et_pb_post clearfix et_pb_blog_item_3_0 post-<?= get_the_ID() ?> post type-post status-publish format-standard has-post-thumbnail sticky hentry category-design category-q-answers category-thoughts">

                                                        <a href="<?= the_permalink() ?>" class="entry-featured-image-url image-link">
                                                            <img loading="lazy" src="<?= $image ?>" alt="<?= rs_the_title(50) ?>" class="" width="1080" height="675">
                                                        </a>
                                                        <h2 class="entry-title rs-title"><a href="<?= the_permalink() ?>">
                                                                <?php echo  mb_strimwidth(get_the_title(), 0, 50, '...'); ?></a></h2>
                                                        <div class="post-content">
                                                            <div class="post-content-inner rs-content"><?php rs_the_excerpt(90) ?></div>
                                                        </div>
                                                    </article>
                                            <?php

                                                endwhile;
                                            }

                                            ?>

                                        </div>
                                    </div>


                                </div>
                            </div> <!-- .et_pb_row -->
                        </div> <!-- .et_pb_section -->



                        <div class="et_pb_section et_pb_section_7 section-training et_section_regular">




                            <div class="et_pb_row et_pb_row_18">
                                <div class="et_pb_column et_pb_column_4_4 et_pb_column_38  et_pb_css_mix_blend_mode_passthrough et-last-child">


                                    <div class="et_pb_module et_pb_text et_pb_text_39  et_pb_text_align_left et_pb_bg_layout_light">


                                        <div class="et_pb_text_inner">
                                            <h4><a class="hover_single-link-bg-white" href="https://rsstaging.wpengine.com/blog/">Training + Free Stuff</a></h4>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="et_pb_row et_pb_row_19">
                                <div class="et_pb_column et_pb_column_1_3 et_pb_column_39  et_pb_css_mix_blend_mode_passthrough">


                                    <div class="et_pb_module et_pb_video et_pb_video_0">


                                        <div class="et_pb_video_box">
                                            <div class="fluid-width-video-wrapper" style="padding-top: 56.2963%;"><iframe loading="lazy" title="Prototype an Image Comparison Slider in Figma | Figma Fridays" src="https://www.youtube.com/embed/sAF8runymIs?feature=oembed&amp;enablejsapi=1&amp;origin=https%3A%2F%2Frsstaging.wpengine.com" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" name="fitvid0" data-gtm-yt-inspected-33278975_13="true" id="562029411"></iframe></div>
                                        </div>
                                        <div style="background-image:url(https://rsstaging.wpengine.com/wp-content/uploads/2021/08/FigmaFridays-1920x1080-Wide-Cover.png)" class="et_pb_video_overlay">
                                            <div class="et_pb_video_overlay_hover"><a href="#" class="et_pb_video_play"></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et_pb_column et_pb_column_1_3 et_pb_column_40  et_pb_css_mix_blend_mode_passthrough">


                                    <div class="et_pb_module et_pb_video et_pb_video_1">


                                        <div class="et_pb_video_box">
                                            <div class="fluid-width-video-wrapper" style="padding-top: 56.2963%;"><iframe loading="lazy" title="How do I pick the right font?!" src="https://www.youtube.com/embed/5d6bBD91Sc0?feature=oembed&amp;enablejsapi=1&amp;origin=https%3A%2F%2Frsstaging.wpengine.com" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" name="fitvid1" data-gtm-yt-inspected-33278975_13="true" id="743418403"></iframe></div>
                                        </div>
                                        <div style="background-image:url(https://rsstaging.wpengine.com/wp-content/uploads/2021/08/qanswers.png)" class="et_pb_video_overlay">
                                            <div class="et_pb_video_overlay_hover"><a href="#" class="et_pb_video_play"></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et_pb_column et_pb_column_1_3 et_pb_column_41  et_pb_css_mix_blend_mode_passthrough et-last-child">


                                    <div class="et_pb_module et_pb_video et_pb_video_2">


                                        <div class="et_pb_video_box">
                                            <div class="fluid-width-video-wrapper" style="padding-top: 56.2963%;"><iframe loading="lazy" title="How to write great UX placeholder copy" src="https://www.youtube.com/embed/eqn9PzwEtRQ?feature=oembed&amp;enablejsapi=1&amp;origin=https%3A%2F%2Frsstaging.wpengine.com" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" name="fitvid2" data-gtm-yt-inspected-33278975_13="true" id="326113508"></iframe></div>
                                        </div>
                                        <div style="background-image:url(https://rsstaging.wpengine.com/wp-content/uploads/2021/08/how-to-write-grewat-UX-placeholder-copy.png)" class="et_pb_video_overlay">
                                            <div class="et_pb_video_overlay_hover"><a href="#" class="et_pb_video_play"></a></div>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>

                        <div class="et_pb_section et_pb_section_2 section-services et_section_regular">




                            <div class="et_pb_row et_pb_row_6">
                                <div class="et_pb_column et_pb_column_1_2 et_pb_column_14  et_pb_css_mix_blend_mode_passthrough">


                                    <div class="et_pb_module et_pb_text et_pb_text_17  et_pb_text_align_left et_pb_bg_layout_light">


                                        <div class="et_pb_text_inner">
                                            <h2>What kinda help does <strong>your business</strong> need?</h2>
                                            <p>Rocksauce uses design to make stuff better. New solutions for corporations. Company websites that transforms people into customers. Designing + ideating new businesses from ideas that someone sketched out on a napkin.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="et_pb_column et_pb_column_1_2 et_pb_column_15  et_pb_css_mix_blend_mode_passthrough et-last-child et_pb_column_empty">



                                </div>


                            </div>

                            
                            <div class="et_pb_row et_pb_row_7 bg-black__img et_pb_equal_columns">
                                <div class="et_pb_column et_pb_column_1_3 et_pb_column_16  et_pb_css_mix_blend_mode_passthrough">


                                    <div class="et_pb_module et_pb_text et_pb_text_18 et_pb_text_align_left et_pb_bg_layout_light et_multi_view__hover_selector">


                                        <div class="et_pb_text_inner" data-et-multi-view="{&quot;schema&quot;:{&quot;content&quot;:{&quot;desktop&quot;:&quot;<p><img loading=\&quot;lazy\&quot; src=\&quot;https:\/\/rsstaging.wpengine.com\/wp-content\/uploads\/2021\/05\/start-something-new.svg\&quot; width=\&quot;undefined\&quot; height=\&quot;undefined\&quot; alt=\&quot;\&quot; class=\&quot;wp-image-674 alignnone size-medium\&quot; style=\&quot;float: left;\&quot; \/><\/p>\n<h4 style=\&quot;text-align: left;\&quot;><\/h4>\n<h4 style=\&quot;text-align: left;\&quot;><\/h4>\n<p>&nbsp;<\/p>\n<h4 style=\&quot;text-align: left;\&quot;><a class=\&quot;hover_single-link-bg-black\&quot; href=\&quot;#\&quot;>Start something new<\/a><\/h4>\n<p>&nbsp;<\/p>\n<p style=\&quot;text-align: left;\&quot;><span style=\&quot;font-family: HelveticaNeue-Medium; color: #f6f3e0;\&quot;>Start-ups. Entrepreneurs. New business lines or ideas. Rocksauce helps you design a business from concept to your TikTok marketing plan.<br \/><\/span><span style=\&quot;font-family: HelveticaNeue-Medium; color: #f6f3e0;\&quot;><\/span><\/p>&quot;,&quot;tablet&quot;:&quot;<img src=\&quot;https:\/\/rsstaging.wpengine.com\/wp-content\/uploads\/2021\/05\/start-something-new.svg\&quot; width=\&quot;undefined\&quot; height=\&quot;undefined\&quot; alt=\&quot;\&quot; class=\&quot;wp-image-674 alignnone size-medium\&quot; style=\&quot;float: left;\&quot; \/>\n<h4 style=\&quot;text-align: left;\&quot;>            <a class=\&quot;hover_single-link-bg-black\&quot; href=\&quot;#\&quot;>Start something new<\/a><\/h4>\n<p style=\&quot;text-align: left;\&quot;><span style=\&quot;font-family: HelveticaNeue-Medium; color: #f6f3e0;\&quot;>Start-ups. Entrepreneurs. New business lines or ideas. Rocksauce helps you design a business from concept to your TikTok marketing plan.<\/span><\/p>&quot;,&quot;phone&quot;:&quot;<p><img src=\&quot;https:\/\/rsstaging.wpengine.com\/wp-content\/uploads\/2021\/05\/start-something-new.svg\&quot; width=\&quot;51\&quot; height=\&quot;51\&quot; alt=\&quot;\&quot; class=\&quot;wp-image-674 alignnone size-medium\&quot; style=\&quot;float: left;\&quot; \/><\/p>\n<h4 style=\&quot;text-align: left;\&quot;><a class=\&quot;hover_single-link-bg-black\&quot; href=\&quot;#\&quot;>Start something new<\/a><\/h4>\n<p style=\&quot;text-align: left;\&quot;><span style=\&quot;font-family: HelveticaNeue-Medium; color: #f6f3e0;\&quot;>Start-ups. Entrepreneurs. New business lines or ideas. Rocksauce helps you design a business from concept to your TikTok marketing plan.<\/span><\/p>&quot;}},&quot;slug&quot;:&quot;et_pb_text&quot;}" data-et-multi-view-load-tablet-hidden="true" data-et-multi-view-load-phone-hidden="true">
                                            <p><img loading="lazy" src="https://rsstaging.wpengine.com/wp-content/uploads/2021/05/start-something-new.svg" width="undefined" height="undefined" alt="" class="wp-image-674 alignnone size-medium" style="float: left;"></p>
                                            <h4 style="text-align: left;"></h4>
                                            <h4 style="text-align: left;"></h4>
                                            <p>&nbsp;</p>
                                            <h4 style="text-align: left;"><a class="hover_single-link-bg-black" href="#">Start something new</a></h4>
                                            <p>&nbsp;</p>
                                            <p style="text-align: left;"><span style="font-family: HelveticaNeue-Medium; color: #f6f3e0;">Start-ups. Entrepreneurs. New business lines or ideas. Rocksauce helps you design a business from concept to your TikTok marketing plan.<br></span><span style="font-family: HelveticaNeue-Medium; color: #f6f3e0;"></span></p>
                                        </div>
                                    </div>
                                    <div class="et_pb_button_module_wrapper et_pb_button_6_wrapper  et_pb_module ">
                                        <a class="et_pb_button et_pb_button_6 btn-orange w-full et_pb_bg_layout_light" href="https://rsstaging.wpengine.com/contact/">This you, boo? Then click it</a>
                                    </div>
                                </div>
                                <div class="et_pb_column et_pb_column_1_3 et_pb_column_17  et_pb_css_mix_blend_mode_passthrough">


                                    <div class="et_pb_module et_pb_text et_pb_text_19 et_pb_text_align_left et_pb_bg_layout_light et_multi_view__hover_selector">


                                        <div class="et_pb_text_inner" data-et-multi-view="{&quot;schema&quot;:{&quot;content&quot;:{&quot;desktop&quot;:&quot;<p><img loading=\&quot;lazy\&quot; src=\&quot;https:\/\/rsstaging.wpengine.com\/wp-content\/uploads\/2021\/05\/update-and-refresh.svg\&quot; width=\&quot;undefined\&quot; height=\&quot;undefined\&quot; alt=\&quot;\&quot; class=\&quot;wp-image-673 alignnone size-medium\&quot; style=\&quot;float: left;\&quot; \/><\/p>\n<h4><\/h4>\n<h4><\/h4>\n<p>&nbsp;<\/p>\n<h4 style=\&quot;text-align: left;\&quot;><a class=\&quot;hover_single-link-bg-black\&quot; href=\&quot;#\&quot;>Update + refresh<\/a><\/h4>\n<p>&nbsp;<\/p>\n<p style=\&quot;text-align: left;\&quot;><span style=\&quot;font-family: HelveticaNeue-Medium; color: #f6f3e0;\&quot;>Brand refresh. New company website to entice customers. Fix UX + design issues with your app or software. Bring new life to your business + products.<\/span><\/p>&quot;,&quot;tablet&quot;:&quot;<p><img src=\&quot;https:\/\/rsstaging.wpengine.com\/wp-content\/uploads\/2021\/05\/update-and-refresh.svg\&quot; width=\&quot;undefined\&quot; height=\&quot;undefined\&quot; alt=\&quot;\&quot; class=\&quot;wp-image-673 alignnone size-medium\&quot; style=\&quot;float: left;\&quot; \/><\/p>\n<h4><\/h4>\n<h4 style=\&quot;text-align: left;\&quot;>                 <a class=\&quot;hover_single-link-bg-black\&quot; href=\&quot;#\&quot;>Update + refresh<\/a><\/h4>\n\n<p style=\&quot;text-align: left;\&quot;><span style=\&quot;font-family: HelveticaNeue-Medium; color: #f6f3e0;\&quot;>Brand refresh. New company website to entice customers. Fixing UX + design issues with your app or software. Bring new life to your business + products.<\/span><\/p>&quot;,&quot;phone&quot;:&quot;<img src=\&quot;https:\/\/rsstaging.wpengine.com\/wp-content\/uploads\/2021\/05\/update-and-refresh.svg\&quot; width=\&quot;51\&quot; height=\&quot;51\&quot; alt=\&quot;\&quot; class=\&quot;wp-image-673 alignnone size-medium\&quot; style=\&quot;float: left;\&quot; \/>\n<h4 style=\&quot;text-align: left;\&quot;><a class=\&quot;hover_single-link-bg-black\&quot; href=\&quot;#\&quot;>Update + refresh<\/a><\/h4>\n<p style=\&quot;text-align: left;\&quot;><span style=\&quot;font-family: HelveticaNeue-Medium; color: #f6f3e0;\&quot;>Brand refresh. New company website to entice customers. Fixing UX + design issues with your app or software. Bring new life to your business + products.<\/span><\/p>&quot;}},&quot;slug&quot;:&quot;et_pb_text&quot;}" data-et-multi-view-load-tablet-hidden="true" data-et-multi-view-load-phone-hidden="true">
                                            <p><img loading="lazy" src="https://rsstaging.wpengine.com/wp-content/uploads/2021/05/update-and-refresh.svg" width="undefined" height="undefined" alt="" class="wp-image-673 alignnone size-medium" style="float: left;"></p>
                                            <h4></h4>
                                            <h4></h4>
                                            <p>&nbsp;</p>
                                            <h4 style="text-align: left;"><a class="hover_single-link-bg-black" href="#">Update + refresh</a></h4>
                                            <p>&nbsp;</p>
                                            <p style="text-align: left;"><span style="font-family: HelveticaNeue-Medium; color: #f6f3e0;">Brand refresh. New company website to entice customers. Fix UX + design issues with your app or software. Bring new life to your business + products.</span></p>
                                        </div>
                                    </div>
                                    <div class="et_pb_button_module_wrapper et_pb_button_7_wrapper  et_pb_module ">
                                        <a class="et_pb_button et_pb_button_7 btn-orange w-full et_pb_bg_layout_light" href="https://rsstaging.wpengine.com/contact/">Click to get so fresh + so clean (clean)</a>
                                    </div>
                                </div>
                                <div class="et_pb_column et_pb_column_1_3 et_pb_column_18  et_pb_css_mix_blend_mode_passthrough et-last-child">


                                    <div class="et_pb_module et_pb_text et_pb_text_20 et_pb_text_align_left et_pb_bg_layout_light et_multi_view__hover_selector">


                                        <div class="et_pb_text_inner" data-et-multi-view="{&quot;schema&quot;:{&quot;content&quot;:{&quot;desktop&quot;:&quot;<p><img loading=\&quot;lazy\&quot; src=\&quot;https:\/\/rsstaging.wpengine.com\/wp-content\/uploads\/2021\/05\/innovate-internally.svg\&quot; width=\&quot;undefined\&quot; height=\&quot;undefined\&quot; alt=\&quot;\&quot; class=\&quot;wp-image-672 alignnone size-medium\&quot; style=\&quot;float: left;\&quot; \/><\/p>\n<h4><\/h4>\n<h4><\/h4>\n<p>&nbsp;<\/p>\n<h4 style=\&quot;text-align: left;\&quot;><a class=\&quot;hover_single-link-bg-black\&quot; href=\&quot;#\&quot;>Innovate internally<\/a><\/h4>\n<p style=\&quot;text-align: left;\&quot;><span style=\&quot;font-family: HelveticaNeue-Medium; color: #f6f3e0;\&quot;><br \/>Enterprise companies know start-ups are coming for their customers. Intrapreneurs + internal innovators work with Rocksauce to digitally transform how they do business.<\/span><\/p>\n<p>&nbsp;<\/p>\n<p style=\&quot;text-align: left;\&quot;><span style=\&quot;font-family: HelveticaNeue-Medium; color: #f6f3e0;\&quot;><\/span><\/p>\n<p style=\&quot;text-align: left;\&quot;><span style=\&quot;font-family: HelveticaNeue-Medium; color: #f6f3e0;\&quot;>\u00a0<\/span><\/p>&quot;,&quot;tablet&quot;:&quot;<img src=\&quot;https:\/\/rsstaging.wpengine.com\/wp-content\/uploads\/2021\/05\/innovate-internally.svg\&quot; width=\&quot;100px\&quot; height=\&quot;100px\&quot; alt=\&quot;\&quot; class=\&quot;wp-image-672 alignnone size-medium\&quot; style=\&quot;float: left;\&quot; \/>\n<h4><\/h4>\n<h4 style=\&quot;text-align: left;\&quot;><a class=\&quot;hover_single-link-bg-black\&quot; href=\&quot;#\&quot;>Innovate internally<\/a><\/h4>\n<p style=\&quot;text-align: left;\&quot;><span style=\&quot;font-family: HelveticaNeue-Medium; color: #f6f3e0;\&quot;>Enterprise companies know start-ups are coming for their customers. Intrapreneurs + internal innovators work with Rocksauce to digitally transform how they do business.<\/span><\/p>&quot;,&quot;phone&quot;:&quot;<p><img src=\&quot;https:\/\/rsstaging.wpengine.com\/wp-content\/uploads\/2021\/05\/innovate-internally.svg\&quot; width=\&quot;51\&quot; height=\&quot;51\&quot; alt=\&quot;\&quot; class=\&quot;wp-image-672 alignnone size-medium\&quot; style=\&quot;float: left;\&quot; \/><\/p>\n<h4 style=\&quot;text-align: left;\&quot;><a class=\&quot;hover_single-link-bg-black\&quot; href=\&quot;#\&quot;>Innovate internally<\/a><\/h4>\n<p style=\&quot;text-align: left;\&quot;><span style=\&quot;font-family: HelveticaNeue-Medium; color: #f6f3e0;\&quot;>Enterprise companies know start-ups are coming for their customers. Intrapreneurs + internal innovators work with Rocksauce to digitally transform how they do business.<\/span><\/p>&quot;}},&quot;slug&quot;:&quot;et_pb_text&quot;}" data-et-multi-view-load-tablet-hidden="true" data-et-multi-view-load-phone-hidden="true">
                                            <p><img loading="lazy" src="https://rsstaging.wpengine.com/wp-content/uploads/2021/05/innovate-internally.svg" width="undefined" height="undefined" alt="" class="wp-image-672 alignnone size-medium" style="float: left;"></p>
                                            <h4></h4>
                                            <h4></h4>
                                            <p>&nbsp;</p>
                                            <h4 style="text-align: left;"><a class="hover_single-link-bg-black" href="#">Innovate internally</a></h4>
                                            <p style="text-align: left;"><span style="font-family: HelveticaNeue-Medium; color: #f6f3e0;"><br>Enterprise companies know start-ups are coming for their customers. Intrapreneurs + internal innovators work with Rocksauce to digitally transform how they do business.</span></p>
                                            <p>&nbsp;</p>
                                            <p style="text-align: left;"><span style="font-family: HelveticaNeue-Medium; color: #f6f3e0;"></span></p>
                                            <p style="text-align: left;"><span style="font-family: HelveticaNeue-Medium; color: #f6f3e0;">&nbsp;</span></p>
                                        </div>
                                    </div>
                                    <div class="et_pb_button_module_wrapper et_pb_button_8_wrapper et_pb_button_alignment_left et_pb_button_alignment_tablet_center et_pb_button_alignment_phone_center et_pb_module ">
                                        <a class="et_pb_button et_pb_button_8 btn-orange w-full et_pb_bg_layout_light" href="https://rsstaging.wpengine.com/contact/">Company, click to heal thyself</a>
                                    </div>
                                </div>


                            </div>
                            <div class="et_pb_row et_pb_row_8">
                                <div class="et_pb_column et_pb_column_4_4 et_pb_column_19  et_pb_css_mix_blend_mode_passthrough et-last-child et_pb_column_empty">



                                </div>


                            </div>


                        </div>

                    </div>

                </div>
            </div>

        </article>
    </div>
</div>
<script src="/wp-content/themes/Divi/core/admin/js/common.js?ver=4.9.7"></script>
<script src="/wp-content/themes/Divi/js/custom.unified.js?ver=1.0.0"></script>


<?php


get_footer(); ?>