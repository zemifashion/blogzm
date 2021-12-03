<?php

class tdb_module_cat_grid_1 extends tdb_module {

    function __construct( $post_data_array, $module_atts = array() ) {
        //run the parrent constructor
        parent::__construct( $post_data_array, $module_atts );
    }

    function render($order_no) {
        ob_start();

        $image_size = $this->get_shortcode_att('image_size');
        $category_position = $this->get_shortcode_att('modules_category');
        $title_length = $this->get_shortcode_att('mcg_tl');
        $modified_date = $this->get_shortcode_att('show_modified_date');
        $time_ago = $this->get_shortcode_att('time_ago');
        $time_ago_add_txt = $this->get_shortcode_att('time_ago_add_txt');

        if (empty($image_size)) {
            $image_size = 'td_696x0';
        }


        ?>

        <div class="<?php echo $this->get_module_classes(array("tdb-cat-grid-post", "tdb-cat-grid-post-$order_no"));?>">
            <div class="td-module-container td-category-pos-<?php echo esc_attr($category_position) ?>">
                <div class="td-image-container">
                    <?php if ($category_position == 'image') { echo $this->get_category(); }?>
                    <?php echo $this->get_image($image_size);?>
                </div>

                <div class="td-module-meta-info">
                    <?php if ($category_position == 'above') { echo $this->get_category(); }?>

                    <div class="tdb-module-title-wrap">
                        <?php echo $this->get_title($title_length); ?>
                    </div>

                    <?php if ($category_position == '') { echo $this->get_category(); } ?>

                    <span class="td-editor-date">
                        <?php echo $this->get_author(true); ?>
                        <?php echo $this->get_date($modified_date, true, $time_ago, $time_ago_add_txt); ?>
                        <?php echo $this->get_review();?>
                    </span>
                </div>
            </div>
        </div>

        <?php return ob_get_clean();
    }
}