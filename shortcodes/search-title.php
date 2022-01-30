<?php

function title_criteria( $atts )
{
    remove_all_filters('posts_orderby');

    $criteria= isset($_GET['keyword']) ? $_GET['keyword']: "Design";

    $list_query_options = array(
        'post_type' => 'post',
        'order' => 'DESC',
        'orderby' => 'date',
        's' => $criteria
    );

    $blockLeft = new WP_Query($list_query_options);

    $count = $blockLeft->found_posts;

    $default_atts = array(
        'color' => '#df5b4e',
    );

    $atts = shortcode_atts( $default_atts, $atts, 'titlesearch' );

    $color = $atts['color'];

    return '<h1>'.$count.'<strong> search results for <span style="color:'.$color.'">"'.$criteria.'"</span></strong></h1>';
}


add_shortcode('titlesearch', 'title_criteria');
