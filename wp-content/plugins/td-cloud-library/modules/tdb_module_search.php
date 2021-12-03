<?php

class tdb_module_search extends tdb_module {

    function __construct( $post_data_array, $module_atts = array() ) {
        //run the parrent constructor
        parent::__construct( $post_data_array, $module_atts );
    }

    function render() {
        ob_start();

        $hide_image = $this->get_shortcode_att('hide_image');
        $image_size = $this->get_shortcode_att('image_size');
        $category_position = $this->get_shortcode_att('modules_category');
        $btn_title = $this->get_shortcode_att('btn_title');
        $title_length = $this->get_shortcode_att('mc1_tl');
        $title_tag = $this->get_shortcode_att('mc1_title_tag');
        $author_photo = $this->get_shortcode_att('author_photo');
        $excerpt_length = $this->get_shortcode_att('mc1_el');
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

        $excerpt = '<div class="td-excerpt">';
            $excerpt .= $this->get_excerpt($excerpt_length);
        $excerpt .= '</div>';

        ?>

        <div class="tdb_module_header <?php echo $this->get_module_classes();?>">
            <div class="td-module-container td-category-pos-<?php echo esc_attr($category_position) ?>">
                <?php if( $hide_image == '' ) { ?>
                    <div class="td-image-container">
                        <?php if ($category_position == 'image' && $hide_cat != 'hide') { echo $this->get_category(); }?>
                        <?php echo $this->get_image($image_size);?>
                        <?php echo $this->get_video_duration(); ?>
                    </div>
                <?php } ?>

                <div class="td-module-meta-info">
                    <?php if ($category_position == 'above' && $hide_cat != 'hide') { echo $this->get_category(); }?>

                    <?php echo $this->get_title($title_length, $title_tag); ?>

                    <?php if ($excerpt_position == 'yes' && $hide_excerpt != 'hide') { echo $excerpt; } ?>

                    <?php if( ( $category_position == '' &&  $hide_cat != 'hide' ) || $hide_author_date != 'hide' ) { ?>
                        <div class="td-editor-date">
                            <?php if ($category_position == '' && $hide_cat != 'hide') { echo $this->get_category(); } ?>

                            <?php if( $hide_author_date != 'hide' ) { ?>
                                <span class="td-author-date">
                                    <?php if( $author_photo != '' || $hide_author != 'hide' ) { ?>
                                        <span class="td-author-info">
                                             <?php if( $author_photo != '' ) { echo $this->get_author_photo(); } ?>
                                             <?php if( $hide_author != 'hide' ) { echo $this->get_author(true); } ?>
                                        </span>
                                    <?php } ?>

                                    <?php if( $hide_date != 'hide' ) { echo $this->get_date($modified_date, true, $time_ago, $time_ago_add_txt); } ?>
                                    <?php if( $hide_rev != 'hide' ) { echo $this->get_review(); } ?>
                                    <?php if( $hide_com != 'hide' ) { echo $this->get_comments(); } ?>
                                </span>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if ($excerpt_position == '' && $hide_excerpt != 'hide') { echo $excerpt; } ?>

                    <?php if( $hide_btn != 'hide' ) { ?>
                    <div class="td-read-more">
                        <a href="<?php echo $this->href;?>"><?php echo __td($btn_title, TD_THEME_NAME);?></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <?php return ob_get_clean();
    }
}