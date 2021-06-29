<?php
    
    $list_query_options = array(
        'category__in' => wp_get_post_categories(get_the_ID()),
        'post__not_in' => array(get_the_ID()),
        'posts_per_page' => 2,
        'orderby' => 'date',
    );

    $list_query_options['post_type'] = 'post';
    
    
    $relatedPosts = new WP_Query( $list_query_options ); 

    if($relatedPosts->have_posts() ){

        
?>

    <div class="et_pb_section et_pb_section_5 recent-post recent-post-small et_section_regular">
        <div class="et_pb_row et_pb_row_5">
            <div class="et_pb_column et_pb_column_4_4 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough et-last-child">
            
                <div class="et_pb_module et_pb_blog_0 blog-all et_pb_posts et_pb_bg_layout_light ">

                    <div class="et_pb_ajax_pagination_container">
                        <?php 

                            

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

                                        <a href="<?= the_permalink() ?>" class="entry-featured-image-url">
                                            <img loading="lazy" src="<?= $image ?>" alt="<?= get_the_title() ?>" class="" width="1080" height="675"></a>
                                            <h2 class="entry-title"><a href="<?= the_permalink() ?>"><?= get_the_title() ?></a></h2>

                                        <div class="post-content"><div class="post-content-inner"><p><?= the_excerpt() ?></p>
                                        </div></div>			
                                    </article>
                        <?php

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