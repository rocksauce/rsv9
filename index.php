<?php
get_header();


$category = get_queried_object();
$sliderNumberPosts = 4; //get this from configuration 5
$listNumberPosts = 4; //get this from configuration 4
$blockListNumberPost = 2; //get this from configuration 4
$blockListNumberPostRight = 1; //get this from configuration 4
$lastPostsNumber = 6;

$total_posts = $sliderNumberPosts + $listNumberPosts + $blockListNumberPost + $blockListNumberPostRight + $lastPostsNumber;

$show_design_safari = true;
$category_id = 0;

if(!isset($category->term_id)){
    $list_query_options = array(
        'posts_per_page' => $sliderNumberPosts - 1,
    );

}else{
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
                    <?php get_template_part( 'blog/header_menu', 'page' ); ?>

                    <div class="et_pb_section et_pb_section_1 blog-intro et_section_regular">
                        <div class="et_pb_row et_pb_row_1">
                            <div class="et_pb_column et_pb_column_3_5 et_pb_column_1  et_pb_css_mix_blend_mode_passthrough">
                                <div class="et_pb_module et_pb_post_slider et_pb_post_slider_0 et_pb_slider et_pb_post_slider_image_background et_pb_slider_fullwidth_off et_pb_slider_with_overlay et_pb_bg_layout_dark">
                                    <div class="et_pb_slides rsv9_slides">

                                        <?php

                                            $lists_posts = new WP_Query( $list_query_options );

                                            if($lists_posts->have_posts() ){
                                                while ( $lists_posts->have_posts() ) : $lists_posts->the_post();
                                                $excluded_posts_ids[] = get_the_ID();
                                            ?>
                                                <div class="et_pb_slide et_pb_bg_layout_dark et_pb_post_slide-<?=get_the_ID()?> et-pb-active-slide" style="background-image: url(<?= get_the_post_thumbnail_url()?>);">
                                                    <div class="et_pb_slide_overlay_container"></div>
                                                    <div class="et_pb_container clearfix" style="height: 410px;">
                                                        <div class="et_pb_slider_container_inner">
                                                            <div class="et_pb_slide_description">
                                                            <h2 class="et_pb_slide_title">
                                                                <a  href="<?php the_permalink(); ?>">
                                                                <span><?=rs_the_title(80)?></span>
                                                                </a>
                                                            </h2>
                                                                <div class="et_pb_slide_content
                                                                    ">
                                                                    <?php rs_the_excerpt(250) ?>
                                                                </div>
                                                            </div> <!-- .et_pb_slide_description -->
                                                        </div>
                                                    </div> <!-- .et_pb_container -->
                                                </div> <!-- .et_pb_slide -->
                                            <?php
                                                wp_reset_postdata();
                                                endwhile;
                                            }else{
                                                get_template_part( 'includes/no-results', 'index' );
                                            }

                                        ?>
                                    </div> <!-- .et_pb_slides -->

                                    <div class="et-pb-slider-arrows"><a class="et-pb-arrow-prev" href="#"><span>Previous</span></a><a class="et-pb-arrow-next" href="#"><span>Next</span></a></div>
                                    <div class="et-pb-controllers">

                                        <?php
                                            for ($i=1; $i < $sliderNumberPosts; $i++) {
                                        ?>
                                                <a href="#"><?=$i?></a>
                                        <?php
                                            }
                                        ?>

                                    </div>
                                </div> <!-- .et_pb_slider -->

                            </div> <!-- .et_pb_column -->
                            <div class="et_pb_column et_pb_column_2_5 et_pb_column_2  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                <div class="et_pb_module et_pb_blog_0 small-posts et_pb_posts et_pb_bg_layout_light ">
                                    <div class="et_pb_ajax_pagination_container posts_list_rsv9">

                                        <?php

                                            $list_query_options['posts_per_page'] = $listNumberPosts;
                                            $list_query_options['post__not_in'] = $excluded_posts_ids;

                                            $list = new WP_Query( $list_query_options );

                                            if($list->have_posts() ){
                                                while ( $list->have_posts() ) : $list->the_post();

                                                $excluded_posts_ids[] = get_the_ID();
                                                $image = get_the_post_thumbnail_url();
                                                if( $image == ''){
                                                    $image = '/wp-content/themes/rsv9/images/no-image.png';
                                                }
                                        ?>
                                                    <article id="post-<?=get_the_ID()?>" class="et_pb_post clearfix et_pb_blog_item_0_0 post-<?=get_the_ID()?> post type-post status-publish format-standard has-post-thumbnail hentry category-media">

                                                        <a href="<?= the_permalink() ?>" class="entry-featured-image-url"><img loading="lazy" src="<?= $image ?>" alt="<?=rs_the_title(50)?>" class="" width="1080" height="675"></a>
                                                        <h2 class="entry-title"><a href="<?= the_permalink() ?>"><?=rs_the_title(50)?></a></h2>

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

                    <div class="et_pb_section et_pb_section_2 blog-cols et_section_regular">
                        <div class="et_pb_row et_pb_row_2 rs-b2">
                            <div class="et_pb_column et_pb_column_2_5 et_pb_column_3  et_pb_css_mix_blend_mode_passthrough">
                                <div class="et_pb_module et_pb_blog_1 et_pb_posts et_pb_bg_layout_light rs-b2-lc">
                                    <div class="et_pb_ajax_pagination_container">
                                        <?php
                                                $list_query_options['posts_per_page'] = $blockListNumberPost;
                                                $list_query_options['post__not_in'] = $excluded_posts_ids;

                                                $blockLeft = new WP_Query( $list_query_options );

                                                if($blockLeft->have_posts() ){
                                                    while ( $blockLeft->have_posts() ) : $blockLeft->the_post();
                                                    $excluded_posts_ids[] = get_the_ID();
                                                    $image = get_the_post_thumbnail_url();
                                                    if( $image == ''){
                                                        $image = '/wp-content/themes/rsv9/images/no-image.png';
                                                    }

                                        ?>
                                                    <article id="post-<?= get_the_ID()?>" class="block-one et_pb_post clearfix et_pb_blog_item_1_0 post-<?= get_the_ID()?> post type-post status-publish format-standard has-post-thumbnail hentry">

                                                        <a href="<?= the_permalink() ?>" class="entry-featured-image-url image-link"><img loading="lazy" src="<?= $image ?>" alt="<?= rs_the_title(50) ?>" class="" width="1080" height="300"></a>
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
                            <div class="et_pb_column et_pb_column_3_5 et_pb_column_4  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                <div class="et_pb_module et_pb_blog_2 et_pb_posts et_pb_bg_layout_light rs-b2-rc ">
                                    <div class="et_pb_ajax_pagination_container">
                                    <?php
                                                $list_query_options['posts_per_page'] = $blockListNumberPostRight;
                                                $list_query_options['post__not_in'] = $excluded_posts_ids;

                                                $blockRight = new WP_Query( $list_query_options );

                                                if($blockRight->have_posts() ){
                                                    while ( $blockRight->have_posts() ) : $blockRight->the_post();
                                                        $excluded_posts_ids[] = get_the_ID();
                                                        $image = get_the_post_thumbnail_url();
                                                        if( $image == ''){
                                                            $image = '/wp-content/themes/rsv9/images/no-image.png';
                                                        }
                                        ?>
                                                        <article  id="post-<?= get_the_ID()?>"  class="block-two et_pb_post clearfix et_pb_blog_item_2_0 post-<?= get_the_ID()?> post type-post status-publish format-standard has-post-thumbnail hentry category-design category-development">

                                                        <a href="<?= the_permalink() ?>" class="entry-featured-image-url image-link"><img loading="lazy" src="<?= $image ?>" alt="What is a Design Sprint? (Part Two)" class="" width="1080" height="675"></a>
                                                            <h2 class="entry-title"><a href="<?= the_permalink() ?>"><?= rs_the_title(50) ?></a></h2>

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

                    <?php get_template_part( 'blog/ad', 'page' ); ?>

                    <div class="et_pb_section et_pb_section_5">
                        <div class="et_pb_row et_pb_row_5">
                            <div class="et_pb_column et_pb_column_4_4 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough et-last-child">

                                <div class="et_pb_module et_pb_blog_0 blog-all et_pb_posts et_pb_bg_layout_light ">

                                    <div class="et_pb_ajax_pagination_container rs-posts-thum">
                                        <?php

                                            $list_query_options['posts_per_page'] = $lastPostsNumber;
                                            $list_query_options['post__not_in'] = $excluded_posts_ids;

                                            $downBlock = new WP_Query( $list_query_options );

                                            if($downBlock->have_posts() ){
                                                while ( $downBlock->have_posts() ) : $downBlock->the_post();
                                                    $excluded_posts_ids[] = get_the_ID();
                                                    $image = get_the_post_thumbnail_url();
                                                    if( $image == ''){
                                                        $image = '/wp-content/themes/rsv9/images/no-image.png';
                                                    }
                                        ?>
                                                    <article id="post-<?= get_the_ID()?>" class="et_pb_post clearfix et_pb_blog_item_3_0 post-<?= get_the_ID()?> post type-post status-publish format-standard has-post-thumbnail sticky hentry category-design category-q-answers category-thoughts">

                                                        <a href="<?= the_permalink() ?>" class="entry-featured-image-url image-link">
                                                            <img loading="lazy" src="<?= $image ?>" alt="<?= rs_the_title(50) ?>" class="" width="1080" height="675">
                                                        </a>
                                                        <h2 class="entry-title rs-title"><a href="<?= the_permalink() ?>">
                                                            <?php echo  mb_strimwidth( get_the_title(), 0, 50, '...' ); ?></a></h2>
                                                        <div class="post-content">
                                                            <div class="post-content-inner rs-content"><?php rs_the_excerpt( 90 ) ?></div>
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


                    <div class="" id="more_posts">

                    </div>




                </div>

                <div class="et_pb_section et_pb_section_6 recent-post recent-post-small et_section_regular">

                    <div class="et_pb_row et_pb_row_7 rs-load-more">
                        <div class="et_pb_column et_pb_column_4_4 et_pb_column_13  et_pb_css_mix_blend_mode_passthrough et-last-child">


                            <div class="et_pb_button_module_wrapper et_pb_button_2_wrapper  et_pb_module ">
                                <button id="load_more_posts" class="et_pb_button et_pb_button_2 btn-dark-blue et_pb_bg_layout_light" >Click to load more</button>
                                <div id="hide_no_resulsts">
                                    <?php get_template_part( 'includes/no-results', 'index' ); ?>
                                </div>
                            </div>
                        </div> <!-- .et_pb_column -->


                    </div> <!-- .et_pb_row -->



                </div> <!-- .et_pb_section -->

                <?php get_template_part( 'blog/testimonial', 'page' ); ?>
            </div>
        </div>

    </article>
</div>
</div>
<script src="/wp-content/themes/Divi/core/admin/js/common.js?ver=4.9.7"></script>
<script src="/wp-content/themes/Divi/js/custom.unified.js?ver=1.0.0"></script>
<script>

window.excluded_ids  = <?=json_encode($excluded_posts_ids)?> ;
window.category_id  = '<?= $category_id ?>';

jQuery( document ).ready(function() {
    setTimeout(
        function(){
            jQuery( "#main-header" ).addClass( 'et-fixed-header');
        },
        1000
    );
});
</script>

<?php

get_footer();

