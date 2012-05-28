<?php
/**
Plugin Name: WPMS Network Global Inserts
Plugin URI: http://projects.ruben-storm.eu/wpms-network-global-inserts/
Description: WPMS Network Global Inserts allow wordpress multisite network admin to insert html in the content accross the network
Version: 0.0.1
Author: Ruben Storm
Author URI: http://twitter.com/rubenstorm
License: GPLv3
 */

/**
 * @author Ruben Storm
 * @name WPMS Network Global Inserts
 * @link http://projects.ruben-storm.eu/wpms-network-global-inserts/
 * @license GNU General Public License 3.0 (GPL) http://www.gnu.org/licenses/gpl.html
 */
/*  Copyright 2012  Ruben Storm

    This Code is Based on WPMS Global Content from Neerav Dobaria
 
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!function_exists('add_action')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}

// Define certain terms which may be required throughout the plugin
define('WPMSNGI_NAME', 'WPMS Network Global Inserts');
define('WPMSNGI_PATH', WP_PLUGIN_DIR . '/wpms-network-global-inserts');
define('WPMSNGI_URL', WP_PLUGIN_URL . '/wpms-network-global-inserts');
define('WPMSNGI_BASENAME', plugin_basename(__FILE__));

if (!class_exists(wpavp)) {
    class wpmsngi
    {

        private $options;
        private $count = 0;
        /**
         *
         * 
         * @global type $blog_id
         * @return type 
         */
        function wpmsngi()
        {
            global $blog_id;
            switch_to_blog(1);
            $this->options = get_option('wpmsngi');
            restore_current_blog();
            
            if (is_admin()) {
                register_activation_hook(WPMSNGI_BASENAME, array(&$this, 'on_activate'));
                add_action('admin_init', array(&$this, 'on_admin_init'));

                if (1 == $blog_id) {
                    add_action('admin_menu', array(&$this, 'on_admin_menu'));
                }

                add_filter("plugin_action_links_" . WPMSNGI_BASENAME, array(&$this, 'action_links'));

                // since wp 3.2 function name has been changed
                if(get_bloginfo('version') >= 3.2){
                    add_action( 'admin_print_footer_scripts', 'wp_preload_dialogs', 30 );
                } else {
                    add_action( 'admin_print_footer_scripts', 'wp_tiny_mce_preload_dialogs', 30 );
                }
            } else {
                $include = $this->options['include'];
                $exclude = explode(',', $this->options['exclude']);

                // return nothing if blog in exclude list
                if ($include and !in_array($blog_id, $exclude))
                    return;

                // return nothing if blog not in include list
                if (!$include and in_array($blog_id, $exclude))
                    return;

                add_action('init', array(&$this, 'load_script'));
                add_filter('wp_footer', array(&$this, 'add_network_global_inserts'));
                add_filter('the_content', array(&$this, 'add_network_global_inserts_posts'));
            }
        }

        function on_admin_init()
        {
            register_setting('wpmsngi_options', 'wpmsngi');
        }

        function on_admin_menu()
        {
            $option_page = add_options_page(WPMSNGI_NAME . ' Options', WPMSNGI_NAME, 'Super Admin', WPMSNGI_BASENAME, array(&$this, 'options_page'));
            add_action("admin_print_scripts-$option_page", array(&$this, 'on_admin_print_scripts'));
            add_action("admin_print_styles-$option_page", array(&$this, 'on_admin_print_styles'));
        }

        function load_script()
        {
            wp_enqueue_script('wpmsngi_script', WPMSNGI_URL . '/assets/js/script.js', array('jquery'));
        }

        function add_network_global_inserts()
        {
            echo '<div id="wpmsngiheader"><center>' . $this->options['header'] . '</center></div>';
            echo '<div id="wpmsngifooter"><p><center>' . $this->options['footer'] . '</center></p></div>';
        }
        /**
         *
         * @author Ruben Storm
         * @param type $content
         * @return string 
         */
        function add_network_global_inserts_posts($content) {
            
            $content.= '<!-- wpms-network-global-inserts -->';
                       
            $top_tmp = html_entity_decode($this->options['postheader']);
            $center_tmp = html_entity_decode($this->options['postcenter']);
            $bottom_tmp = html_entity_decode($this->options['postfooter']);
            
            $top = '<center>'. $top_tmp .'</center>';
            $center = '<center>'. $center_tmp .'</center>';
            $bottom = '<center>'. $bottom_tmp .'</center>';
            
            if ((!is_feed()) && (!is_page())) {
                $more = '<span id="more-'.get_the_ID().'"></span>';
                if($morep=strpos($content,$more)!==false){
                    $content = str_replace($more, $more.$center, $content);
                    $top = '';
                }
                
                if (!is_single()) {
                    if (str_word_count($content) < 50) {
                        $bottom = '';
                        $top ='';
                    } else {
                        $this->count++;
                    }
                    if ($this->count % 2 == 0) {
                        // count ist gerade
                        $bottom = '';
                    } else {
                        $top ='';
                    }
                    
                    if ($this->count > 3) {
                        $top = '';
                        $bottom ='';
                    }
                }
                $content = $top.$content.($bottom);
            }
            return $content;
        }

        function options_page()
        {
            // 'a_nice_textarea' is class of textarea which will have TinyMCE
            wp_tiny_mce(true, array('editor_selector' => 'wpmsngitextarea', 'width' => '100%','height' => '300px'));
            include(WPMSNGI_PATH . '/wpmsngi-options.php');
        }
        
        function on_admin_print_styles()
        {
            wp_enqueue_style('wpmsngiadminstyle', WPMSNGI_URL . '/assets/css/admin.css', false, '1.0', 'all');
        }

        function on_admin_print_scripts()
        {
            //wp_enqueue_script('farbtastic', TP_URL . '/assets/farbtastic/farbtastic.js', 'jquery');
        }
        /**
         *
         * 
         * @param type $links
         * @return type 
         */
        function action_links($links)
        {
            $settings_link = '<a href="options-general.php?page=' . WPMSNGI_BASENAME . '">Settings</a>';
            array_unshift($links, $settings_link);
            return $links;
        }

        function on_activate()
        {
            $default = array(
                'include' => '0',
                'exclude' => '1',
                'header' => 'This will be displayed in the page header.',
                'postheader' => 'This will be displayed in the posts header.',
                'postcenter' => 'This will be displayed in the posts center.',
                'postfooter' => 'This will be displayed in the posts footer.',
                'footer' => 'This will be displayed in the page footer.',
                'submit' => 'Save Changes',
            );
            if (!get_option('wpmsngi')) {
                add_option('wpmsngi', $default);
            }
        }
    }

    $wpmsngi = new wpmsngi();
}
