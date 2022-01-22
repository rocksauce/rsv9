<?php /* Template Name: Thank you Template page */ ?>

<?php
get_header();


$category = get_queried_object();
$sliderNumberPosts = 4; //get this from configuration 5
$listNumberPosts = 4; //get this from configuration 4
$blockListNumberPost = 1; //get this from configuration 4
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

                        <div class="et_pb_section et_pb_section_3 section-idea et_pb_section_parallax et_pb_with_background et_section_regular rsv-9-add">

                            <div class="et_parallax_bg_wrap">
                                <div class="et_parallax_bg et_pb_parallax_css" style="background-image: url(https://www.rocksaucestudios.com/wp-content/uploads/2021/04/RS-Spring-Enterprise-Web-HD-16x9-300dpi-2425-1.jpg);"></div>
                            </div>


                            <div class="et_pb_row et_pb_row_3">
                                <div class="et_pb_column et_pb_column_4_4 et_pb_column_5  et_pb_css_mix_blend_mode_passthrough et-last-child">


                                    <div class="et_pb_module et_pb_text et_pb_text_1  et_pb_text_align_left et_pb_bg_layout_light">

                                        <div class="et_pb_text_inner add_cta_content">
                                            <h2>Thank You! <br> You're <span>In!</span></h2>

                                        </div>

                                        <div class="et_pb_text_inner add_cta_content">

                                            <p>You went car shopping recently. How important was finding a car that would interact with your smartphone? Finding a car that would interact with my smartphone was pretty important. Even more than that, it was about having a strong onboard communication system that seemed cohesive, seemed to work together and had an overall solid interface</p>
                                        </div>
                                    </div> <!-- .et_pb_text -->
                                </div> <!-- .et_pb_column -->


                            </div> <!-- .et_pb_row -->

                        </div>


                        <div id="two-columns" class="et_pb_section et_pb_section_2 blog-cols et_section_regular">
                            <div class="et_pb_row et_pb_row_2 rs-b2">
                                <div class="et_pb_column et_pb_column_2_5 et_pb_column_3  et_pb_css_mix_blend_mode_passthrough">
                                    <div class="et_pb_module et_pb_blog_1 et_pb_posts et_pb_bg_layout_light rs-b2-lc">
                                        <div class="et_pb_ajax_pagination_container et_pb_container_single-post">
                                            <?php
                                            $list_query_options['posts_per_page'] = $blockListNumberPost;
                                            $list_query_options['post__not_in'] = $excluded_posts_ids;

                                            $blockLeft = new WP_Query($list_query_options);

                                            if ($blockLeft->have_posts()) {
                                                while ($blockLeft->have_posts()) : $blockLeft->the_post();
                                                    $excluded_posts_ids[] = get_the_ID();
                                                    $image = get_the_post_thumbnail_url();
                                                    if ($image == '') {
                                                        $image = '/wp-content/themes/rsv9/images/no-image.png';
                                                    }

                                            ?>
                                                    <article id="post-<?= get_the_ID() ?>" class="block-one et_pb_post clearfix et_pb_blog_item_1_0 post-<?= get_the_ID() ?> post type-post status-publish format-standard has-post-thumbnail hentry">

                                                        <a href="<?= the_permalink() ?>" class="entry-featured-image-url image-link">
                                                        <div class="et_pb_post background_image" style="background-image: url('<?= $image ?>')"></div>
                                                        </a>
                                                        <h2 class="entry-title"><a class="hover_black_orage" href="<?= the_permalink() ?>"><?= rs_the_title(50) ?></a></h2>

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
                                <div class="et_pb_column et_pb_column_3_5 et_pb_column_4  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                    <div class="et_pb_module et_pb_blog_2 et_pb_posts et_pb_bg_layout_light rs-b2-rc ">
                                        <div class="et_pb_ajax_pagination_container et_pb_container_single-post">
                                            <?php
                                            $list_query_options['posts_per_page'] = $blockListNumberPostRight;
                                            $list_query_options['post__not_in'] = $excluded_posts_ids;

                                            $blockRight = new WP_Query($list_query_options);

                                            if ($blockRight->have_posts()) {
                                                while ($blockRight->have_posts()) : $blockRight->the_post();
                                                    $excluded_posts_ids[] = get_the_ID();
                                                    $image = get_the_post_thumbnail_url();
                                                    if ($image == '') {
                                                        $image = '/wp-content/themes/rsv9/images/no-image.png';
                                                    }
                                            ?>
                                                    <article id="post-<?= get_the_ID() ?>" class="block-two et_pb_post clearfix et_pb_blog_item_2_0 post-<?= get_the_ID() ?> post type-post status-publish format-standard has-post-thumbnail hentry category-design category-development">

                                                        <a href="<?= the_permalink() ?>" class="entry-featured-image-url image-link">
                                                        <div class="et_pb_post background_image" style="background-image: url('<?= $image ?>')"></div>
                                                        </a>
                                                        <h2 class="entry-title"><a class="hover_black_orage" href="<?= the_permalink() ?>"><?= rs_the_title(50) ?></a></h2>

                                                        <div class="post-content">
                                                            <div class="post-content-inner">
                                                                <?php rs_the_excerpt(250) ?>
                                                            </div>
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


                        <div class="et_pb_section et_pb_section_7 section-training remove-margin et_section_regular">




                            <div class="et_pb_row et_pb_row_18">
                                <div class="et_pb_column et_pb_column_4_4 et_pb_column_38  et_pb_css_mix_blend_mode_passthrough et-last-child">


                                    <div class="et_pb_module et_pb_text et_pb_text_39  et_pb_text_align_left et_pb_bg_layout_light">


                                        <div class="et_pb_text_inner">
                                            <h4><a class="hover_single-link-bg-white" href="https://www.rocksaucestudios.com/blog/">Training + Free Stuff</a></h4>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="et_pb_row et_pb_row_19 et_pb_row_flex">
                                <div class="et_pb_column et_pb_column_1_3 et_pb_column_39  et_pb_css_mix_blend_mode_passthrough add_flex flex-column">


                                    <div class="et_pb_module et_pb_video et_pb_video_0">


                                        <div class="et_pb_video_box">
                                            <div class="fluid-width-video-wrapper" style="padding-top: 56.2963%;"><iframe loading="lazy" title="Prototype an Image Comparison Slider in Figma | Figma Fridays" src="https://www.youtube.com/embed/sAF8runymIs?feature=oembed&amp;enablejsapi=1&amp;origin=https%3A%2F%2Frsstaging.wpengine.com" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" name="fitvid0" data-gtm-yt-inspected-33278975_13="true" id="562029411"></iframe></div>
                                        </div>
                                        <div style="background-image:url(https://www.rocksaucestudios.com/wp-content/uploads/2021/08/FigmaFridays-1920x1080-Wide-Cover.png)" class="et_pb_video_overlay">
                                            <div class="et_pb_video_overlay_hover"><a href="#" class="et_pb_video_play"></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et_pb_column et_pb_column_1_3 et_pb_column_40  et_pb_css_mix_blend_mode_passthrough">


                                    <div class="et_pb_module et_pb_video et_pb_video_1">


                                        <div class="et_pb_video_box">
                                            <div class="fluid-width-video-wrapper" style="padding-top: 56.2963%;"><iframe loading="lazy" title="How do I pick the right font?!" src="https://www.youtube.com/embed/5d6bBD91Sc0?feature=oembed&amp;enablejsapi=1&amp;origin=https%3A%2F%2Frsstaging.wpengine.com" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" name="fitvid1" data-gtm-yt-inspected-33278975_13="true" id="743418403"></iframe></div>
                                        </div>
                                        <div style="background-image:url(https://www.rocksaucestudios.com/wp-content/uploads/2021/08/qanswers.png)" class="et_pb_video_overlay">
                                            <div class="et_pb_video_overlay_hover"><a href="#" class="et_pb_video_play"></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et_pb_column et_pb_column_1_3 et_pb_column_41  et_pb_css_mix_blend_mode_passthrough et-last-child">


                                    <div class="et_pb_module et_pb_video et_pb_video_2">


                                        <div class="et_pb_video_box">
                                            <div class="fluid-width-video-wrapper" style="padding-top: 56.2963%;"><iframe loading="lazy" title="How to write great UX placeholder copy" src="https://www.youtube.com/embed/eqn9PzwEtRQ?feature=oembed&amp;enablejsapi=1&amp;origin=https%3A%2F%2Frsstaging.wpengine.com" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" name="fitvid2" data-gtm-yt-inspected-33278975_13="true" id="326113508"></iframe></div>
                                        </div>
                                        <div style="background-image:url(https://www.rocksaucestudios.com/wp-content/uploads/2021/08/how-to-write-grewat-UX-placeholder-copy.png)" class="et_pb_video_overlay">
                                            <div class="et_pb_video_overlay_hover"><a href="#" class="et_pb_video_play"></a></div>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>


                        <div class="et_pb_section et_pb_section_5">
                            <div class="et_pb_row et_pb_row_5">
                                <div class="et_pb_grid et_pb_column et_pb_column_4_4 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough et-last-child">

                                    <div class="et_pb_module et_pb_blog_0 blog-all et_pb_posts et_pb_bg_layout_light ">

                                        <div class="et_pb_ajax_pagination_container et_pb_container_single-post rs-posts-thum ">
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
                                                            <div class="et_pb_post background_image" style="background-image: url('<?= $image ?>')"></div>
                                                        </a>
                                                        <h2 class="entry-title rs-title"><a href="<?= the_permalink() ?>">
                                        
                                                            <a class="hover_black_orage" href="<?= the_permalink() ?>"><?= rs_the_title(50) ?><?php echo  mb_strimwidth(get_the_title(), 0, 50, '...'); ?></a>
                                                        </h2>
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



                    </div>

                </div>
            </div>

        </article>
    </div>
</div>
<script src="/wp-content/themes/Divi/core/admin/js/common.js?ver=4.9.7"></script>
<script src="/wp-content/themes/Divi/js/custom.unified.js?ver=1.0.0"></script>

<?php

get_footer();
