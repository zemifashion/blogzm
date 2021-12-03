<?php

class td_module_flex_5 extends td_module {

    function __construct($post, $module_atts = array()) {
        //run the parrent constructor
        parent::__construct($post, $module_atts);
    }

    function render( $shortcode_class = '' ) {
        ob_start();

        $art_title_pos = $this->get_shortcode_att('art_title_pos');
        $info_pos = $this->get_shortcode_att('info_pos');
        $art_excerpt_pos = $this->get_shortcode_att('art_excerpt_pos');
        $art_audio_pos = $this->get_shortcode_att('art_audio_pos');
        $btn_pos = $this->get_shortcode_att('btn_pos');

        $hide_image = $this->get_shortcode_att('hide_image');
        $image_size = $this->get_shortcode_att('image_size');
        $category_position = $this->get_shortcode_att('modules_category');
        $btn_title = $this->get_shortcode_att('btn_title');
        $title_length = $this->get_shortcode_att('mc5_tl');
        $title_tag = $this->get_shortcode_att('mc5_title_tag');
        $author_photo = $this->get_shortcode_att('author_photo');
        $excerpt_length = $this->get_shortcode_att('mc5_el');
        $modified_date = $this->get_shortcode_att('show_modified_date');
        $time_ago = $this->get_shortcode_att('time_ago');
        $time_ago_add_txt = $this->get_shortcode_att('time_ago_add_txt');
        $hide_audio = $this->get_shortcode_att('hide_audio');

        $hide_author_date = '';

        $hide_cat = '';
        $hide_author = '';
        $hide_date = '';
        $hide_rev = '';
        $hide_com = '';
        $hide_excerpt = '';
        $hide_btn = '';
        if ( !empty($shortcode_class)) {
            $hide_cat = $this->get_shortcode_att('show_cat');
            $hide_author = $this->get_shortcode_att('show_author');
            $hide_date = $this->get_shortcode_att('show_date');
            $hide_rev = $this->get_shortcode_att('show_review');
            $hide_com = $this->get_shortcode_att('show_com');
            $hide_excerpt = $this->get_shortcode_att('show_excerpt');
            $hide_btn = $this->get_shortcode_att('show_btn');

            // when to hide
            if( $hide_cat == 'none') {
                $hide_cat = 'hide';
            }
            if( $hide_author == 'none') {
                $hide_author = 'hide';
            }
            if( $hide_date == 'none') {
                $hide_date = 'hide';
            }
            if( $hide_rev == 'none') {
                $hide_rev = 'hide';
            }
            if( $hide_com == 'none') {
                $hide_com = 'hide';
            }
            if( $hide_excerpt == 'none') {
                $hide_excerpt = 'hide';
            }
            if( $hide_btn == 'none') {
                $hide_btn = 'hide';
            }

            if( $hide_author == 'hide' && $hide_date == 'hide' && ( $hide_rev == 'hide' || $this->get_review() == '' ) && $hide_com == 'hide' && $author_photo == '' ) {
                $hide_author_date = 'hide';
            }
        }

        if (empty($image_size)) {
            $image_size = 'td_696x0';
        }
        if (empty($btn_title)) {
            $btn_title = 'Read more';
        }

        // meta info html
        $meta_info = '';
        if (($category_position == '' && $hide_cat != 'hide') || $hide_author_date != 'hide') {
            $meta_info .= '<div class="td-editor-date">';
                if ($category_position == '' && $hide_cat != 'hide') { $meta_info .= $this->get_category(); }

                if( $hide_author_date != 'hide' ) {
                    $meta_info .= '<span class="td-author-date">';
                        if ($author_photo != '') {
                            $meta_info .= $this->get_author_photo();
                        }
                        if( $hide_author != 'hide' ) {
                            $meta_info .= $this->get_author(true);
                        }
                        if( $hide_date != 'hide' ) {
                            $meta_info .= $this->get_date($modified_date, true, $time_ago, $time_ago_add_txt);
                        }
                        if( $hide_rev != 'hide' ) {
                            $meta_info .= $this->get_review();
                        }
                        if( $hide_com != 'hide' ) {
                            $meta_info .= $this->get_comments();
                        }
                    $meta_info .= '</span>';
                }
            $meta_info .= '</div>';
        }

        // excerpt html
        $excerpt = '<div class="td-excerpt">';
            $excerpt .= $this->get_excerpt($excerpt_length);
        $excerpt .= '</div>';

        // audio player hmtl
        $audio_player = $this->get_audio_embed();

        // button html
        $button = '<div class="td-read-more">';
            $button .= '<a href="' . $this->href . '">' . __td($btn_title, TD_THEME_NAME) . '</a>';
        $button .= '</div>';


        $additional_classes_array = array();
        $additional_classes_array = apply_filters( 'td_composer_module_exclusive_class', $additional_classes_array, $this->post );

        ?>

        <div class="td_module_flex <?php echo $this->get_module_classes($additional_classes_array);?>">
            <div class="td-module-container td-category-pos-<?php echo esc_attr($category_position) ?>">
                <?php
                    // info above title & above image & category above title & title above image
                    if(
                        $art_title_pos == 'top'
                        || ( $info_pos == 'top' && $hide_author_date != 'hide' )
                        || ( ( $category_position == 'above' && $hide_cat != 'hide' ) && $art_title_pos == 'top' )
                        || ( $art_excerpt_pos == 'top' && $hide_excerpt != 'hide' )
                        || ( $art_audio_pos == 'top' && $hide_audio == '' )
                        || ( $btn_pos == 'top' && $hide_btn != 'hide' )
                        ) { ?>
                        <div class="td-module-meta-info td-module-meta-info-top">
                            <?php
                                // category
                                if ( ( $category_position == 'above' && $hide_cat != 'hide' ) && $art_title_pos == 'top' ) {
                                    echo $this->get_category();
                                }

                                // info above title & above image & title above image
                                if( $info_pos == 'title' && $art_title_pos == 'top' ) {
                                    echo $meta_info;
                                }

                                // title above image
                                if( $art_title_pos == 'top' ) {
                                    echo $this->get_title($title_length, $title_tag);
                                }

                                // info above image
                                if( $info_pos == 'top' ) {
                                    echo $meta_info;
                                }

                                // excerpt above image
                                if( $art_excerpt_pos == 'top' && $hide_excerpt != 'hide' ) {
                                    echo $excerpt;
                                }

                                // audio player above image
                                if( $art_audio_pos == 'top' && $hide_audio == '' ) {
                                    echo $audio_player;
                                }

                                // button above image
                                if( $btn_pos == 'top' && $hide_btn != 'hide' ) {
                                    echo $button;
                                }
                            ?>
                        </div>
                    <?php }

                    // image
                    if( $hide_image == '' ) { ?>
                        <div class="td-image-container">
                            <?php
                                if ($category_position == 'image' && $hide_cat != 'hide') {
                                    echo $this->get_category();
                                }

                                echo $this->get_image($image_size, true);

                                echo $this->get_video_duration();
                            ?>
                        </div>
                <?php } ?>

                <?php if(
                        $art_title_pos == 'bottom'
                        || ( $info_pos == 'bottom' && $hide_author_date != 'hide' )
                        || ( ( $category_position == 'above' && $hide_cat != 'hide' ) && $art_title_pos == 'bottom' )
                        || ( $art_excerpt_pos == 'bottom' && $hide_excerpt != 'hide' )
                        || ( $art_audio_pos == 'bottom' && $hide_audio == '' )
                        || ( $btn_pos == 'bottom' && $hide_btn != 'hide' )
                        ) { ?>
                    <div class="td-module-meta-info td-module-meta-info-bottom">
                        <?php
                            // category above title & title under image
                            if ( ( $category_position == 'above' && $hide_cat != 'hide' ) && $art_title_pos == 'bottom') {
                                echo $this->get_category();
                            }

                            // info above title & under image & title under image
                            if( $info_pos == 'title' && $art_title_pos == 'bottom' ) {
                                echo $meta_info;
                            }

                            // title under image
                            if( $art_title_pos == 'bottom' ) {
                                echo $this->get_title($title_length, $title_tag);
                            }

                            // info under image
                            if( $info_pos == 'bottom' ) {
                                echo $meta_info;
                            }

                            // excerpt under image
                            if( $art_excerpt_pos == 'bottom' && $hide_excerpt != 'hide' ) {
                                echo $excerpt;
                            }

                            // audio player under image
                            if( $art_audio_pos == 'bottom' && $hide_audio == '' ) {
                                echo $audio_player;
                            }

                            // button under image
                            if( $btn_pos == 'bottom' && $hide_btn != 'hide' ) {
                                echo $button;
                            }
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>

        <?php return ob_get_clean();
    }
}
