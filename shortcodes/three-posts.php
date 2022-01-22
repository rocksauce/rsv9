<?php

function three_posts_function()
{

    $category = get_queried_object();
    $sliderNumberPosts = 4; //get this from configuration 5
    $blockListNumberPost = 1; //get this from configuration 4
    $blockListNumberPostRight = 1; //get this from configuration 4


    if (!isset($category->term_id)) {
        $list_query_options = array(
            'posts_per_page' => $sliderNumberPosts - 1,
        );
    } else {

        $list_query_options = array(
            'cat' => $category->cat_ID,
            'posts_per_page' => $sliderNumberPosts,
        );

    }

    $list_query_options['post_type'] = 'post';
    $list_query_options['order'] = 'DESC';
    $list_query_options['orderby'] = 'date';

?>

    <div id="two-columns" class="et_pb_section et_pb_section_2 blog-cols et_section_regular">
        <div class="et_pb_row et_pb_row_2 rs-b2">
            <div class="et_pb_column et_pb_column_2_5 et_pb_column_3  et_pb_css_mix_blend_mode_passthrough">
                <div class="et_pb_module et_pb_blog_1 et_pb_posts et_pb_bg_layout_light rs-b2-lc">
                    <div class="et_pb_ajax_pagination_container et_pb_container_single-post">
                        <?php
                        $list_query_options['posts_per_page'] = $blockListNumberPost;
                        $list_query_options['post__not_in'] = array();

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

<?php


}


add_shortcode('three_posts', 'three_posts_function');
