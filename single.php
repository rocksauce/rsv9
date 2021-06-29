<?php

get_header();

$show_default_title = get_post_meta(get_the_ID(), '_et_pb_show_title', true);

$is_page_builder_used = et_pb_is_pagebuilder_used(get_the_ID());

$image = get_the_post_thumbnail_url();
if( $image == ''){
    $image = '/wp-content/themes/rsv9/images/no-image.png';
}

$author_id = get_post_field( 'post_author', get_the_ID() );

?>



<div id="main-content">
    <article id="post-570" class="post-570 page type-page status-publish hentry">


        <div class="entry-content">
            <div class="et-l et-l--post">
                <div class="et_builder_inner_content et_pb_gutters1">
                    <div 
                        class="et_pb_section et_pb_section_0 et_pb_with_background et_section_regular et_pb_section_sticky" 
                        style="background-image: url(<?=$image?>)!important;"
                    >
                        <div class="et_pb_row et_pb_row_0 et_pb_equal_columns et-last-child">
                            <div class="et_pb_column et_pb_column_1_2 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough">


                                <div class="text-inner et_pb_module et_pb_text et_pb_text_0 et_pb_text_align_left et_pb_bg_layout_light et_had_animation" >


                                    <div class="et_pb_text_inner">
                                        <h3 class="archive_type">Blog</h3>
                                        <h3 class="archive_title"><?=get_the_title() ?></h3>
                                        <h3 class="archive_autor"><?= get_the_author_meta('display_name', $author_id)?></h3>
                                    </div>
                                </div> <!-- .et_pb_text -->
                            </div> <!-- .et_pb_column -->
                            <div class="et_pb_column et_pb_column_1_2 et_pb_column_1 et_pb_css_mix_blend_mode_passthrough et_pb_row_sticky">


                                <div class="et_pb_module et_pb_image et_pb_image_0 et_pb_image_sticky et-animated et_had_animation"  >


                                    <span class="et_pb_image_wrap "><img src="https://rocksaucedev.wpengine.com/wp-content/uploads/2021/06/conference_illustration_01.png" alt="" title=""></span>
                                </div>
                            </div> <!-- .et_pb_column -->
                           

                        </div> <!-- .et_pb_row -->


                    </div> <!-- .et_pb_section -->
                    <div class="et_pb_section et_pb_section_1 et_section_regular">




                        <div class="et_pb_row et_pb_row_1 et_pb_gutters1 et_pb_row_1-4_3-4">
                            <div class="sidebar_rs et_pb_column et_pb_column_1_4 et_pb_column_3  et_pb_css_mix_blend_mode_passthrough">


                                <div class="date_rs et_pb_module et_pb_text et_pb_text_1  et_pb_text_align_center et_pb_bg_layout_light">


                                    <div class="et_pb_text_inner">
                                        <p><?= the_time( 'd' ) ?></p>
                                    </div>
                                </div> <!-- .et_pb_text -->
                                <div class="month_year_rs et_pb_module et_pb_text et_pb_text_2  et_pb_text_align_left et_pb_bg_layout_light">


                                    <div class="et_pb_text_inner">
                                        <p><?= the_time( 'F Y' ) ?></p>
        
                                    </div>
                                </div> <!-- .et_pb_text -->
                                <div class="categories_rs et_pb_module et_pb_text et_pb_text_3  et_pb_text_align_left et_pb_bg_layout_light">


                                    <div class="et_pb_text_inner">
                                        <ul>
                                            <?php 
                                                $categories = get_the_category();
                                                foreach ($categories as $key => $category) {
                                            ?>
                                                <li style="text-align: left;">
                                                    <a href="<?=esc_attr( esc_url( get_category_link( $category->term_id ) ) )?>"><?= esc_html( $category->name ) ?></a>
                                                </li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div> <!-- .et_pb_text -->
                            </div> <!-- .et_pb_column -->
                            <div class="et_pb_column et_pb_column_3_4 et_pb_column_4  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                <?=the_content()?>
                            </div> <!-- .et_pb_column -->


                        </div> <!-- .et_pb_row -->


                    </div> <!-- .et_pb_section -->
                    <?php get_template_part( 'blog/ad', 'page' ); ?>
                    <?php get_template_part( 'blog/related', 'page' ); ?>

                </div><!-- .et_builder_inner_content -->
            </div><!-- .et-l -->
        </div>


    </article>
</div> <!-- #main-content -->

<?php

get_footer();
