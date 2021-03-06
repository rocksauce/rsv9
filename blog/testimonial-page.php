<?php
remove_all_filters('posts_orderby');
$args = array(
    'post_type' => 'testimonials',
    'posts_per_page' => 1,
    'orderby' => 'rand'
);


$testimonialBlock = new WP_Query( $args );

if($testimonialBlock->have_posts() ){
    while ( $testimonialBlock->have_posts() ) : $testimonialBlock->the_post();
    $image = get_the_post_thumbnail_url();
    if( $image == ''){
        $image = '/wp-content/themes/rsv9/images/no-image.png';
    }
?>

    <div class="et_pb_section et_pb_section_7 section-testimonial et_section_regular et_had_animation">




        <div class="et_pb_row et_pb_row_10 et_pb_row_1-4_3-4">
            <div class="et_pb_column et_pb_column_1_4 et_pb_column_22  et_pb_css_mix_blend_mode_passthrough">


                <div class="et_pb_module et_pb_image et_pb_image_0">


                    <span class="et_pb_image_wrap "><img loading="lazy" width="211" height="204" src="<?=$image?>" alt="" title="rocksauce_client_jodi_frank_culineer_recipe_app 1" class="wp-image-98"></span>
                </div>
            </div> <!-- .et_pb_column -->
            <div class="et_pb_column et_pb_column_3_4 et_pb_column_23  et_pb_css_mix_blend_mode_passthrough et-last-child">


                <div class="et_pb_module et_pb_text et_pb_text_25  et_pb_text_align_left et_pb_bg_layout_light">


                    <div class="et_pb_text_inner">
                        <h3><?=the_content()?></h3>
                        <h4><?=get_the_title()?>
                            <?php
                                if(get_post_meta(get_the_ID(), 'position_value_key', true))
                                    echo ", ".get_post_meta(get_the_ID(), 'position_value_key', true);
                                if(get_post_meta(get_the_ID(), 'company_value_key', true))
                                    echo " of <a target='_blank' href='".get_post_meta(get_the_ID(), 'company_url_value_key', true)."'>".get_post_meta(get_the_ID(), 'company_value_key', true)."</a>";
                            ?>
                        </h4>
                    </div>
                </div> <!-- .et_pb_text -->
            </div> <!-- .et_pb_column -->


        </div> <!-- .et_pb_row -->


    </div>
<?php
    wp_reset_postdata();
    endwhile;
}

?>
