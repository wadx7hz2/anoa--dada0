=== Sazx Hotlink Blocker ===
Contributors: tinsaebelay
Tags:  attachments, files, hotlink, images, media
Requires at least: 3.8
Tested up to: 5.8
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Blocks every hotlinks to your uploaded assests.

== Description ==

This plugin will block all hotlinking  to your uploaded medias from other website.
Hotlink protection is provided via `.htaccess` rules in the `wp-content/uploads` directory.

== Basic Usage ==

Once the Sazx Hotlink Blocker is installed go to your WordPress admin dahsboard > Plugins , and actiate the "Sazx Hotlink Blocker". and that is all you need to do to start the protection, and cut bandwidth usage. the plugin will create .htacess files during activation, the created .htaccess file will be removed when the plugin is deactivated.

== Installation ==

1. Go to "Plugins > Add New" in the WordPress admin area.
1. Search for "Sazx Hotlink Blocker".
1. Install, then Activate the plugin.

== Frequently Asked Questions ==

= How does Sazx Hotlink Blocker work?

Sazx Hotlink Blocker creates an Apache `.htaccess` file in the `wp-content/uploads` directory.  the .htaccess file will redirect all medua downloads to 

= Can it be used with any type of media file?
Yes.

= Does it support download resume?
Yes.

= Does it with with web servers other than Apache?

The server must process rewrite rules in `.htaccess`. So Sazx Hotlink Blocker will work on Apache and LightSpeed servers, but not NGINX.
