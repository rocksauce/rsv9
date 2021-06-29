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

        
?>


    <div class="et_pb_section et_pb_section_2 blog-cols et_section_regular">
        <div class="et_pb_row et_pb_row_2">
            <div class="et_pb_column et_pb_column_2_5 et_pb_column_3  et_pb_css_mix_blend_mode_passthrough">
                <div class="et_pb_module et_pb_blog_1 et_pb_posts et_pb_bg_layout_light ">
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
                                    <article id="post-<?= get_the_ID()?>" class="block-one et_pb_post clearfix et_pb_blog_item_1_0 post-<?= get_the_ID()?> post type-post status-publish format-standard has-post-thumbnail hentry">

                                        <a href="<?= the_permalink() ?>" class="entry-featured-image-url"><img loading="lazy" src="<?= $image ?>" alt="<?= get_the_title() ?>" class="" width="1080" height="300"></a>
                                        <h2 class="entry-title"><a href="<?= the_permalink() ?>"><?= get_the_title() ?></a></h2>

                                        <div class="post-content">
                                            <div class="post-content-inner et_multi_view_hidden"></div>
                                        </div>
                                    </article> <!-- .et_pb_post -->

                        <?php
                                    wp_reset_postdata();
                                    endwhile;
                                }
                        ?>

                    </div>
                </div> <!-- .et_pb_posts -->
            </div> <!-- .et_pb_column -->
            <div class="et_pb_column et_pb_column_3_5 et_pb_column_4  et_pb_css_mix_blend_mode_passthrough et-last-child">
                <div class="et_pb_module et_pb_blog_2 et_pb_posts et_pb_bg_layout_light ">
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
                                        <article  id="post-<?= get_the_ID()?>"  class="block-two et_pb_post clearfix et_pb_blog_item_2_0 post-<?= get_the_ID()?> post type-post status-publish format-standard has-post-thumbnail hentry category-design category-development">

                                            <a href="<?= the_permalink() ?>" class="entry-featured-image-url"><img loading="lazy" src="<?= $image ?>" alt="What is a Design Sprint? (Part Two)" class="" width="1080" height="675"></a>
                                            <h2 class="entry-title"><a href="<?= the_permalink() ?>"><?= get_the_title() ?></a></h2>

                                            <div class="post-content">
                                                <div class="post-content-inner">
                                                    <p><?=the_excerpt()?></p>
                                                </div>
                                            </div>
                                        </article> <!-- .et_pb_post -->                                                   
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

    

    <div class="et_pb_section">
        <div class="et_pb_row et_pb_row_5">
            <div class="et_pb_column et_pb_column_4_4 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough et-last-child">
            
                <div class="et_pb_module et_pb_blog_0 blog-all et_pb_posts et_pb_bg_layout_light ">

                    <div class="et_pb_ajax_pagination_container">
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
    //get_template_part( 'blog/ad', 'page' );
    }
    else{
        $no_more_items = true;
    } ?>