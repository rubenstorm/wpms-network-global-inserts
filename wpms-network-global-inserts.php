<?php
/**
Plugin Name: WPMS Network Global Inserts
Plugin URI: http://ruben-storm.de/projekte/wpms-network-global-inserts/
Description: WPMS Network Global Inserts allow wordpress multisite network admin to insert html in the content accross the network
Version: 0.1.2
Author: Ruben Storm
Author URI: http://ruben-storm.de
License: GPLv3
Text Domain: wpmsngi
 */

/**
 *
 * WPMS Network Global Inserts 
 *
 * <p>Copyright (c) 2012 Ruben Storm</p>
 * 
 * <p><b>License</b></p>
 * 
 * <p>This Code is Based on WPMS Global Content from Neerav Dobaria</p>
 * 
 * <p>This program is free software; you can redistribute it and/or modify<br />
 * it under the terms of the GNU General Public License, version 2, as<br />
 * published by the Free Software Foundation.</p>
 *
 * <p>This program is distributed in the hope that it will be useful,<br />
 * but WITHOUT ANY WARRANTY; without even the implied warranty of<br />
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the<br />
 * GNU General Public License for more details.</p>
 *
 * <p>You should have received a copy of the GNU General Public License<br />
 * along with this program; if not, write to the Free Software</p>
 * <p>Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA</p>
 * 
 * <p>On how to install the plugin {@link wpmsngi::on_activate()} </p>
 * 
 * @package WPMSNGI
 * @name wpms-network-global-inserts
 * @author Neerav Dobaria
 * @author Ruben Storm <storm.ruben@gmail.com>
 * @version 0.0.3
 * @link http://apidocs.ruben-storm.eu/wpms-network-global-inserts/ Project Documentation
 * @link http://ruben-storm.de/projekte/wpms-network-global-inserts/ Project Page
 * @license GNU General Public License 3.0 (GPL) http://www.gnu.org/licenses/gpl.html
 * @copyright Copyright (c) 2012 Ruben Storm, storm.ruben@gmail.com
 * @todo making it multi lingual, all gettext and load_plugin_textdomain
 * @see wpmsngi::on_activate()
 * 
 */ 


if (!function_exists('add_action')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}

/**
 * Marker constant for the project name
 * 
 * <p>Changed the name of the path and the defines to take care no 
 * conflicts happen</p>
 * 
 * Sample Code:
 * <code>
 * define('WPMSNGI_NAME', 'WPMS Network Global Inserts');
 * </code>
 *
 * @author Neerav Dobaria
 * @author Ruben Storm
 * @version 0.0.1
 * @since WPMS Global Content
 * @name WPMSNGI_NAME
 * 
 */
define('WPMSNGI_NAME', 'WPMS Network Global Inserts');

/**
 * Marker constant for the project directory
 * 
 * <p>Changed the name of the path and the defines to take care no 
 * conflicts happen</p>
 * 
 * Sample Code:
 * <code>
 * define('WPMSNGI_PATH', WP_PLUGIN_DIR . '/wpms-network-global-inserts');
 * </code>
 * 
 * @author Neerav Dobaria
 * @author Ruben Storm
 * @version 0.0.1
 * @since WPMS Global Content
 * @name WPMSNGI_PATH
 */
define('WPMSNGI_PATH', WP_PLUGIN_DIR . '/wpms-network-global-inserts');

/**
 * Marker constant for the project directory
 * 
 * <p>Changed the name of the path and the defines to take care no 
 * conflicts happen</p>
 * 
 * Sample Code:
 * <code>
 * define('WPMSNGI_URL', WP_PLUGIN_URL . '/wpms-network-global-inserts');
 * </code>
 * 
 * @author Neerav Dobaria
 * @author Ruben Storm
 * @version 0.0.1
 * @since WPMS Global Content
 * @name WPMSNGI_URL
 */
define('WPMSNGI_URL', WP_PLUGIN_URL . '/wpms-network-global-inserts');

