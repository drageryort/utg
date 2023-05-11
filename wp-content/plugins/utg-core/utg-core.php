<?php
/*
 * Plugin Name: UTG Core
 * Description: UTG core functionality
 * Version: 1.0
 * Author: ICG
 * Author URI: https://icecream.group/
*/

// If this file is called directly, abort
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'UtgCore' ) ) {

	class UtgCore {

		function initialize() {
			define( 'UTG_CORE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
			define( 'UTG_CORE_PLUGIN_DIR', plugins_url() . '/utg-core/' );
			define( 'UTG_CORE_DOMAIN', 'utg-core' );

			include_once UTG_CORE_PLUGIN_PATH . 'inc/UtgAcfInit.php';
			include_once UTG_CORE_PLUGIN_PATH . 'inc/translations.php';

			include_once UTG_CORE_PLUGIN_PATH . 'inc/post-types/UtgPost.php';
			include_once UTG_CORE_PLUGIN_PATH . 'inc/post-types/UtgProjectPost.php';
			include_once UTG_CORE_PLUGIN_PATH . 'inc/post-types/UtgTeamPost.php';
            include_once UTG_CORE_PLUGIN_PATH . 'inc/post-types/UtgCertificatePost.php';

			include_once UTG_CORE_PLUGIN_PATH . 'inc/entities/UtgEntities.php';
			include_once UTG_CORE_PLUGIN_PATH . 'inc/entities/UtgNews.php';
			include_once UTG_CORE_PLUGIN_PATH . 'inc/entities/UtgProject.php';

			include_once UTG_CORE_PLUGIN_PATH . 'inc/classes/UtgProjectFilter.php';

			include_once UTG_CORE_PLUGIN_PATH . 'inc/shortcodes/contacts.php';
			include_once UTG_CORE_PLUGIN_PATH . 'inc/shortcodes/news.php';
			include_once UTG_CORE_PLUGIN_PATH . 'inc/shortcodes/projects.php';
			include_once UTG_CORE_PLUGIN_PATH . 'inc/shortcodes/socials.php';

			add_action( 'init', array( $this, 'init' ), 5 );
		}

		function init() {
			UtgAcfInit::getInstance();
			new UtgProjectPost();
			new UtgTeamPost();
			new UtgCertificatePost();
			new UtgProjectFilter();
		}

	}

	function utgCore() {
		global $utgCore;

		if ( ! isset( $utgCore ) ) {
			$utgCore = new UtgCore();
			$utgCore->initialize();
		}

		return $utgCore;
	}

	utgCore();

}
