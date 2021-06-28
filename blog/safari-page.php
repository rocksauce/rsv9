<?php

    // configure all this variables on admin
    $title = 'You’re the expert<br> so we <strong style="color: #a06bce;">come to you</strong>';
    $content = 'Rocksauce Design Safari’s are designed to solve major problems for our customers. Our team comes to you, observes, learns, strategizes + solves problems from the ground up.';

    $text_button_one = 'Click to start a Design Safari';
    $text_button_two = 'Learn about our Design Safaris';

    $link_one = '';
    $link_two = '';

    $bkg_image = 'https://rocksaucedev.wpengine.com/wp-content/uploads/2021/04/RS-Spring-Enterprise-Web-HD-16x9-300dpi-2425-1.jpg';
?>

<div class="et_pb_section et_pb_section_3 section-idea et_pb_section_parallax et_pb_with_background et_section_regular">

    <div class="et_parallax_bg_wrap">
        <div class="et_parallax_bg et_pb_parallax_css" style="background-image: url(<?= $bkg_image ?>);"></div>
    </div>


    <div class="et_pb_row et_pb_row_3">
        <div class="et_pb_column et_pb_column_4_4 et_pb_column_5  et_pb_css_mix_blend_mode_passthrough et-last-child">


            <div class="et_pb_module et_pb_text et_pb_text_1  et_pb_text_align_left et_pb_bg_layout_light">


                <div class="et_pb_text_inner">
                    <h2><?=$title?></h2>
                    <p><?=$content?></p>
                </div>
            </div> <!-- .et_pb_text -->
        </div> <!-- .et_pb_column -->


    </div> <!-- .et_pb_row -->
    <div class="et_pb_row et_pb_row_4">
        <div class="et_pb_column et_pb_column_4_4 et_pb_column_6  et_pb_css_mix_blend_mode_passthrough et-last-child">


            <div class="et_pb_button_module_wrapper et_pb_button_0_wrapper  et_pb_module ">
                <a class="et_pb_button et_pb_button_0 btn-purple et_pb_bg_layout_light" href="<?=$link_one?>"><?=$text_button_one?></a>
            </div>
            <div class="et_pb_button_module_wrapper et_pb_button_1_wrapper  et_pb_module ">
                <a class="et_pb_button et_pb_button_1 btn-grey et_pb_bg_layout_light" href="<?=$link_one?>"><?=$text_button_two?></a>
            </div>
        </div> <!-- .et_pb_column -->


    </div> <!-- .et_pb_row -->


</div>