<?php

    $list_query_options = array(
        'category__in' => wp_get_post_categories(get_the_ID()),
        'post__not_in' => array(get_the_ID()),
        'posts_per_page' => 3,
        'orderby' => 'date',
    );

    $list_query_options['post_type'] = 'post';


    $relatedPosts = new WP_Query( $list_query_options );

    if($relatedPosts->have_posts() ){


?>

<!-- Other Blog Articles -->
    <div id="other_blog_articles">
        <!-- PHP that brings in the 3 other blog articles -->

        <?php
        $downBlock = new WP_Query( $list_query_options );

        if($downBlock->have_posts() ){
            while ( $downBlock->have_posts() ) : $downBlock->the_post();
                $xcluded_ids[] = get_the_ID();
                $image = get_the_post_thumbnail_url();
                if( $image == ''){
                    $image = '/wp-content/themes/rsv9/images/no-image.jpg';
                }
        ?>

                <article id="post-<?= get_the_ID()?>" class="other_blog_article">
                    <a class="other_blog_article_image" href="<?= the_permalink() ?>" style="background-image:url(<?= $image ?>)"></a>
                    <a class="other_blog_article_title" href="<?= the_permalink() ?>"><?= get_the_title() ?></a>
                    <div class="other_blog_article_summary"><?php rs_the_excerpt( 96 ) ?></div>
                </article>
        <?php
            wp_reset_postdata();
            endwhile;
        }
        ?>
    </div>
<?php

    }
    else{
        $no_more_items = true;
    } ?>
