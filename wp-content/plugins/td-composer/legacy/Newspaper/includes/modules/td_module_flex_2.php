<?php

class td_module_flex_2 extends td_module {

    function __construct($post, $module_atts = array()) {
        //run the parrent constructor
        parent::__construct($post, $module_atts);
    }

    function render( $shortcode_class = '' ) {
        ob_start();

        $image_size = $this->get_shortcode_att('image_size');
        $category_position = $this->get_shortcode_att('modules_category');
        $title_length = $this->get_shortcode_att('mc2_tl');
        $title_tag = $this->get_shortcode_att('mc2_title_tag');
        $excerpt_length = $this->get_shortcode_att('mc2_el');
        $excerpt_position = $this->get_shortcode_att('excerpt_middle');
        $modified_date = $this->get_shortcode_att('show_modified_date');
        $time_ago = $this->get_shortcode_att('time_ago');
        $time_ago_add_txt = $this->get_shortcode_att('time_ago_add_txt');

        $hide_author_date = '';

        $hide_cat = '';
        $hide_author = '';
        $hide_date = '';
        $hide_rev = '';
        $hide_com = '';
        $hide_excerpt = '';

        if ( !empty($shortcode_class)) {
            $hide_cat = $this->get_shortcode_att('show_cat');
            $hide_author = $this->get_shortcode_att('show_author');
            $hide_date = $this->get_shortcode_att('show_date');
            $hide_rev = $this->get_shortcode_att('show_review');
            $hide_com = $this->get_shortcode_att('show_com');
            $hide_excerpt = $this->get_shortcode_att('show_excerpt');

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

            if( $hide_author == 'hide' && $hide_date == 'hide' && ( $hide_rev == 'hide' || $this->get_review() == '' ) && $hide_com == 'hide' ) {
                $hide_author_date = 'hide';
            }
        }

        if (empty($image_size)) {
            $image_size = 'td_1920x0';
        }

        $excerpt = '<div class="td-excerpt">';
            $excerpt .= $this->get_excerpt($excerpt_length);
        $excerpt .= '</div>';


        $additional_classes_array = array();
        $additional_classes_array = apply_filters( 'td_composer_module_exclusive_class', $additional_classes_array, $this->post );

        ?>

        <div class="<?php echo $this->get_module_classes($additional_classes_array);?>">
            <div class="td-module-container">
                <?php echo $this->get_image($image_size, true);?>

                <div class="td-module-meta-info">
                    <?php if ($category_position == 'above' && $hide_cat != 'hide') { echo $this->get_category(); }?>

                    <?php echo $this->get_title($title_length, $title_tag);?>

                    <?php if ($excerpt_position == 'yes' && $hide_excerpt != 'hide') { echo $excerpt; } ?>

                    <?php if( ( $category_position == '' &&  $hide_cat != 'hide' ) || $hide_author_date != 'hide' ) { ?>
                        <div class="td-editor-date">
                            <?php if ($category_position == '' &&  $hide_cat != 'hide') { echo $this->get_category(); }?>
                            <?php echo $this->get_video_duration(); ?>

                            <?php if( $hide_author_date != 'hide' ) { ?>
                                <span class="td-author-date">
                                    <?php if( $hide_author != 'hide' ) { echo $this->get_author(true); } ?>
                                    <?php if( $hide_date != 'hide' ) { echo $this->get_date($modified_date, true, $time_ago, $time_ago_add_txt); } ?>
                                    <?php if( $hide_rev != 'hide' ) { echo $this->get_review(); } ?>
                                    <?php if( $hide_com != 'hide' ) { echo $this->get_comments(); } ?>
                                </span>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if ($excerpt_position == '' && $hide_excerpt != 'hide') { echo $excerpt; } ?>
                </div>
            </div>
        </div>

        <?php return ob_get_clean();
    }
}