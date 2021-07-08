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
<!-- Main Hero -->
    <div id="blog_single_content">
        <!-- Hero photo + text -->
        <div id="blog_single_hero_photo" style="background-image: url(<?=$image?>)!important;">
            <div id="blog_single_hero_text_container">
                <div id="blog_single_hero_text">
                    <div>
                        <h3><a href="/blog/" class="blog_single_hero_backlink">Blog</a></h3>
                    </div>
                    <div>
                        <h1 class="blog_single_hero_title"><?=get_the_title() ?></h1>
                    </div>
                    <div>
                        <h4>
                            <a href="#" class="blog_single_hero_byline"><?= get_the_author_meta('display_name', $author_id)?></a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /Main Hero -->
<!-- Blog Content -->
    <div id="blog_article_content_container">
    <!-- Date + categories -->
        <ul id="blog_date_and_categories">
            <li id="blog_date_large"><?= the_time( 'd' ) ?></li>
            <li id="blog_month_year"><?= the_time( 'F Y' ) ?></li>
            <li id="blog_categories">
                <ul class="blog_category_list">
                    <?php
                        $categories = get_the_category();
                            foreach ($categories as $key => $category) {
                        ?>
                        <li class="blog_category_list_item">
                            <a href="<?=esc_attr( esc_url( get_category_link( $category->term_id ) ) )?>"><?= esc_html( $category->name ) ?></a>
                        </li>
                    <?php
                        }
                    ?>
                </ul>
            </li>
        </ul>
    <!-- /Date + categories -->
    <!-- Blog article content -->
        <div id="blog_article_content">
           <?=the_content()?>
        </div>
    <!-- /Blog article content -->
</div>
<!-- / Blog Content -->
<div id="main-content">

    <article class="type-page status-publish hentry">


        <div class="entry-content">
            <div class="et-l et-l--post">
                <div class="et_builder_inner_content et_pb_gutters1">
                    </div> <!-- .et_pb_section -->
                    <div class="et_pb_section et_pb_section_1 et_section_regular">




                        <div class="et_pb_row et_pb_row_1 et_pb_gutters1 et_pb_row_1-4_3-4">
                            <div class="sidebar_rs et_pb_column et_pb_column_1_3 et_pb_column_3  et_pb_css_mix_blend_mode_passthrough">


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
                            <div class="et_pb_column et_pb_column_2_3 et_pb_column_4  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                <?=the_content()?>
                            </div> <!-- .et_pb_column -->


                        </div> <!-- .et_pb_row -->


                    </div> <!-- .et_pb_section -->
                    <?php wp_reset_postdata(); get_template_part( 'blog/ad', 'page' ); ?>
                    <?php get_template_part( 'blog/related', 'page' ); ?>

                </div><!-- .et_builder_inner_content -->
            </div><!-- .et-l -->
        </div>


    </article>
</div> <!-- #main-content -->

<?php

get_footer();
