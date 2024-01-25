<?php


namespace sazx;

/**
 * Plugin Name: Sazx Hot Link Blocker
 * Plugin URI: https://wordpress.org/plugins/sazx-hot-link-blocker/
 * Description: Blocks all hotlin [ks to your uploaded files.
 * Version:1.0.0
 * Author: Tinsae Belay
 * Author URI: https://tinsaebelay.github.io/
 * Requires at least: 5.0
 * Requires PHP: 7.0
 *
 * @package tinsae.sazx.dlb
 */

defined('ABSPATH') || exit;

if (!defined('SAZX_DLB_PLUGIN_FILE')) {
	define('SAZX_DLB_PLUGIN_FILE', __FILE__);
}

register_activation_hook(__FILE__, function () {

	/**
	 * * Copy htaccess to uploads directory,
	 * if there exist already, rename
	 */

	$uploads_dir = wp_upload_dir()["basedir"];
	if (file_exists($uploads_dir . "/.htaccess")) {
		/**
		 * Backup the existing .htaccess file by renaming the file.
		 */

		$renamed = rename($uploads_dir . "/.htaccess", $uploads_dir . "/.htaccess" . ".sazxdlb");
		if (!$renamed) {
			die("Faild to backup existing htaccess file from " . $uploads_dir);
			return false;
		}
	}

	/**
	 * Generate  the  htaccess rules
	 */

	 $file_sender_path =  __DIR__ . "/file_sender.php";
	 $file  =  fopen(  $uploads_dir . "/.htaccess" ,'w');
	 
	 $rule = "RewriteEngine On\n";
	 $rule .= "RewriteRule .* $file_sender_path";

	 /**
	  * 
	  * Save the generated htaccess rule in uploads directory.
	  */	 

	 $saved = fwrite( $file, $rule );

	// $copied = copy(__DIR__ . "/htaccess.file",  $uploads_dir . "/.htaccess");
	if (!$saved) {
		die("Faild to copy  htaccess file tp " . $uploads_dir);
		return false;
	}
});

register_deactivation_hook(__FILE__, function () {
	
	/**
	 * delete htaccess file from uploads directory,
	 * if a backup exist restore.
	 */



	/**
	 * Delete the htaccess file that  used to redirected requests to uploads directory to a php script 
	 */
	$uploads_dir = wp_upload_dir()["basedir"];

	if( file_exists( $uploads_dir . "/.htaccess" ) ){
		$deleted = unlink(  $uploads_dir . "/.htaccess");
		if (!$deleted) {
			die("Faild to remove the  htaccess file from" . $uploads_dir);
			return false;
		}
	}

	if (file_exists( $uploads_dir . "/.htaccess" . ".sazxdlb")) {
		/**
		 * Backup the existing .htaccess file by renaming the file.
		 */

		$renamed = rename($uploads_dir . "/.htaccess" . ".sazxdlb", $uploads_dir . "/.htaccess",  );
		if (!$renamed) {
			die("Faild to backup existing htaccess file from " . $uploads_dir);
			return false;
		}
	}

});
