<?php
/*
Plugin Name: WP Easy Sharing

Version: 1.1.2

Plugin URI: http://wordpress.org/plugins/wp-easy-sharing/

Description: Social sharing buttons for Facebook, Twitter, Linkedin, Pinterest, Google+ and Tutorsloop to wordpress posts, pages or media. 

Author: Fahad Mahmood

Author URI: http://shop.androidbubbles.com

Text Domain: wp-easy-sharing

License: GPL2

This WordPress Plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
This free software is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with this software. If not, see http://www.gnu.org/licenses/gpl-2.0.html.
*/

	

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

	

	

	

	if ( ! defined( 'ABSPATH' ) ) {

		header( 'Status: 403 Forbidden' );

		header( 'HTTP/1.1 403 Forbidden' );

		exit;

	}

	

	global $wpe_pro, $wpe_premium_link;

	

	$wpe_data = get_plugin_data(__FILE__);

	define('ES_VERSION', $wpe_data['Version']);

	define( "ES_DIR", plugin_dir_path( __FILE__ ) ); 

	define( "ES_PLUGIN_URL", plugins_url( '/' , __FILE__ ) );

	define('WPES_DEFAULT_ORDER', 'f,t,g,l,p,y,tl');

	define('WPES_DEFAULT_ICONS', 'facebook,twitter,googleplus,linkedin,pinterest,youtube,tutorsloop');

	$wpe_pro = file_exists(ES_DIR.'pro/wpes_wall.php');

	$wpe_premium_link = 'http://shop.androidbubbles.com/product/wp-easy-sharing-pro';

	

	

	if($wpe_pro)

	wpe_backup_pro();

	

	function wpe_backup_pro($src='pro', $dst='') { 



		$plugin_dir = plugin_dir_path( __FILE__ );

		$uploads = wp_upload_dir();

		$dst = ($dst!=''?$dst:$uploads['basedir']);

		$src = ($src=='pro'?$plugin_dir.$src:$src);

		

		$pro_check = basename($plugin_dir);



		$pro_check = $dst.'/'.$pro_check.'.dat';



		if(file_exists($pro_check)){

			if(!is_dir($plugin_dir.'pro')){

				mkdir($plugin_dir.'pro');

			}

			$files = file_get_contents($pro_check);

			$files = explode('\n', $files);

			if(!empty($files)){

				foreach($files as $file){

					

					if($file!=''){

						

						$file_src = $uploads['basedir'].'/'.$file;

						//echo $file_src.' > '.$plugin_dir.'pro/'.$file.'<br />';

						//copy($file_src, $plugin_dir.'pro/'.$file);



						$trg = $plugin_dir.'pro/'.$file;

						if(!file_exists($trg))

						copy($file_src, $trg);

						

					}

				}//exit;

			}

		}

		

		if(is_dir($src)){

			if(!file_exists($pro_check)){

				$f = fopen($pro_check, 'w');

				fwrite($f, '');

				fclose($f);

			}	

			$dir = opendir($src); 

			@mkdir($dst); 

			while(false !== ( $file = readdir($dir)) ) { 

				if (( $file != '.' ) && ( $file != '..' )) { 

					if ( is_dir($src . '/' . $file) ) { 

						wpe_backup_pro($src . '/' . $file, $dst . '/' . $file); 

					} 

					else { 

						$dst_file = $dst . '/' . $file;

						

						if(!file_exists($dst_file)){

							

							copy($src . '/' . $file,$dst_file); 

							$f = fopen($pro_check, 'a+');

							fwrite($f, $file.'\n');

							fclose($f);

						}

					} 

				} 

			} 

			closedir($dir); 

			

		}	

	}	

	

	

	if($wpe_pro)

	include(ES_DIR.'pro/wpes_wall.php');

	

	require_once ES_DIR . 'core.php';

	

	if( ! is_admin() ) {

		require_once ES_DIR . 'classes/class-public.php';

		new ES_Public();

	} elseif( ! defined("DOING_AJAX") || ! DOING_AJAX ) {

		require ES_DIR . 'classes/class-admin.php';

		new ES_Admin();

		

		$plugin = plugin_basename(__FILE__); 

		add_filter("plugin_action_links_$plugin", 'wpe_plugin_links' );			

	}

	

	register_activation_hook(__FILE__, array('ES_Admin','wes_plugin_activation_action'));

	

	add_action( 'plugins_loaded', 'wes_update_db_check_while_plugin_upgrade' );

	

	function wes_update_db_check_while_plugin_upgrade(){
		//update_option('wes_wpe_sharing', WPES_DEFAULT_ORDER);
		$default = get_option('wpe_sharing');
		//pree($defaults);exit;
		update_option('wpe_sharing',$default);
	}