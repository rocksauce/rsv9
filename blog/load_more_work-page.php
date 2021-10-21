<?php

global $xcluded_ids;
global $no_more_items;

$xcluded_ids = $_POST['data']['excluded_ids'];
$category_id = $_POST['data']['category_id'];


$page = get_page_by_path( 'work' );


$list_query_options['post_type'] = 'page';
$list_query_options['order'] = 'DESC';
$list_query_options['post_parent'] = $page->ID;
$list_query_options['orderby'] = 'date';

$list_query_options['posts_per_page'] = 6;
$list_query_options['post__not_in'] = $xcluded_ids;

$parent = new WP_Query( $list_query_options );





if ( $parent->have_posts() ) :
          

    





?>



<div class="et_pb_section et_pb_section_6 works-list et_section_regular">
   


   <div class="et_pb_row et_pb_row_7">

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

      <div class="et_pb_column et_pb_column_1_2 et_pb_column_15  et_pb_css_mix_blend_mode_passthrough et-last-child">
         <div class="et_pb_module et_pb_text et_pb_text_12 et_pb_section_parallax  et_pb_text_align_left et_pb_bg_layout_light">
            <span class="et_parallax_bg_wrap"><span class="et_parallax_bg" style="background-image: url(<?= $image ?>); height: 658.2px; transform: translate(0px, 509.7px);"></span></span>
            <div class="et_pb_text_inner">
               <h2><a href="<?= the_permalink() ?>"><?php the_title(); ?> </a></h2>
               <h3>Business design, strategy, UX, branding + design</h3>
            </div>
         </div>
         <!-- .et_pb_text -->
      </div>
      <!-- .et_pb_column -->

                            <?php
                                    wp_reset_postdata();
                                    endwhile;
                                }
                            ?>
   </div>





   <!-- .et_pb_row -->
   <div class="et_pb_row et_pb_row_8">

                            <?php
                                $list_query_options['posts_per_page'] = 1;
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

      <div class="et_pb_column et_pb_column_4_4 et_pb_column_16  et_pb_css_mix_blend_mode_passthrough et-last-child">
         <div class="et_pb_module et_pb_text et_pb_text_13 et_pb_section_parallax  et_pb_text_align_left et_pb_bg_layout_light">
            <span class="et_parallax_bg_wrap"><span class="et_parallax_bg" style="background-image: url(<?= $image ?>); height: 591.2px; transform: translate(0px, 365.1px);"></span></span>
            <div class="et_pb_text_inner">
               <h2><a href="<?= the_permalink() ?>"><?php the_title(); ?> </a></h2>
               <h3>UX, web, app + marketing design</h3>
            </div>
         </div>
         <!-- .et_pb_text -->
      </div>
      <!-- .et_pb_column -->




                            <?php
                                    wp_reset_postdata();
                                    endwhile;
                                }
                            ?>
   </div>






   <!-- .et_pb_row -->
   <div class="et_pb_row et_pb_row_9">

                            <?php
                                $list_query_options['posts_per_page'] = 3;
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
      
      <div class="et_pb_column et_pb_column_1_3 et_pb_column_17  et_pb_css_mix_blend_mode_passthrough">
         <div class="et_pb_module et_pb_text et_pb_text_14 et_pb_section_parallax  et_pb_text_align_left et_pb_bg_layout_light">
            <span class="et_parallax_bg_wrap"><span class="et_parallax_bg" style="background-image: url(<?= $image ?>); height: 480.2px; transform: translate(0px, 240.6px);"></span></span>
            <div class="et_pb_text_inner">
               <h3><a href="<?= the_permalink() ?>"><?php the_title(); ?></a></h3>
               <h4>UX, design + web dev</h4>
            </div>
         </div>
         <!-- .et_pb_text -->
      </div>

                                <?php
                                    wp_reset_postdata();
                                    endwhile;
                                }
                            ?>


   </div>



  
</div>


<?php 

 endif; 
 wp_reset_postdata();

 ?>
