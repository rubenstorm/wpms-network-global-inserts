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
 * @author Ruben Storm <storm.ruben@gmail.com>
 * @version 0.0.4
 * @since Version 0.0.4
 * @link http://apidocs.ruben-storm.eu/wpms-network-global-inserts/ Project Documentation
 * @link http://ruben-storm.de/projekte/wpms-network-global-inserts/ Project Page
 * @license GNU General Public License 3.0 (GPL) http://www.gnu.org/licenses/gpl.html
 * @copyright Copyright (c) 2012 Ruben Storm, <storm.ruben@gmail.com>
 * 
 */











        
        

?>

<div id="wpmsngi-options" class="wpmsngi-option wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <div class="page-header">
        <h1><?php echo WPMSNGI_NAME ?> <small><?php _e( 'Settings', 'wpmsngi' ) ?></small></h1>
    </div>
    <div width="70%">
        <div style="width: 70% !important; max-width: 400px;">
            <form method="post" action="options.php">
                <?php
                    settings_fields('wpmsngi_options');

                    $wpmsngiopts = get_option('wpmsngi');

                    function do_check($pos, $val) {
                        if ($pos == $val) {
                           return '1';
                        } else {
                            return '0';
                        }
                    }
                    ?>
                <table class="form-table">
                    <tr valign="top">
                        <td scope="row" colspan="2"><H1><?php _e( 'Network Settings', 'wpmsngi' ) ?></H1></td>
                    </tr>
                    <tr valign="top">
                        <td class="label" rowspan="4" style="vertical-align: top;"><?php _e( 'Exclude/Include', 'wpmsngi' ) ?></td>
                    </tr>
                    <tr valign="top">
                        <td>
                            <label>
                                <input name="wpmsngi[include]"  id="optionsRadios2" value="0" 
                                        <?php echo ($wpmsngiopts['include']) ? '' : 'checked="checked"'; ?> type="radio">
                                <?php _e( 'Exclude Following', 'wpmsngi' ) ?>
                            </label>
                            <label>
                                <input name="wpmsngi[include]" id="optionsRadios2" value="1" 
                                        <?php echo ($wpmsngiopts['include']) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Include Following', 'wpmsngi' ) ?>
                            </label>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td>
                            <input type="text" name="wpmsngi[exclude]" value="<?php echo $wpmsngiopts['exclude']?>"/>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td>
                            <small>
                                <?php _e( 'Comma separated list of blog ids you want to exclude/include.', 'wpmsngi' ) ?>
                                <?php _e( 'Select', 'wpmsngi' ) ?> <b><?php _e( 'Exclude Following', 'wpmsngi' ) ?></b> 
                                <?php _e( 'and leave textbox empty if you want to show it on all blogs.', 'wpmsngi' ) ?> 
                                <?php _e( '(0 will insert it in all blogs).', 'wpmsngi' ) ?>
                            </small>
                        </td>
                    </tr>
                    
                    <tr valign="top">
                        <td scope="row" colspan="2"><H1><?php _e( 'Pages Content', 'wpmsngi' ) ?></H1></td>
                    </tr>
                    
                    <tr valign="top">
                        <td scope="row" rowspan="3" style="vertical-align: top;"><?php _e( 'Pages Header Content', 'wpmsngi' ) ?></td>
                    </tr>
                    <tr valign="top">
                        <td>
                            <textarea id="wpmsngitextheader" class="wpmsngitextarea"
                              name="wpmsngi[header]" 
                              placeholder="<?php _e( 'Any text, html or javascript you want to show in the top of your pages', 'wpmsngi' ) ?>"><?php echo $wpmsngiopts['header']?></textarea>
                            <p>&nbsp;</p>
                            <p>
                                <strong>
                                    <?php _e( 'Alignment for the content', 'wpmsngi' ) ?>
                                </strong>
                            </p>
                            <p>
                                <label>
                                <input name="wpmsngi[alignHeader]" id="alignRadios" value="0" 
                                        <?php echo (do_check('0', $wpmsngiopts['alignHeader'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'No alignment', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignHeader]" id="alignRadios" value="1" 
                                        <?php echo (do_check('1', $wpmsngiopts['alignHeader'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Left', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignHeader]" id="alignRadios" value="2" 
                                        <?php echo (do_check('2', $wpmsngiopts['alignHeader'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Center', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignHeader]" id="alignRadios" value="3" 
                                        <?php echo (do_check('3', $wpmsngiopts['alignHeader'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Right', 'wpmsngi' ) ?>
                                </label>
                            </p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td>
                            <small><?php _e( 'This will be displayed in the top of all your pages', 'wpmsngi' ) ?></small>
                        </td>
                    </tr>
                                        
                    <tr valign="top">
                        <td scope="row" rowspan="3" style="vertical-align: top;"><?php _e( 'Pages Footer Content', 'wpmsngi' ) ?></td>
                    
                    </tr>
                    <tr valign="top">
                        <td>
                            <textarea id="wpmsngitextpagesfooter" class="wpmsngitextarea"
                                name="wpmsngi[pagesfooter]" 
                                placeholder="<?php _e( 'Any text, html or javascript you want to show in the bottom of your pages', 'wpmsngi' ) ?>"><?php echo $wpmsngiopts['pagesfooter']?></textarea>
                        
                            <p>&nbsp;</p>
                            <p>
                                <strong>
                                    <?php _e( 'Alignment for the content', 'wpmsngi' ) ?>
                                </strong>
                            </p>
                            <p>
                                <label>
                                <input name="wpmsngi[alignPagesFooter]" id="alignRadios" value="0" 
                                        <?php echo (do_check('0', $wpmsngiopts['alignPagesFooter'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'No alignment', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignPagesFooter]" id="alignRadios" value="1" 
                                        <?php echo (do_check('1', $wpmsngiopts['alignPagesFooter'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Left', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignPagesFooter]" id="alignRadios" value="2" 
                                        <?php echo (do_check('2', $wpmsngiopts['alignPagesFooter'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Center', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignPagesFooter]" id="alignRadios" value="3" 
                                        <?php echo (do_check('3', $wpmsngiopts['alignPagesFooter'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Right', 'wpmsngi' ) ?>
                                </label>
                            </p>
                        
                        </td>
                    </tr>
                    <tr valign="top">
                        <td>
                            <small><?php _e( 'Enter content that will be displayed in the pages footer.', 'wpmsngi' ) ?></small>
                        </td>
                    </tr>
                    
                    <tr valign="top">
                        <td scope="row" colspan="2"><H1><?php _e( 'Posts Content', 'wpmsngi' ) ?></H1></td>
                    </tr>
                      
                    <tr valign="top">
                        <td scope="row" rowspan="3" style="vertical-align: top;"><?php _e( 'Post Header Content', 'wpmsngi' ) ?></td>
                    </tr>
                    <tr valign="top">
                        <td>
                            <textarea id="wpmsngitextpostheader" class="wpmsngitextarea"
                              name="wpmsngi[postheader]" 
                              placeholder="<?php _e( 'Any text, html or javascript you want to show in the top of your posts', 'wpmsngi' ) ?>"><?php echo $wpmsngiopts['postheader']?></textarea>
                        
                             <p>&nbsp;</p>
                            <p>
                                <strong>
                                    <?php _e( 'Alignment for the content', 'wpmsngi' ) ?>
                                </strong>
                            </p>
                            <p>
                                <label>
                                <input name="wpmsngi[alignPostHeader]" id="alignRadios" value="0" 
                                        <?php echo (do_check('0', $wpmsngiopts['alignPostHeader'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'No alignment', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignPostHeader]" id="alignRadios" value="1" 
                                        <?php echo (do_check('1', $wpmsngiopts['alignPostHeader'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Left', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignPostHeader]" id="alignRadios" value="2" 
                                        <?php echo (do_check('2', $wpmsngiopts['alignPostHeader'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Center', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignPostHeader]" id="alignRadios" value="3" 
                                        <?php echo (do_check('3', $wpmsngiopts['alignPostHeader'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Right', 'wpmsngi' ) ?>
                                </label>
                            </p>
                        
                        </td>
                    </tr>
                    <tr valign="top">
                        <td>
                            <small><?php _e( 'Enter content that will be displayed in header of the post.', 'wpmsngi' ) ?></small>
                        </td>
                    </tr> 
                    
                    <tr valign="top">
                        <td scope="row" rowspan="3" style="vertical-align: top;"><?php _e( 'Post center Content', 'wpmsngi' ) ?></td>
                    </tr>
                    <tr valign="top">
                        <td>
                            <textarea id="wpmsngitextpostcenter" class="wpmsngitextarea"
                              name="wpmsngi[postcenter]" 
                              placeholder="<?php _e( 'Any text, html or javascript you want to show in the center of your posts', 'wpmsngi' ) ?>"><?php echo $wpmsngiopts['postcenter']?></textarea>
                        
                            <p>&nbsp;</p>
                            <p>
                                <strong>
                                    <?php _e( 'Alignment for the content', 'wpmsngi' ) ?>
                                </strong>
                            </p>
                            <p>
                                <label>
                                <input name="wpmsngi[alignPostCenter]" id="alignRadios" value="0" 
                                        <?php echo (do_check('0', $wpmsngiopts['alignPostCenter'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'No alignment', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignPostCenter]" id="alignRadios" value="1" 
                                        <?php echo (do_check('1', $wpmsngiopts['alignPostCenter'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Left', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignPostCenter]" id="alignRadios" value="2" 
                                        <?php echo (do_check('2', $wpmsngiopts['alignPostCenter'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Center', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignPostCenter]" id="alignRadios" value="3" 
                                        <?php echo (do_check('3', $wpmsngiopts['alignPostCenter'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Right', 'wpmsngi' ) ?>
                                </label>
                            </p>
                        
                        </td>
                    </tr>
                    <tr valign="top">
                        <td>
                            <small><?php _e( 'Enter content that will be displayed in center of the post. Only if there is a more, it will show right behind it.', 'wpmsngi' ) ?></small>
                        </td>
                    </tr>
                    
                    <tr valign="top">
                        <td scope="row" rowspan="3" style="vertical-align: top;"><?php _e( 'Post footer Content', 'wpmsngi' ) ?></td>
                    </tr>
                    <tr valign="top">
                        <td>
                            <textarea id="wpmsngitextpostfooter" class="wpmsngitextarea"
                              name="wpmsngi[postfooter]" 
                              placeholder="<?php _e( 'Any text, html or javascript you want to show in the bottom of your posts', 'wpmsngi' ) ?>"><?php echo $wpmsngiopts['postfooter']?></textarea>
                        
                            <p>&nbsp;</p>
                            <p>
                                <strong>
                                    <?php _e( 'Alignment for the content', 'wpmsngi' ) ?>
                                </strong>
                            </p>
                            <p>
                                <label>
                                <input name="wpmsngi[alignPostFooter]" id="alignRadios" value="0" 
                                        <?php echo (do_check('0', $wpmsngiopts['alignPostFooter'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'No alignment', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignPostFooter]" id="alignRadios" value="1" 
                                        <?php echo (do_check('1', $wpmsngiopts['alignPostFooter'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Left', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignPostFooter]" id="alignRadios" value="2" 
                                        <?php echo (do_check('2', $wpmsngiopts['alignPostFooter'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Center', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignPostFooter]" id="alignRadios" value="3" 
                                        <?php echo (do_check('3', $wpmsngiopts['alignPostFooter'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Right', 'wpmsngi' ) ?>
                                </label>
                            </p>
                        
                        </td>
                    </tr>
                    <tr valign="top">
                        <td>                    
                            <small><?php _e( 'Enter content that will be displayed in footer of the post.', 'wpmsngi' ) ?></small>
                        </td>
                    </tr>
                    
                    <tr valign="top">
                        <td scope="row" colspan="2"><H1><?php _e( 'Blog Footer Content', 'wpmsngi' ) ?></H1></td>
                    </tr>   
                    <tr valign="top">
                        <td scope="row" rowspan="3" style="vertical-align: top;"><?php _e( 'Footer Content', 'wpmsngi' ) ?></td>
                    </tr>
                    <tr valign="top">
                        <td>
                            <textarea id="wpmsngitextfooter" class="wpmsngitextarea"
                              name="wpmsngi[footer]" 
                              placeholder="<?php _e( 'Any text, html or javascript you want to show in the bottom of your bog.', 'wpmsngi' ); ?>"><?php echo $wpmsngiopts['footer']?></textarea>
                        
                            <p>&nbsp;</p>
                            <p>
                                <strong>
                                    <?php _e( 'Alignment for the content', 'wpmsngi' ) ?>
                                </strong>
                            </p>
                            <p>
                                <label>
                                <input name="wpmsngi[alignFooter]" id="alignRadios" value="0" 
                                        <?php echo (do_check('0', $wpmsngiopts['alignFooter'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'No alignment', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignFooter]" id="alignRadios" value="1" 
                                        <?php echo (do_check('1', $wpmsngiopts['alignFooter'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Left', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignFooter]" id="alignRadios" value="2" 
                                        <?php echo (do_check('2', $wpmsngiopts['alignFooter'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Center', 'wpmsngi' ) ?>
                                </label>
                                <label>
                                <input name="wpmsngi[alignFooter]" id="alignRadios" value="3" 
                                        <?php echo (do_check('3', $wpmsngiopts['alignFooter'])) ? 'checked="checked"' : ''; ?> type="radio">
                                    <?php _e( 'Right', 'wpmsngi' ) ?>
                                </label>
                            </p>
                        
                        </td>
                    </tr>
                    <tr valign="top">
                        <td> 
                            <small><?php _e( 'Enter content that will be displayed in the footer of all posts and pages.', 'wpmsngi' ) ?></small>
                            <p style="color: red">
                                <small><?php _e( 'This will schow right on top of your body tag, you might do not want to insert HTML...', 'wpmsngi' ) ?></small>
                            </p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td colspan="2" class="submit">
                            <input type="submit" class="button-primary" name="wpmsngi[submit]" value="<?php _e('Save Changes') ?>"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div id="infopanel" style="width: 30% !important; min-width: 80px; max-width: 280px; right: 4px; top: 100px; position: fixed; 
             border: dotted; background-color: #f5e79e; border-color: #3278b3; border-width: 1px; padding: 5px; min-height: 500px; z-index: 999;">
            <div style="align: right; height: 30px; border-bottom: double; padding: 4px; border-bottom-color: #3278b3">
                
                <h3>
                    Donation / Spende
                </h3>
            </div>
            <div style="padding-top: 10px;">
                <p>
                    <?php _e( 'If you find this plugin useful, please donate to continue development.', 'wpmsngi' ) ?>
                    <em>Donation USD (5,-) or EUR (5,-)</em>
                </p>
                <p>
                    Visit the <a href="http://ruben-storm.de/projekte/wpms-network-global-inserts/" target="_blank">Project Page</a> on my 
                    <a href="http://ruben-storm.de/projekte/wpms-network-global-inserts/" target="_blank">Homepage</a>. You will find information 
                    on my <a href="http://ruben-storm.de/projekte/wpms-network-global-inserts/" target="_blank">Blog</a>.. (in german)
                </p>
                <p>&nbsp;</p>
                <h3>Deutsch in EUR</h3>
                <p>
                    Spenden Sie EUR 5
                </p>
                <p>
                <form name="_xclick" action="https://www.paypal.com/de/cgi-bin/webscr" method="post" style="max-width: 93%">
                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="business" value="ruben.storm@gmx.de">
                        <input type="hidden" name="item_name" value="Spende WPMS Network Global Inserts">
                        <input type="hidden" name="currency_code" value="EUR">
                        <input type="hidden" name="amount" value="5,00">
                        <input type="image" src="http://www.paypal.com/de_DE/i/btn/x-click-butcc-donate.gif" border="0" name="submit" alt="Zahlen Sie mit PayPal - schnell, kostenlos und sicher!">
                    </form>
                </p>
                <p>&nbsp;</p>
                <h3>English in USD</h3>
                <p>Donate USD 5</p>
                <p>
                    <form name="_xclick" action="https://www.paypal.com/de/cgi-bin/webscr" method="post" style="max-width: 93%">
                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="business" value="ruben.storm@gmx.de">
                        <input type="hidden" name="item_name" value="Donate for WPMS Network Global Inserts">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="amount" value="5,00">
                        <input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-butcc-donate.gif" border="0" name="submit" alt="Zahlen Sie mit PayPal - schnell, kostenlos und sicher!">
                    </form>
                </p>
                
            </div>
        </div>
    </div>
    
    
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