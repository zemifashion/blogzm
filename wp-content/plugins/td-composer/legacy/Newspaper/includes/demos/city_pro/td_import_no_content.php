<?php
/*  ----------------------------------------------------------------------------
	CLOUD TEMPLATES
*/

$template_header_template_city_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template Overlay - City PRO',
    'file' => 'header_overlay_cloud_template.txt',
    'template_type' => 'header',
));

$template_header_template_main_city_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Header Template Main – City PRO',
    'file' => 'header_cloud_template.txt',
    'template_type' => 'header',
));

td_demo_misc::update_global_header_template( 'tdb_template_' . $template_header_template_main_city_pro_id);


$template_footer_city_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Footer - City PRO',
    'file' => 'footer_cloud_template.txt',
    'template_type' => 'footer',
));

td_demo_misc::update_global_footer_template( 'tdb_template_' . $template_footer_city_pro_id);


$template_tag_template_city_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Tag Template - City PRO',
    'file' => 'tag_cloud_template.txt',
    'template_type' => 'tag',
));

td_demo_misc::update_global_tag_template( 'tdb_template_' . $template_tag_template_city_pro_id);


$template_date_template_city_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Date Template - City PRO',
    'file' => 'date_cloud_template.txt',
    'template_type' => 'date',
));

td_demo_misc::update_global_date_template( 'tdb_template_' . $template_date_template_city_pro_id);


$template_search_template_city_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Search Template - City PRO',
    'file' => 'search_cloud_template.txt',
    'template_type' => 'search',
));

td_demo_misc::update_global_search_template( 'tdb_template_' . $template_search_template_city_pro_id);


$template_author_template_city_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Author Template - City PRO',
    'file' => 'author_cloud_template.txt',
    'template_type' => 'author',
));

td_demo_misc::update_global_author_template( 'tdb_template_' . $template_author_template_city_pro_id);


$template_404_template_city_pro_id = td_demo_content::add_cloud_template(array(
    'title' => '404 Template - City PRO',
    'file' => '404_cloud_template.txt',
    'template_type' => '404',
));

td_demo_misc::update_global_404_template( 'tdb_template_' . $template_404_template_city_pro_id);


$template_category_template_city_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Category Template - City PRO',
    'file' => 'cat_cloud_template.txt',
    'template_type' => 'category',
));

td_demo_misc::update_global_category_template( 'tdb_template_' . $template_category_template_city_pro_id);


$template_single_post_template_city_pro_id = td_demo_content::add_cloud_template(array(
    'title' => 'Single Post Template - City PRO',
    'file' => 'post_cloud_template.txt',
    'template_type' => 'single',
));

td_util::update_option('td_default_site_post_template', 'tdb_template_' . $template_single_post_template_city_pro_id);


/*  ----------------------------------------------------------------------------
	PAGES
*/
$page_home_id = td_demo_content::add_page(array(
    'title' => 'Home',
    'file' => 'home.txt',
    'header_template_id' => $template_header_template_city_pro_id,
    'homepage' => true,
));