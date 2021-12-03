<?php

/**
 * Theme configuration
 *
 */

define("TD_THEME_NAME", "Newspaper");
define("TD_THEME_VERSION", "11.3.2");
define("TD_THEME_OPTIONS_NAME", "td_011");

//if no deploy mode is selected, we use the final deploy built
if (!defined('TD_DEPLOY_MODE')) {
    define("TD_DEPLOY_MODE", 'deploy');
}


switch (TD_DEPLOY_MODE) {
    default:
        //deploy version - this is the version that we ship!
        define("TD_DEBUG_LIVE_THEME_STYLE", false);
        define("TD_DEBUG_IOS_REDIRECT", false);
        define("TD_DEBUG_USE_LESS", false);
        break;

    case 'dev':
        //dev version
        define("TD_DEBUG_LIVE_THEME_STYLE", true);
        define("TD_DEBUG_IOS_REDIRECT", false);
        define("TD_DEBUG_USE_LESS", true); //use less on dev
        break;

    case 'demo':
        //demo version
        define("TD_DEBUG_LIVE_THEME_STYLE", true);
		// remove themeforest iframe from ios devices on demo only!
		// not used anymore - live preview goes on select demos
        define("TD_DEBUG_IOS_REDIRECT", false);
        define("TD_DEBUG_USE_LESS", false);
        break;
}

do_action('td_config');

class tagdiv_config {

