<?php

function three_posts_function()
{
    remove_all_filters('posts_orderby');

    $list_query_options = array(
        'posts_per_page' => 2,
    );


    $list_query_options['post_type'] = 'post';
    $list_query_options['order'] = 'DESC';
    $list_query_options['orderby'] = 'date';

    $blockLeft = new WP_Query($list_query_options);

    $grid_posts = array();

    if ($blockLeft->have_posts()) {
        while ($blockLeft->have_posts()) : $blockLeft->the_post();

        $image = get_the_post_thumbnail_url();
        if( $image == ''){
            $image = '/wp-content/themes/rsv9/images/no-image.png';
        }

            $grid_posts[] = array(
                'id' => get_the_ID(),
                'image' => $image,
                'perma_link' => get_permalink(),
                'title' => rs_the_title_str(50),
                'description' => rs_the_excerpt_str(250)

            );

        endwhile;
    }

    ob_start();

?>

    <div class="et_pb_row et_pb_row_2 rs-b2  blog-cols" id="two-columns">
        <div class="et_pb_column et_pb_column_2_5 et_pb_column_3  et_pb_css_mix_blend_mode_passthrough">
            <div class="et_pb_module et_pb_blog_1 et_pb_posts et_pb_bg_layout_light rs-b2-lc">
                <div class="et_pb_ajax_pagination_container et_pb_container_single-post">
                    <?php

                    for ($iteration = 0; $iteration < 2; $iteration++) {
                        $post = $grid_posts[$iteration];
                    ?>
                        <article id="post-<?= $post['id'] ?>" class="block-one et_pb_post clearfix et_pb_blog_item_1_0 post-<?= $post['id'] ?> post type-post status-publish format-standard has-post-thumbnail hentry">

                            <a href="<?= $post['perma_link'] ?>" class="entry-featured-image-url image-link">
                                <div class="et_pb_post background_image" style="background-image: url('<?= $post['image'] ?>')"></div>
                            </a>
                            <h2 class="entry-title"><a class="hover_black_orage" href="<?= $post['perma_link'] ?>"><?= $post['title'] ?></a></h2>

                        </article> <!-- .et_pb_post -->
                    <?php
                    }

                    ?>

                </div>
            </div> <!-- .et_pb_posts -->
        </div> <!-- .et_pb_column -->
        <div class="et_pb_column et_pb_column_3_5 et_pb_column_4  et_pb_css_mix_blend_mode_passthrough et-last-child">
            <div class="et_pb_module et_pb_blog_2 et_pb_posts et_pb_bg_layout_light rs-b2-rc ">
                <div class="et_pb_ajax_pagination_container et_pb_container_single-post">
                    <?php $post =  end($grid_posts); ?>
                    <article id="post-<?= $post['id'] ?>" class="block-two et_pb_post clearfix et_pb_blog_item_2_0 post-<?= $post['id'] ?> post type-post status-publish format-standard has-post-thumbnail hentry category-design category-development">

                        <a href="<?= $post['perma_link']  ?>" class="entry-featured-image-url image-link">
                            <div class="et_pb_post background_image" style="background-image: url('<?= $image ?>')"></div>
                        </a>
                        <h2 class="entry-title"><a class="hover_black_orage" href="<?= $post['perma_link']  ?>"><?= $post['title']  ?></a></h2>

                        <div class="post-content">
                            <div class="post-content-inner">
                                <?php $post['description'] ?>
                            </div>
                        </div>
                    </article> <!-- .et_pb_post -->

                </div>
            </div> <!-- .et_pb_posts -->
        </div> <!-- .et_pb_column -->
    </div> <!-- .et_pb_row -->

<?php
    return ob_get_clean();

}


add_shortcode('three_posts', 'three_posts_function');