/**
 * Marker constant for the plugin name
 * 
 * <p>Changed the name of the path and the defines to take care no 
 * conflicts happen</p>
 * 
 * Sample Code:
 * <code>
 * define('WPMSNGI_BASENAME', plugin_basename(__FILE__));
 * </code>
 * 
 * @author Neerav Dobaria
 * @author Ruben Storm
 * @version 0.0.1
 * @since WPMS Global Content
 * @name WPMSNGI_BASENAME
 */
define('WPMSNGI_BASENAME', plugin_basename(__FILE__));

/**
 * Define the Textdomain
 *
 * This defines the textdomain for the translation global
 * 
 * @author Ruben Storm
 * @version 0.1.0
 * @since 0.1.0
 */
define('MY_PLUGIN_TEXTDOMAIN', 'wpmsngi');

/**
 * Define the folder 
 *
 * this defines the folder for the gettext files
 * 
 * @author Ruben Storm
 * @version 0.1.0
 * @since 0.1.0
 */
define('MY_PLUGIN_L10N_DIR', dirname(plugin_basename( __FILE__ )) . '/lang/');






if (!class_exists('wpmsngi')) {
    
    /**
     * The plugins main class
     * 
     * <p>Name of Class changed so it does not have any conflicts 
     * with the original</p>
     *
     * @author Neerav Dobaria
     * @author Ruben Storm
     * @version 0.0.1
     * @since WPMS Global Content
     * @name wpmsngi
     * @abstract function on_admin_print_scripts
     * @see wpmsngi::on_admin_print_scripts()
     * 
     */
    class wpmsngi
    {
        /**
         * Private vars
         * 
         * @author Neerav Dobaria
         * @version 0.0.1
         * @since WPMS Global Content
         * @var private $options
         * @var private $count 0
         */
        private $options;
        private $count = 0;
        
        
        
        
        /**
         * The main Function in he class
         * 
         * <p>Name changes so to preserve conflicts.</p>
         * <p>Switching between Blog 1 and current, checking if it is Blog 1</p>
         * 
         * Code example:
         * <code>
         * switch_to_blog(1);
         * $this->options = get_option('wpmsngi');
         * restore_current_blog();
         * </code>
         * 
         * <p><b>Add actions and filters</b></p>
         * 
         * <p>Only changed the names "add_network_global_inserts" and 
         * "add_network_global_inserts_posts" </p>
         * 
         * Code example:
         * <code>
         * add_action('init', array(&$this, 'load_script'));
         * add_filter('wp_footer', array(&$this, 'add_network_global_inserts'));
         * add_filter('the_content', array(&$this, 'add_network_global_inserts_posts'));
         * </code>
         *
         * @author Neerav Dobaria
         * @version 0.0.1
         * @since WPMS Global Content
         * @global int $blog_id the ID from the blog
         * @return type 
         */
        function wpmsngi()
        {
            global $blog_id;
            switch_to_blog(1);
            $this->options = get_option('wpmsngi');
            restore_current_blog();
            
            load_plugin_textdomain(MY_PLUGIN_TEXTDOMAIN, FALSE, MY_PLUGIN_L10N_DIR);
            
            if (is_admin()) {
                register_activation_hook(WPMSNGI_BASENAME, array(&$this, 'on_activate'));
                
                add_action('admin_init', array(&$this, 'on_admin_init'));
                
                // add_action('admin_init', array(&$this, 'wpmsngi_update_options'));
                
                $this->wpmsngi_update_options();

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

        

        
        /**
         * Register settings 
         * 
         * <p>Register the options in the WordPress database</p>
         * 
         * Code example:
         * <code>
         * register_setting('wpmsngi_options', 'wpmsngi');
         * </code>
         *
         * @author Neerav Dobaria
         * @version 0.0.1
         * @since WPMS Global Content
         * @name on_admin_init
         */
        function on_admin_init()
        {
            register_setting('wpmsngi_options', 'wpmsngi');
        }

        /**
         * Making the Menu in the admin area
         * 
         * <p>Creating the Menu for the admin desktop</p>
         *
         * @author Neerav Dobaria
         * @version 0.0.1
         * @since WPMS Global Content
         * @name on_admin_menu
         * 
         */
        function on_admin_menu()
        {
            $option_page = add_options_page(WPMSNGI_NAME . ' Options', WPMSNGI_NAME, 'Super Admin', WPMSNGI_BASENAME, array(&$this, 'options_page'));
            add_action("admin_print_scripts-$option_page", array(&$this, 'on_admin_print_scripts'));
            add_action("admin_print_styles-$option_page", array(&$this, 'on_admin_print_styles'));
            // add_action('plugins_loaded', 'wpmsngi_init');
        }
        
        

        /**
         * Loading scripts in assets
         * 
         * <p>Loading the .js scripts for the plugin</p>
         * 
         * <p>Removed, not needed anymore</p>
         *
         * @author Neerav Dobaria
         * @author Ruben Storm
         * @version 0.0.3
         * @since WPMS Global Content
         * @name load_script
         * @deprecated No use anymore, but let it in, maybe some function still call it
         * 
         */
        function load_script()
        {
        	// Not needed
            // wp_enqueue_script('wpmsngi_script', WPMSNGI_URL . '/assets/js/script.js', array('jquery'));
        }

        /**
         * Insert in Header and Footer
         * 
         * <p>Here it makes the "echo" to insert footer and header in <br />
         * all blogs network wide</p>
         * <p>Made some style change and changed names. </p>
         *
         * Old Version:
         * <code>
         * echo $this->options['header'];
         * echo $this->options['footer'];
         * </code>
         * 
         * New Version:
         * <code>
         * echo '<div id="wpmsngiheader"><center>' . $this->options['header'] . '</center></div>';
         * echo '<div id="wpmsngifooter"><p><center>' . $this->options['footer'] . '</center></p></div>';
         * </code>
         * 
         * @author Neerav Dobaria
         * @author Ruben Storm
         * @version 0.0.3
         * @since WPMS Global Content
         * @name add_network_global_inserts
         */
        function add_network_global_inserts()
        {
            // echo '<div id="wpmsngiheader"><center>' . $this->options['header'] . '</center></div>';
            echo '<div id="wpmsngifooter">' . $this->reform_printout($this->options['footer'], $wpmsngiopts['alignFooter']) . '</div>';
            
        }
        
        /**
         * Working over the posts and pages and insert the data
         * 
         * <p>It takes in the posts, pages and inserts head, center and foot <br />
         * parts and gives the ready page or post back</p>
         * 
         * <p>$content is the page or post before and after work</p>
         * 
         * <p><b>This part is new and not in the old version</b></p>
         *
         * @author Ruben Storm
         * @version 0.0.3
         * @since Version 0.0.1
         * @name add_network_global_inserts_posts
         * @param string $content
         * @return string $content
         */
        function add_network_global_inserts_posts($content) {
            
            $content.= '<!-- WPMSNGI:: '
                    . 'This input got made by wpms-network-global-inserts '
                    . 'It is a Wordpress Plugin, you will find your Plugins '
                    . '@ www.wordpress.org ... '
                    . 'Information about the Plugin you will find '
                    . '@ www.ruben-storm.de '
                    . 'Thank you for using this Plungin'
                    . '-->';
                       
            
            // Pages data
            $pagetop = $this->reform_printout($this->options['header'], $this->options['alignHeader']);
            $pagebottom = $this->reform_printout($this->options['pagesfooter'], $this->options['alignPagesFooter']);
            
            // Blog posts data
            $top = $this->reform_printout($this->options['postheader'], $this->options['alignPostHeader']);
            $center = $this->reform_printout($this->options['postcenter'], $this->options['alignPostCenter']);
            $bottom = $this->reform_printout($this->options['postfooter'], $this->options['alignPostFooter']);
            
                       
            if ((!is_feed()) && (!is_page())) {
                // add top
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
            
            if ((!is_feed()) && (is_page())) {
            	$content = $pagetop.$content.($pagebottom);
            }
            
            
            return $content;
        }
        
        /**
         * Make the Alignment for the Inserts
         * 
         * 
         * @param type $arrpos
         * @param type $alignment
         * @return string
         * @version 0.0.4
         * @since 0.0.4
         */
        function reform_printout($htmlcode, $alignment = '0') {
            
            $data = html_entity_decode($htmlcode);
            $cont = $data;
            
            if ($alignment == '1') {
                $cont = '<p align="left">' . $data . '</p>';
            }
            
            if ($alignment == '2') {
                $cont = '<p align="center">' . $data . '</p>';
            }
            
            if ($alignment == '3') {
                $cont = '<p align="right">' . $data . '</p>';
            }
            return $cont;
            
        }
        
        
        
        
        
        

        /**
         * Building the setup page in admin dashboard
         * 
         * <p> Build the editor for the admin backend and include the design <br />
         * from the wpmsngi-options</p>
         * 
         * <p>The old version had a TinyMCE editor in it, i tried to take it <br /> 
         * out because it is depricated with Adsense</p>
         * 
         * <code>
         * wp_tiny_mce(true, array('editor_selector' => 'wpmsngitextarea', 'width' => '100%','height' => '300px'));
         * </code>
         *
         * @author Neerav Dobaria
         * @version 0.0.1
         * @since WPMS Global Content
         * @name options_page
         * @todo checking on the TinyMCE problem again, something is still not ok
         */
        function options_page()
        {
            // 'a_nice_textarea' is class of textarea which will have TinyMCE
            
            wp_tiny_mce(true, array('editor_selector' => 'wpmsngitextarea', 'width' => '100%','height' => '300px'));
            include(WPMSNGI_PATH . '/wpmsngi-options.php');
        }
        
        /**
         * Get the design for admin dashboard
         * 
         * <p>Print admin dashboard .css file in the backend header</p>
         *
         * @author Neerav Dobaria
         * @version 0.0.1
         * @since WPMS Global Content
         * @name on_admin_print_styles
         */
        function on_admin_print_styles()
        {
            wp_enqueue_style('wpmsngiadminstyle', WPMSNGI_URL . '/assets/css/admin.css', false, '1.0', 'all');
        }

        /**
         * WARNING: Unused
         * 
         * <p>Could be depricated, dont have to do anything anymore. This is <br />
         * from the original plugin left over, the original Author did take it <br />
         * out, i dont know the reason why he left the method in it</p>
         * 
         * <code>
         * function on_admin_print_scripts()
         * {
         *      //wp_enqueue_script('farbtastic', TP_URL . '/assets/farbtastic/farbtastic.js', 'jquery');
         * }
         * </code>
         *
         * @author Neerav Dobaria
         * @name on_admin_print_scripts
         * @version 0.0.1
         * @since WPMS Global Content
         * @todo check on it, it does not have anything to do anymore
         * @deprecated No use anymore, but let it in, maybe some function still call it
         * @abstract
         */
        function on_admin_print_scripts()
        {
            //wp_enqueue_script('farbtastic', TP_URL . '/assets/farbtastic/farbtastic.js', 'jquery');
        }
        
        


        /**
         * 
         * Making the Links in the admin dashboard.
         * 
         * <p>Taking in existing links and insert this new link for 
         * the settings</p>
         * 
         * <p>It is adding the link for the plugin in the WordPress Dashboard</p>
         * 
         * Addes Translation __( 'Blog Options', 'wpms-network-global-inserts' )
         *
         * @author Neerav Dobaria
         * @name action_links
         * @version 0.0.4
         * @since WPMS Global Content
         * @param array $links the links allready exists
         * @return array $links the links including this one
         */
        function action_links($links)
        {
            $settings_link = '<a href="options-general.php?page=' . WPMSNGI_BASENAME . '">'. __( 'Settings', 'wpms-network-global-inserts' ) .'</a>';
            array_unshift($links, $settings_link);
            return $links;
        }
        
        
        /**
         * Makes a check if all is done right
         * 
         * @author Ruben Storm <storm.ruben@gmail.com>
         * @version 0.0.4
         * @since 0.0.4
         */
        function wpmsngi_update_options() {
            // settings_fields('wpmsngi_options');
            $wpmsngiopts = get_option('wpmsngi');
            
            $opts_include = $wpmsngiopts['include'];
            $opts_exclude = $wpmsngiopts['exclude'];
            $opts_header = $wpmsngiopts['header'];
            $opts_pagesfooter = $wpmsngiopts['pagesfooter'];
            $opts_postheader = $wpmsngiopts['postheader'];
            $opts_postcenter = $wpmsngiopts['postcenter'];
            $opts_postfooter = $wpmsngiopts['postfooter'];
            $opts_footer = $wpmsngiopts['footer'];
            $opts_submit = $wpmsngiopts['submit'];
            
            if (!$wpmsngiopts['alignHeader']) {
                $opts_alignHeader = '0';
            } else {
                $opts_alignHeader = $wpmsngiopts['alignHeader'];
            }
            
            if (!$wpmsngiopts['alignPagesFooter']) {
                $opts_alignPagesFooter = '0';
            } else {
                $opts_alignPagesFooter = $wpmsngiopts['alignPagesFooter'];
            }
            
            if (!$wpmsngiopts['alignPostHeader']) {
                $opts_alignPostHeader = '0';
            } else {
                $opts_alignPostHeader = $wpmsngiopts['alignPostHeader'];
            }
            
            if (!$wpmsngiopts['alignPostCenter']) {
                $opts_alignPostCenter = '0';
            } else {
                $opts_alignPostCenter = $wpmsngiopts['alignPostCenter'];
            }
            
            if (!$wpmsngiopts['alignPostFooter']) {
                $opts_alignPostFooter = '0';
            } else {
                $opts_alignPostFooter = $wpmsngiopts['alignPostFooter'];
            }
            
            if (!$wpmsngiopts['alignFooter']) {
                $opts_alignFooter = '0';
            } else {
                $opts_alignFooter = $wpmsngiopts['alignFooter'];
            }
            // $opts_header
            $temp = array(
                'include' => $opts_include,
                'exclude' => $opts_exclude,
                'header' => $opts_header,
                'alignHeader' => $opts_alignHeader,
            	'pagesfooter' => $opts_pagesfooter,
                'alignPagesFooter' => $opts_alignPagesFooter,
                'postheader' => $opts_postheader,
                'alignPostHeader' => $opts_alignPostHeader,
                'postcenter' => $opts_postcenter,
                'alignPostCenter' => $opts_alignPostCenter,
                'postfooter' => $opts_postfooter,
                'alignPostFooter' => $opts_alignPostFooter,
                'footer' => $opts_footer,
                'alignFooter' => $opts_alignFooter,
                'submit' => $opts_submit,
            );
            // add_option('wpmsngi_temp', $temp);
            update_option( 'wpmsngi', $temp );
        }
        
        /**
         * Setting the defaults 
         * 
         * <p>During plugin activation it makes the defaults in an array and <br />
         * set them up. They are for example for first time enduser </p>
         * 
         * <p><b>How to install the plugin:</b></p>
         * 
         * <p>To install the plugin upload it in your WordPress plugin directory,<br /> 
         * go to your MultiAdmin, activate it for all Blogs, network wide and then <br />
         * go to Blog No. 1 and in the Dashboard settings you have the place to <br />
         * set it up. You also can install it over the plugin installer.</p>
         *
         * Addes Translation __( 'Blog Options', 'wpms-network-global-inserts' )
         * 
         * @author Neerav Dobaria
         * @version 0.0.4
         * @since WPMS Global Content
         * @name on_activate
         */
        function on_activate()
        {
            $default = array(
                'include' => '0',
                'exclude' => '1',
                'header' => '',
            	'pagesfooter' => '',
                'postheader' => '',
                'postcenter' => '',
                'postfooter' => '',
                'footer' => '',
                'submit' => __('Save Changes', 'wpms-network-global-inserts' ),
            );
            if (!get_option('wpmsngi')) {
                add_option('wpmsngi', $default);
                
            }
        }
    }

    $wpmsngi = new wpmsngi();
}
