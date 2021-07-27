<?php
$args = array(
    'post_type' => 'ad-cta',
remove_all_filters('posts_orderby');
$args = array(
    'post_type' => 'ad-cta',
    ccae0874102e5b05ddae5318dcb9e59dbb1c3b05
    'posts_per_page' => 1,
    'orderby' => 'rand'
);

$adlBlock = new WP_Query( $args );

if($adlBlock->have_posts() ){
    while ( $adlBlock->have_posts() ) : $adlBlock->the_post();
        $bkg_image = get_the_post_thumbnail_url();
        if( $bkg_image == ''){
            $bkg_image = '/wp-content/themes/rsv9/images/no-image.jpg';
        }

        // configure all this variables on admin


        $text_button_one = get_post_meta(get_the_ID(), '_add_cta_link_one', true);
        $link_one = get_post_meta(get_the_ID(), '_add_cta_link_one_url', true);

        $text_button_two = get_post_meta(get_the_ID(), '_add_cta_link_two', true);
        $link_two = get_post_meta(get_the_ID(), '_add_cta_link_two_url', true);

        $colors = [
            'purple',
            'green',
            'red',
        ];

        $colors2 = [
            'grey',
            'blue',
            'orange'
        ];

?>

        <div class="et_pb_section et_pb_section_3 section-idea et_pb_section_parallax et_pb_with_background et_section_regular rsv-9-add">

            <div class="et_parallax_bg_wrap">
                <div class="et_parallax_bg et_pb_parallax_css" style="background-image: url(<?= $bkg_image ?>);"></div>
            </div>


            <div class="et_pb_row et_pb_row_3">
                <div class="et_pb_column et_pb_column_4_4 et_pb_column_5  et_pb_css_mix_blend_mode_passthrough et-last-child">


                    <div class="et_pb_module et_pb_text et_pb_text_1  et_pb_text_align_left et_pb_bg_layout_light">


                        <div class="et_pb_text_inner add_cta_content">
                            <h2><?=the_title()?></h2>
                            <?=the_content()?>
                        </div>
                    </div> <!-- .et_pb_text -->
                </div> <!-- .et_pb_column -->


            </div> <!-- .et_pb_row -->
            <div class="et_pb_row et_pb_row_4">
                <div class="et_pb_column et_pb_column_4_4 et_pb_column_6  et_pb_css_mix_blend_mode_passthrough et-last-child ">

                    <?php if($link_one){ ?>
                        <div class="et_pb_button_module_wrapper  et_pb_module ">
                            <a class="et_pb_button et_pb_button_0 rsv-9-buttons btn-<?php echo $colors[rand(0,2)] ?> et_pb_bg_layout_light" href="<?=$link_one?>"><?=$text_button_one?></a>
                        </div>
                    <?php } ?>
                    <?php if($link_two){ ?>
                        <div class="et_pb_button_module_wrapper  et_pb_module ">
                            <a class="et_pb_button et_pb_button_1 rsv-9-buttons btn-<?php echo $colors2[rand(0,2)] ?> et_pb_bg_layout_light" href="<?=$link_two?>"><?=$text_button_two?></a>
                        </div>
                    <?php } ?>
                </div> <!-- .et_pb_column -->


            </div> <!-- .et_pb_row -->


        </div>

<?php
    wp_reset_postdata();
    endwhile;

}


?>
