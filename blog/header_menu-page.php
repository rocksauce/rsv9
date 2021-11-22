<?php

?>

<div class="menu_section et_pb_section et_pb_section_0 blog-links et_section_regular">
    <div class="et_pb_row et_pb_row_0">
        <div class="et_pb_column et_pb_column_4_4 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough et-last-child">
            <div class="et_pb_module et_pb_text et_pb_text_0  et_pb_text_align_left et_pb_bg_layout_light">
                <div class="et_pb_text_inner">
                    <h1>Blog</h1>
                    <ul>
                        <li><a href="/blog">All</a></li>
                        <?php
                            $categories = get_categories( array(
                                'orderby' => 'name',
                                'parent'  => 0
                            ) );

                            $limit = get_option( 'divi_categories_to_show');

                            $count = 1;

                            foreach ( $categories as $category ) {
                                
                               if($count <= ($limit) ){
                                    
                                    printf( '<li><a href="%1$s">%2$s</a></li>',
                                        esc_url( get_category_link( $category->term_id ) ),
                                        esc_html( $category->name )
                                    );
                                    
                                }

                                $count++;
                                
                            }

                        ?>
                    </ul>
                    
                </div>
            </div> <!-- .et_pb_text -->
        </div> <!-- .et_pb_column -->


    </div> <!-- .et_pb_row -->
</div>
