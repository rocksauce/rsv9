<?php

global $xcluded_ids;
global $no_more_items;

$xcluded_ids = $_POST['data']['excluded_ids'];
$category_id = $_POST['data']['category_id'];

if($category_id == 0){
    $list_query_options = array(

    );

}else{
    $list_query_options = array(
        'cat' => $category_id,

    );
}

$list_query_options['post_type'] = 'post';
$list_query_options['order'] = 'DESC';
$list_query_options['orderby'] = 'date';

$list_query_options['posts_per_page'] = 9;
$list_query_options['post__not_in'] = $xcluded_ids;

$blockLeft = new WP_Query( $list_query_options );

if($blockLeft->have_posts() ){
    get_template_part( 'blog/ad', 'page' )
?>
<div class="et_pb_section et_pb_section_2 blog-cols et_section_regular">
    <div class="et_pb_row et_pb_row_2 rs-b2">
        <div class="et_pb_column et_pb_column_2_5 et_pb_column_3  et_pb_css_mix_blend_mode_passthrough">
            <div class="et_pb_module et_pb_blog_1 et_pb_posts et_pb_bg_layout_light rs-b2-lc">
                <div class="et_pb_ajax_pagination_container">
                    <?php
                            $list_query_options['posts_per_page'] = 2;
                            $list_query_options['post__not_in'] = $xcluded_ids;

                            $blockLeft = new WP_Query( $list_query_options );

                            if($blockLeft->have_posts() ){
                                while ( $blockLeft->have_posts() ) : $blockLeft->the_post();
                                $xcluded_ids[] = get_the_ID();
                                $image = get_the_post_thumbnail_url();
                                if( $image == ''){
                                    $image = '/wp-content/themes/rsv9/images/no-image.png';
                                }

                    ?>
                         <article id="post-<?= get_the_ID()?>" class="et_pb_post clearfix et_pb_blog_item_3_0 post-<?= get_the_ID()?> post type-post status-publish format-standard has-post-thumbnail sticky hentry category-design category-q-answers category-thoughts">
                            <a style="height: 225px; width: 100%;" href="<?= the_permalink() ?>" class="entry-featured-image-url image-link">
                                <div class="et_pb_post background_image" 
                                style="background: url(<?= $image ?>);
                                        width: 100%;
                                        height: 100%;
                                        background-size: cover !important;
                                        background-repeat: no-repeat !important;
                                        background-position: center !important;
                                        border-radius: 4px !important;"></div>
                            </a>
                            <h2 class="entry-title rs-title"  style="margin-top:10px;"><a class="hover_black_green" href="<?= the_permalink() ?>">
                                <?php echo  mb_strimwidth( get_the_title(), 0, 50, '...' ); ?></a></h2>
                            <div class="post-content">
                                <div class="post-content-inner rs-content"><?php rs_the_excerpt( 90 ) ?></div>
                            </div>

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
                            $list_query_options['posts_per_page'] = 1;
                            $list_query_options['post__not_in'] = $xcluded_ids;

                            $blockRight = new WP_Query( $list_query_options );

                            if($blockRight->have_posts() ){
                                while ( $blockRight->have_posts() ) : $blockRight->the_post();
                                    $xcluded_ids[] = get_the_ID();
                                    $image = get_the_post_thumbnail_url();
                                    if( $image == ''){
                                        $image = '/wp-content/themes/rsv9/images/no-image.png';
                                    }
                    ?>
                        <article id="post-<?= get_the_ID()?>" class="et_pb_post clearfix et_pb_blog_item_3_0 post-<?= get_the_ID()?> post type-post status-publish format-standard has-post-thumbnail sticky hentry category-design category-q-answers category-thoughts">
                            <a style="height: 225px; width: 100%;" href="<?= the_permalink() ?>" class="entry-featured-image-url image-link">
                                <div class="et_pb_post background_image" 
                                style="background: url(<?= $image ?>);
                                        width: 100%;
                                        height: 100%;
                                        background-size: cover !important;
                                        background-repeat: no-repeat !important;
                                        background-position: center !important;
                                        border-radius: 4px !important;"></div>
                            </a>
                            <h2 class="entry-title rs-title"  style="margin-top:10px;"><a class="hover_black_green" href="<?= the_permalink() ?>">
                                <?php echo  mb_strimwidth( get_the_title(), 0, 50, '...' ); ?></a></h2>
                            <div class="post-content">
                                <div class="post-content-inner rs-content"><?php rs_the_excerpt( 90 ) ?></div>
                            </div>
                        </article>
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

<?php //get_template_part( 'blog/ad', 'page' );?>

<div class="et_pb_section no_padding_section">
    <div class="et_pb_row et_pb_row_5">
        <div class="et_pb_column et_pb_column_4_4 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough et-last-child">

            <div class="et_pb_module et_pb_blog_0 blog-all et_pb_posts et_pb_bg_layout_light ">

                <div class="et_pb_ajax_pagination_container rs-posts-thum">
                    <?php

                        $list_query_options['posts_per_page'] = 6;
                        $list_query_options['post__not_in'] = $xcluded_ids;

                        $downBlock = new WP_Query( $list_query_options );

                        if($downBlock->have_posts() ){
                            while ( $downBlock->have_posts() ) : $downBlock->the_post();
                                $xcluded_ids[] = get_the_ID();
                                $image = get_the_post_thumbnail_url();
                                if( $image == ''){
                                    $image = '/wp-content/themes/rsv9/images/no-image.png';
                                }
                    ?>          

                        <article id="post-<?= get_the_ID()?>" class="et_pb_post clearfix et_pb_blog_item_3_0 post-<?= get_the_ID()?> post type-post status-publish format-standard has-post-thumbnail sticky hentry category-design category-q-answers category-thoughts">
                            <a style="height: 225px; width: 100%;" href="<?= the_permalink() ?>" class="entry-featured-image-url image-link">
                                <div class="et_pb_post background_image" 
                                style="background: url(<?= $image ?>);
                                        width: 100%;
                                        height: 100%;
                                        background-size: cover !important;
                                        background-repeat: no-repeat !important;
                                        background-position: center !important;
                                        border-radius: 4px !important;"></div>
                            </a>
                            <h2 class="entry-title rs-title" style="margin-top:10px;"><a class="hover_black_green" href="<?= the_permalink() ?>">
                                <?php echo  mb_strimwidth( get_the_title(), 0, 50, '...' ); ?></a></h2>
                            <div class="post-content">
                                <div class="post-content-inner rs-content"><?php rs_the_excerpt( 90 ) ?></div>
                            </div>
                        </article>
                    <?php
                            wp_reset_postdata();
                            endwhile;
                        }

                    ?>

                </div>
            </div>


        </div>
    </div> <!-- .et_pb_row -->
</div> <!-- .et_pb_section -->
<?php

}
else{
    $no_more_items = true;
} ?>