	/**
	 * setup the global theme specific variables
	 * @depends tagdiv_global
	 */
	static function on_tagdiv_global_after_config() {

		/**
		 * theme plugins
		 */
		tagdiv_global::$theme_plugins_for_info_list = array (
			array(
				'name' => 'Revolution Slider',
				'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/rev-slider.png',
				'text' => 'Build amazing slide presentations for your website with ease<br><a href="https://forum.tagdiv.com/how-to-install-revolution-slider-v5/" target="_blank">How to install v5</a>',
				'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
				'slug' => 'revslider'
			),
//			array(
//				'name' => 'Visual Composer',
//				'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/visual-composer.png',
//				'text' => 'Customize your pages and posts with this popular page builder<br><a href="https://forum.tagdiv.com/how-to-use-visual-composer/" target="_blank">Read more</a>',
//				'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
//				'slug' => 'js_composer'
//			)
		);
		tagdiv_global::$theme_plugins_list = array(
			array(
				'name' => 'tagDiv Composer', // The plugin name
				'slug' => 'td-composer', // The plugin slug (typically the folder name)
				'source' => 'https://cloud.tagdiv.com/td_plugins/td-composer/810534ce963cec6bd2e7978db2c935c9x/td-composer.zip', // The plugin source
				'required' => true, // If false, the plugin is only 'recommended' instead of required
				'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' => '', // If set, overrides default API URL and points to an external URL
				'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/td-composer.png',
				'text' => 'Create beautiful pages with this custom frontend drag and drop builder<br><a href="https://forum.tagdiv.com/tagdiv-composer-tutorial/" target="_blank">Read more</a>',
				'required_label' => 'required', //the text for required/recommended label - used also as a class for label bg color
				'td_activate' => false, // custom field used to activate the plugin
				'td_install' => false, // custom field used to install the plugin
				'td_class' => 'tdc_version_check', // class used to recognize the plugin is activated
				'td_install_in_welcome' => true, // custom field used to install/update/activate the plugin from theme welcome panel
			),
			array(
				'name' => 'tagDiv Cloud Library', // The plugin name
				'slug' => 'td-cloud-library', // The plugin slug (typically the folder name)
				'source' => 'https://cloud.tagdiv.com/td_plugins/td-cloud-library/2713a088559ff26084e8003394764364/td-cloud-library.zip', // The plugin source
				'required' => true, // If false, the plugin is only 'recommended' instead of required
				'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' => '', // If set, overrides default API URL and points to an external URL
				'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/cloud-templates.jpg',
				'text' => 'Access a huge collection of fully editable templates and elements',
				'required_label' => 'required', //the text for required/recommended label - used also as a class for label bg color
				'td_activate' => false, // custom field used to activate the plugin
				'td_install' => false, // custom field used to install the plugin
				'td_class' => 'tdb_version_check', // class used to recognize the plugin is activated
				'td_install_in_welcome' => true, // custom field used to install/update/activate the plugin from theme welcome panel
			),
			array(
				'name' => 'tagDiv Social Counter', // The plugin name
				'slug' => 'td-social-counter', // The plugin slug (typically the folder name)
				'source' => 'https://cloud.tagdiv.com/td_plugins/td-social-counter/46b850a367a910ae523f28f87a88b384/td-social-counter.zip', // The plugin source
				'required' => true, // If false, the plugin is only 'recommended' instead of required
				'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' => '', // If set, overrides default API URL and points to an external URL
				'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/social.png',
				'text' => 'Display your activity on social networks with style using this cool feature<br><a href="https://forum.tagdiv.com/tagdiv-social-counter-tutorial/" target="_blank">Read more</a>',
				'required_label' => 'required', //the text for required/recommended label - used also as a class for label bg color
				'td_activate' => false, // custom field used to activate the plugin
				'td_install' => false, // custom field used to install the plugin
				'td_class' => 'td_social_counter_plugin', // class used to recognize the plugin is activated
				'td_install_in_welcome' => true, // custom field used to install/update/activate the plugin from theme welcome panel
			),
			array(
				'name' => 'tagDiv Newsletter', // The plugin name
				'slug' => 'td-newsletter', // The plugin slug (typically the folder name)
				'source' => 'https://cloud.tagdiv.com/td_plugins/td-newsletter/fb78c20f1c592d0d1907a1a43bd5cce1/td-newsletter.zip', // The plugin source
				'required' => false, // If false, the plugin is only 'recommended' instead of required
				'version' => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' => '', // If set, overrides default API URL and points to an external URL
				'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/tagdiv-newsletter.png',
				'text' => 'tagDiv\'s Newsletter plugin, beautifully designed with over 8 styles',
				'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
				'td_activate' => false, // custom field used to activate the plugin
				'td_install' => false, // custom field used to install the plugin
				'td_class' => 'td_newsletter_version_check', // class used to recognize the plugin is activated
				'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
			),
            array(
                'name' => 'tagDiv Opt-In Builder', // The plugin name
                'slug' => 'td-subscription', // The plugin slug (typically the folder name)
                'source' => 'https://cloud.tagdiv.com/td_plugins/td-subscription/18da952bde8fab1875ba66b9c5072e53/td-subscription.zip', // The plugin source
                'required' => false, // If false, the plugin is only 'recommended' instead of required
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
                'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/tagdiv-optin.png',
                'text' => 'Generate leads & convert visitors to subscribers with opt-in content lockers',
                'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
                'td_activate' => false, // custom field used to activate the plugin
                'td_install' => false, // custom field used to install the plugin
                'td_class' => 'tds_version_check', // class used to recognize the plugin is activated
                'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
            ),
            array(
                'name' => 'tagDiv Shop', // The plugin name
                'slug' => 'td-woo', // The plugin slug (typically the folder name)
                'source' => 'https://cloud.tagdiv.com/td_plugins/td-woo/95eb75337478b64fa8c3cf9e47c2d7b8/td-woo.zip', // The plugin source
                'required' => false, // If false, the plugin is only 'recommended' instead of required
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
                'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/tagdiv-shop.png',
                'text' => 'Activate for super powers and features on your WooCommerce website',
                'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
                'td_activate' => false, // custom field used to activate the plugin
                'td_install' => false, // custom field used to install the plugin
                'td_class' => 'td_woo_version_check', // class used to recognize the plugin is activated
                'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
            ),
			array(
				'name' => 'tagDiv Mobile Theme', // The plugin name
				'slug' => 'td-mobile-plugin', // The plugin slug (typically the folder name)
				'source' => 'https://cloud.tagdiv.com/td_plugins/td-mobile-plugin/7fa1eb38edb5bec681ed7275f047fb9e/td-mobile-plugin.zip', // The plugin source
				'required' => false, // If false, the plugin is only 'recommended' instead of required
				'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' => '', // If set, overrides default API URL and points to an external URL
				'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/mobile.png',
				'text' => 'Make your website lighter and faster on all mobile devices<br><a href="https://forum.tagdiv.com/the-mobile-theme/" target="_blank">Read more</a>',
				'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
				'td_activate' => false, // custom field used to activate the plugin
				'td_install' => false, // custom field used to install the plugin
				'td_class' => 'td_mobile_theme', // class used to recognize the plugin is activated
				'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
			),
			array(
				'name' => 'Official AMP for WP', // The plugin name
				'slug' => 'amp', // The plugin slug (typically the folder name)
				'required' => false, // If false, the plugin is only 'recommended' instead of required
				'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/tagdiv-amp.png',
				'text' => 'Mobile Theme requires the AMP plugin to give your site the best results<br><a href="https://tagdiv.com/amp-newspaper-theme/" target="_blank">Read more</a>',
				'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
				'td_class' => 'AMP_Autoloader', // class used to recognize the plugin is activated
				'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
			),
            array(
                'name' => 'tagDiv Standard Pack', // The plugin name
                'slug' => 'td-standard-pack', // The plugin slug (typically the folder name)
                'source' => 'https://cloud.tagdiv.com/td_plugins/td-standard-pack/79f8a1d02f05c15c98a62e68cd419e0b/td-standard-pack.zip', // The plugin source
                'required' => false, // If false, the plugin is only 'recommended' instead of required
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
                'img' => get_template_directory_uri() . '/includes/wp-booster/wp-admin/images/plugins/standard-pack.jpg',
                'text' => 'Build your website fast and effortless without code. Perfect for beginners',
                'required_label' => 'optional', //the text for required/recommended label - used also as a class for label bg color
                'td_activate' => false, // custom field used to activate the plugin
                'td_install' => false, // custom field used to install the plugin
                'td_class' => 'tdsp_version_check', // class used to recognize the plugin is activated
                'td_install_in_welcome' => false, // custom field used to install/update/activate the plugin from theme welcome panel
            ),
		);
	}
}
