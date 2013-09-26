<?php

/**
 *
 * WPMS Network Global Inserts
 * 
 * <p>Copyright (c) 2012 Ruben Storm</p>
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
 * @package WPMSNGI
 * @name wpmsngi-options
 * @author Neerav Dobaria
 * @author Ruben Storm <storm.ruben@gmail.com>
 * @version 0.0.3
 * @since WPMS Global Content
 * @link http://apidocs.ruben-storm.eu/wpms-network-global-inserts/ Project Documentation
 * @link http://ruben-storm.de/projekte/wpms-network-global-inserts/ Project Page
 * @license GNU General Public License 3.0 (GPL) http://www.gnu.org/licenses/gpl.html
 * @copyright Copyright (c) 2012 Ruben Storm, <storm.ruben@gmail.com>
 * 
 */

?>

<div id="wpmsngi-options" class="wpmsngi-option wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php echo WPMSNGI_NAME ?> Options</h2>

    <form method="post" action="options.php">
        <?php settings_fields('wpmsngi_options');
        $wpmsngiopts = get_option('wpmsngi'); ?>

        <table class="form-table">
        
        	<tr valign="top">
                <td scope="row" colspan="2"><H1>Settings for Network</H1></td>
                
            </tr>
            
            <tr valign="top">
                <td class="label" scope="row">Exclude/Include</td>
                <td>
                    <input name="wpmsngi[include]"
                           value="0" <?php echo ($wpmsngiopts['include']) ? '' : 'checked="checked"'; ?>
                           type="radio"/> Exclude Following&nbsp;&nbsp;&nbsp;
                    <input name="wpmsngi[include]"
                           value="1" <?php echo ($wpmsngiopts['include']) ? 'checked="checked"' : ''; ?>
                           type="radio"/> Include Following
                    <br/>
                    <input type="text" name="wpmsngi[exclude]" value="<?php echo $wpmsngiopts['exclude']?>"/>
                    <br/>
                    <small>Comma separated list of blog ids you want to exclude/include.
                        Select Exclude Following and leave textbox empty if you want to show it on all blogs. (0 will insert it in all blogs).
                    </small>
                </td>
            </tr>
            
            <tr valign="top">
                <td scope="row" colspan="2"><H1>Pages Content</H1></td>
                
            </tr>

            <tr valign="top">
                <td scope="row">Pages Header Content</td>
                <td>
                    <textarea id="wpmsngitextheader" class="wpmsngitextarea"
                              name="wpmsngi[header]"><?php echo $wpmsngiopts['header']?></textarea>
                    <br/>
                    <small>Enter content that will be displayed in the pages header.</small>
                </td>
            </tr>
            
            <tr valign="top">
                <td scope="row">Pages Footer Content</td>
                <td>
                    <textarea id="wpmsngitextpagesfooter" class="wpmsngitextarea"
                              name="wpmsngi[pagesfooter]"><?php echo $wpmsngiopts['pagesfooter']?></textarea>
                    <br/>
                    <small>Enter content that will be displayed in the pages footer.</small>
                </td>
            </tr>
            
            <tr valign="top">
                <td scope="row" colspan="2"><H1>Posts Content</H1></td>
                
            </tr>
            
            <tr valign="top">
                <td scope="row">Post Header Content</td>
                <td>
                    <textarea id="wpmsngitextpostheader" class="wpmsngitextarea"
                              name="wpmsngi[postheader]"><?php echo $wpmsngiopts['postheader']?></textarea>
                    <br/>
                    <small>Enter content that will be displayed in header of the post.</small>
                </td>
            </tr>
            
            <tr valign="top">
                <td scope="row">Post center Content</td>
                <td>
                    <textarea id="wpmsngitextpostcenter" class="wpmsngitextarea"
                              name="wpmsngi[postcenter]"><?php echo $wpmsngiopts['postcenter']?></textarea>
                    <br/>
                    <small>Enter content that will be displayed in center of the post. Only if there is a more, it will show right behind it.</small>
                </td>
            </tr>
            
            <tr valign="top">
                <td scope="row">Post footer Content</td>
                <td>
                    <textarea id="wpmsngitextpostfooter" class="wpmsngitextarea"
                              name="wpmsngi[postfooter]"><?php echo $wpmsngiopts['postfooter']?></textarea>
                    <br/>
                    <small>Enter content that will be displayed in footer of the post.</small>
                </td>
            </tr>
            
            <tr valign="top">
                <td scope="row" colspan="2"><H1>Blog Footer Content</H1></td>
                
            </tr>
            

            <tr valign="top">
                <td scope="row">Footer Content</td>
                <td>
                    <textarea id="wpmsngitextfooter" class="wpmsngitextarea"
                              name="wpmsngi[footer]"><?php echo $wpmsngiopts['footer']?></textarea>
                    <br/>
                    <small>Enter content that will be displayed in the footer of all posts and pages.</small>
                </td>
            </tr>

        </table>

        <p class="submit">
            <input type="submit" class="button-primary" name="wpmsngi[submit]" value="<?php _e('Save Changes') ?>"/>
        </p>
    </form>
    <h1>Donation / Spende</h1>
    <p>If you find this plugin useful, please donate to continue development. <em>Donation USD (5,-) or EUR (5,-)</em></p>
    <p>Visit the <a href="http://ruben-storm.de/projekte/wpms-network-global-inserts/" target="_blank">Project Page</a> on my 
    <a href="http://ruben-storm.de/projekte/wpms-network-global-inserts/" target="_blank">Homepage</a>. You will find information 
    on my <a href="http://ruben-storm.de/projekte/wpms-network-global-inserts/" target="_blank">Blog</a>.. (in german)</p>
    <h3>Deutsch in EUR</h3>
    <p>Spenden Sie EUR 5</p>
    <form name="_xclick" action="https://www.paypal.com/de/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="ruben.storm@gmx.de">
        <input type="hidden" name="item_name" value="Spende WPMS Network Global Inserts">
        <input type="hidden" name="currency_code" value="EUR">
        <input type="hidden" name="amount" value="5,00">
        <input type="image" src="http://www.paypal.com/de_DE/i/btn/x-click-butcc-donate.gif" border="0" name="submit" alt="Zahlen Sie mit PayPal - schnell, kostenlos und sicher!">
    </form>
    <h3>English in USD</h3>
    <p>Donate USD 5</p>
    <form name="_xclick" action="https://www.paypal.com/de/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="ruben.storm@gmx.de">
        <input type="hidden" name="item_name" value="Donate for WPMS Network Global Inserts">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="amount" value="5,00">
        <input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-butcc-donate.gif" border="0" name="submit" alt="Zahlen Sie mit PayPal - schnell, kostenlos und sicher!">
    </form>
    
    
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var idH = 'wpmsngitextheader';

        $('a.toggleHVisual').click(
                function() {
                    tinyMCE.execCommand('mceAddControl', false, idH);
                }
                );

        $('a.toggleHHTML').click(
                function() {
                    tinyMCE.execCommand('mceRemoveControl', false, idH);
                }
                );

        var idF = 'wpmsngitextfooter';

        $('a.toggleFVisual').click(
                function() {
                    tinyMCE.execCommand('mceAddControl', false, idF);
                }
                );

        $('a.toggleFHTML').click(
                function() {
                    tinyMCE.execCommand('mceRemoveControl', false, idF);
                }
                );

    });
</script>