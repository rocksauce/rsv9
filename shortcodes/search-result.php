<?php

function search_result_function()
{
    remove_all_filters('posts_orderby');

    $criteria = isset($_GET['keyword']) ? $_GET['keyword'] : "Design";
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $post_per_page = 35;
    $list_query_options = array(
        'post_type' => 'post',
        'order' => 'DESC',
        'orderby' => 'date',
        'posts_per_page' => $post_per_page,
        'paged' => $paged,
        's' => $criteria
    );

    $blockLeft = new WP_Query($list_query_options);

    ob_start();

?>

    <div id="other_blog_articles_3">
        <?php

        if ($blockLeft->have_posts()) {
            while ($blockLeft->have_posts()) : $blockLeft->the_post();

        ?>

                <article id="post-<?= get_the_ID() ?>" class="other_blog_article">
                    <a class="other_blog_article_image" href="<?= get_permalink() ?>" style="background-image:url(<?= get_the_post_thumbnail_url() ?>)"></a>
                    <a class="other_blog_article_title hover_black_orage " href="<?= get_permalink() ?>"><?= rs_the_title_str(50) ?></a>
                    <div class="other_blog_article_summary"><?php rs_the_excerpt_str(96) ?></div>
                </article>

        <?php



            endwhile;
        }
        ?>
        <div class="pagination">
            <!-- <?php
            // echo paginate_links(array(
            //     'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            //     'total'        => $blockLeft->max_num_pages,
            //     'current'      => max(1, get_query_var('paged')),
            //     'format'       => '?paged=%#%',
            //     'show_all'     => false,
            //     'type'         => 'plain',
            //     'end_size'     => 2,
            //     'mid_size'     => 1,
            //     'prev_next'    => true,
            //     'prev_text'    => sprintf('<i></i> %1$s', __('Newer Posts', 'text-domain')),
            //     'next_text'    => sprintf('%1$s <i></i>', __('Older Posts', 'text-domain')),
            //     'add_args'     => false,
            //     'add_fragment' => '',
            // ));
            ?> -->
        </div>
    </div>
<?php


    return ob_get_clean();
}


add_shortcode('search_result', 'search_result_function');
