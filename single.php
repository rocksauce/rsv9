<?php

get_header();

$show_default_title = get_post_meta(get_the_ID(), '_et_pb_show_title', true);

$is_page_builder_used = et_pb_is_pagebuilder_used(get_the_ID());

$image = get_the_post_thumbnail_url();
if( $image == ''){
    $image = '/wp-content/themes/rsv9/images/no-image.jpg';
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
                            $len = count($categories);
                            foreach ($categories as $key => $category) {
                        ?>
                        <li class="blog_category_list_item">
                            <a href="<?=esc_attr( esc_url( get_category_link( $category->term_id ) ) )?>"><?= esc_html( $category->name ) ?></a>
                            <?php 
                                 if ($key != $len - 1) {
                                    echo '<span class="show-mobile">,</span>';
                                }
                                
                            ?>
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

<!-- Internal Ad -->
    
    <?php wp_reset_postdata(); get_template_part( 'blog/ad', 'page' ); ?>
<!-- /Internal Ad -->
<!-- Three Other Articles -->
    <?php get_template_part( 'blog/related', 'page' ); ?>
<!-- /Three Other Articles -->
<?php

get_footer();
