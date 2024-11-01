<?php
/* Plugin Name: WooCommerce Social Buttons
 * Plugin URI: http://www.vivacityinfotech.net 
 * Description: A simple plugin to add most popular social like+share buttons to your Woocommerce store products and you can use shortcode [woocommerce_social_buttons]. 
 * Version: 1.0.3
 * Author: Vivacity Infotech Pvt. Ltd.
 * Author URI: http://www.vivacityinfotech.net
 * Author Email: support@vivacityinfotech.com
 * Text Domain: woocommerce-social-buttons
 * Domain Path: /languages/
 * @package    WooCommerce Social Buttons
 * @since      1.0.0
 * @author     Vivacity Infotech Pvt. Ltd.
 * @copyright  Copyright (c) 2014-2016, Vivacity Infotech Pvt. Ltd.
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 */
/*
  Copyright 2014-2015  Ashley Sheinwald  (email : ashley@planet-interactive.co.uk)
  Copyright 2016  Vivacity Infotech Pvt. Ltd.  (email : info@vivacityinfotech.com)
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
if (!defined('ABSPATH'))
     exit; // Exit if accessed directly

function va_wc_sh__li_reg_like_settings() {

     register_setting('va_wc_share_share_like', 'va_share_like_fb');
     register_setting('va_wc_share_share_like', 'va_share_like_tw');
     register_setting('va_wc_share_share_like', 'va_share_like_gp');
     register_setting('va_wc_share_share_like', 'va_share_like_pi');
     register_setting('va_wc_share_share_like', 'va_share_like_tu');
     register_setting('va_wc_share_share_like', 'va_share_like_li');
     register_setting('va_wc_share_share_like', 'va_share_like_st');
     register_setting('va_wc_share_share_like', 'va_share_like_em');
     register_setting('va_wc_share_share_like', 'va_share_like_format');
     register_setting('va_wc_share_like', 'va_share_prod_detail');
     register_setting('va_wc_share_like', 'va_share_spost_page');
}

if (is_admin()) {
     add_action('admin_init', 'va_wc_sh__li_reg_like_settings');
}

add_option('va_share_like_fb', 'true');
add_option('va_share_like_tw', 'true');
add_option('va_share_like_gp', 'true');
add_option('va_share_like_pi', 'true');
add_option('va_share_like_tu', 'true');
add_option('va_share_like_li', 'true');
add_option('va_share_like_st', 'true');
add_option('va_share_like_em', 'true');
add_option('va_share_like_format', 'button');
add_option('va_share_prod_detail', 'true');
add_option('va_share_spost_page', 'true');

function va_wc_sh__form_code() {
     global $post;
     $social_val = '<div class="woo-social-buttons">';
     if (get_option('va_share_like_format') == 'button') {
          if (get_option('va_share_like_fb') == 'true') {
               $social_val.='<span class="vivawsb_facebook nocount fb-share-button" data-href="' . get_permalink($post->ID) . '" data-layout="button"></span>';
          }
          if (get_option('va_share_like_tw') == 'true') {
               $social_val.='<span class="vivawsb_twitter nocount"><a href="https://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a></span>';
          }
          if (get_option('va_share_like_gp') == 'true') {
               $social_val.='<span class="vivawsb_googleplus nocount"><span class="g-plus" data-action="share" data-annotation="none" data-href="' . get_permalink($post->ID) . '"></span></span>';
          }
          if (get_option('va_share_like_pi') == 'true') {
               $social_val.='<span class="vivawsb_pinterest nocount"><a href="//gb.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-color="red" >
			               <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a><script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script></span>';
          }
          if (get_option('va_share_like_tu') == 'true') {
               $social_val.='<span class="vivawsb_tumblr nocount"><a class="tumblr-share-button" data-color="blue" data-notes="none" href="https://embed.tumblr.com/share"></a></span>';
          }
          if (get_option('va_share_like_li') == 'true') {
               $social_val.='<span class="vivawsb_linkedin nocount"><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share"></script></span>';
          }
          if (get_option('va_share_like_st') == 'true') {
               $social_val.='<span class="vivawsb_stumbleupon nocount"><a href="http://www.stumbleupon.com/submit?url=' . get_permalink($post->ID) . '&amp;title=' . get_the_title($post->ID) . '" target="_blank"><img src="' . plugins_url('images/stumbleupon-button.png', __FILE__) . '" alt="StumbleUpon" /></a></span>';
          }

          if (get_option('va_share_like_em') == 'true') {
               $social_val.='<span class="vivawsb_email nocount"><a href="mailto:?subject=' . get_the_title($post->ID) . '&amp;body=I%20saw%20this%20and%20thought%20of%20you!%20 ' . get_permalink($post->ID) . '"><img src="' . plugins_url('images/email-share-button.png', __FILE__) . '" alt="Email" /></a></span>';
          }
     }
     if (get_option('va_share_like_format') == 'button_count') {
          if (get_option('va_share_like_fb') == 'true') {
               $social_val.='<span class="vivawsb_facebook hcount fb-share-button" data-href="' . get_permalink($post->ID) . '" data-layout="button_count"></span>';
          }
          if (get_option('va_share_like_tw') == 'true') {
               $social_val.='<span class="vivawsb_twitter hcount"><a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a></span>';
          }
          if (get_option('va_share_like_gp') == 'true') {
               $social_val.='<span class="vivawsb_googleplus hcount"><span class="g-plus" data-action="share" data-annotation="bubble" data-href="' . get_permalink($post->ID) . '"></span></span>';
          }
          if (get_option('va_share_like_pi') == 'true') {
               $social_val.='<span class="vivawsb_pinterest hcount"><a href="//gb.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-config="beside" data-pin-color="red" >
			               <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a><script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script></span>';
          }
          if (get_option('va_share_like_tu') == 'true') {
               $social_val.='<span class="vivawsb_tumblr hcount"><a class="tumblr-share-button" data-color="blue" data-notes="right" href="https://embed.tumblr.com/share"></a></span>';
          }
          if (get_option('va_share_like_li') == 'true') {
               $social_val.='<span class="vivawsb_linkedin hcount"><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share" data-counter="right"></script></span>';
          }
          if (get_option('va_share_like_st') == 'true') {
               $social_val.='<span class="vivawsb_stumbleupon hcount"><a href="http://www.stumbleupon.com/submit?url=' . get_permalink($post->ID) . '&amp;title=' . get_the_title($post->ID) . '" target="_blank"><img src="' . plugins_url('images/stumbleupon-button.png', __FILE__) . '" alt="StumbleUpon" /></a></span>';
          }

          if (get_option('va_share_like_em') == 'true') {
               $social_val.='<span class="vivawsb_email hcount"><a href="mailto:?subject=' . get_the_title($post->ID) . '&amp;body=I%20saw%20this%20and%20thought%20of%20you!%20 ' . get_permalink($post->ID) . '"><img src="' . plugins_url('images/email-share-button.png', __FILE__) . '" alt="Email" /></a></span>';
          }
     }
     $social_val.='<div style="clear:both"></div></div>';
     echo $social_val;
}

function va_wc_sh__form_short_code() {
     global $post;
     $social_val = '<div class="woo-social-buttons">';
     if (get_option('va_share_like_format') == 'button') {
          if (get_option('va_share_like_fb') == 'true') {
               $social_val.='<span class="vivawsb_facebook nocount fb-share-button" data-href="' . get_permalink($post->ID) . '" data-layout="button"></span>';
          }
          if (get_option('va_share_like_tw') == 'true') {
               $social_val.='<span class="vivawsb_twitter nocount"><a href="https://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a></span>';
          }
          if (get_option('va_share_like_gp') == 'true') {
               $social_val.='<span class="vivawsb_googleplus nocount"><span class="g-plus" data-action="share" data-annotation="none" data-href="' . get_permalink($post->ID) . '"></span></span>';
          }
          if (get_option('va_share_like_pi') == 'true') {
               $social_val.='<span class="vivawsb_pinterest nocount"><a href="//gb.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-color="red" >
			               <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a><script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script></span>';
          }
          if (get_option('va_share_like_tu') == 'true') {
               $social_val.='<span class="vivawsb_tumblr nocount"><a class="tumblr-share-button" data-color="blue" data-notes="none" href="https://embed.tumblr.com/share"></a></span>';
          }
          if (get_option('va_share_like_li') == 'true') {
               $social_val.='<span class="vivawsb_linkedin nocount"><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share"></script></span>';
          }
          if (get_option('va_share_like_st') == 'true') {
               $social_val.='<span class="vivawsb_stumbleupon nocount"><a href="http://www.stumbleupon.com/submit?url=' . get_permalink($post->ID) . '&amp;title=' . get_the_title($post->ID) . '" target="_blank"><img src="' . plugins_url('images/stumbleupon-button.png', __FILE__) . '" alt="StumbleUpon" /></a></span>';
          }

          if (get_option('va_share_like_em') == 'true') {
               $social_val.='<span class="vivawsb_email nocount"><a href="mailto:?subject=' . get_the_title($post->ID) . '&amp;body=I%20saw%20this%20and%20thought%20of%20you!%20 ' . get_permalink($post->ID) . '"><img src="' . plugins_url('images/email-share-button.png', __FILE__) . '" alt="Email" /></a></span>';
          }
     }
     if (get_option('va_share_like_format') == 'button_count') {
          if (get_option('va_share_like_fb') == 'true') {
               $social_val.='<span class="vivawsb_facebook hcount fb-share-button" data-href="' . get_permalink($post->ID) . '" data-layout="button_count"></span>';
          }
          if (get_option('va_share_like_tw') == 'true') {
               $social_val.='<span class="vivawsb_twitter hcount"><a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a></span>';
          }
          if (get_option('va_share_like_gp') == 'true') {
               $social_val.='<span class="vivawsb_googleplus hcount"><span class="g-plus" data-action="share" data-annotation="bubble" data-href="' . get_permalink($post->ID) . '"></span></span>';
          }
          if (get_option('va_share_like_pi') == 'true') {
               $social_val.='<span class="vivawsb_pinterest hcount"><a href="//gb.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-config="beside" data-pin-color="red" >
			               <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a><script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script></span>';
          }
          if (get_option('va_share_like_tu') == 'true') {
               $social_val.='<span class="vivawsb_tumblr hcount"><a class="tumblr-share-button" data-color="blue" data-notes="right" href="https://embed.tumblr.com/share"></a></span>';
          }
          if (get_option('va_share_like_li') == 'true') {
               $social_val.='<span class="vivawsb_linkedin hcount"><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share" data-counter="right"></script></span>';
          }
          if (get_option('va_share_like_st') == 'true') {
               $social_val.='<span class="vivawsb_stumbleupon hcount"><a href="http://www.stumbleupon.com/submit?url=' . get_permalink($post->ID) . '&amp;title=' . get_the_title($post->ID) . '" target="_blank"><img src="' . plugins_url('images/stumbleupon-button.png', __FILE__) . '" alt="StumbleUpon" /></a></span>';
          }

          if (get_option('va_share_like_em') == 'true') {
               $social_val.='<span class="vivawsb_email hcount"><a href="mailto:?subject=' . get_the_title($post->ID) . '&amp;body=I%20saw%20this%20and%20thought%20of%20you!%20 ' . get_permalink($post->ID) . '"><img src="' . plugins_url('images/email-share-button.png', __FILE__) . '" alt="Email" /></a></span>';
          }
     }
     $social_val.='<div style="clear:both"></div></div>';
     return $social_val;
}

function va_wc_sh__woocommerce_social_buttons_page($content) {
     global $post;
     $social_val = '<div class="woo-social-buttons">';
     if (get_option('va_share_like_format') == 'button') {
          if (get_option('va_share_like_fb') == 'true') {
               $social_val.='<span class="vivawsb_facebook nocount fb-share-button" data-href="' . get_permalink($post->ID) . '" data-layout="button"></span>';
          }
          if (get_option('va_share_like_tw') == 'true') {
               $social_val.='<span class="vivawsb_twitter nocount"><a href="https://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a></span>';
          }
          if (get_option('va_share_like_gp') == 'true') {
               $social_val.='<span class="vivawsb_googleplus nocount"><span class="g-plus" data-action="share" data-annotation="none" data-href="' . get_permalink($post->ID) . '"></span></span>';
          }
          if (get_option('va_share_like_pi') == 'true') {
               $social_val.='<span class="vivawsb_pinterest nocount"><a href="//gb.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-color="red" >
			               <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a><script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script></span>';
          }
          if (get_option('va_share_like_tu') == 'true') {
               $social_val.='<span class="vivawsb_tumblr nocount"><a class="tumblr-share-button" data-color="blue" data-notes="none" href="https://embed.tumblr.com/share"></a></span>';
          }
          if (get_option('va_share_like_li') == 'true') {
               $social_val.='<span class="vivawsb_linkedin nocount"><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share"></script></span>';
          }
          if (get_option('va_share_like_st') == 'true') {
               $social_val.='<span class="vivawsb_stumbleupon nocount"><a href="http://www.stumbleupon.com/submit?url=' . get_permalink($post->ID) . '&amp;title=' . get_the_title($post->ID) . '" target="_blank"><img src="' . plugins_url('images/stumbleupon-button.png', __FILE__) . '" alt="StumbleUpon" /></a></span>';
          }

          if (get_option('va_share_like_em') == 'true') {
               $social_val.='<span class="vivawsb_email nocount"><a href="mailto:?subject=' . get_the_title($post->ID) . '&amp;body=I%20saw%20this%20and%20thought%20of%20you!%20 ' . get_permalink($post->ID) . '"><img src="' . plugins_url('images/email-share-button.png', __FILE__) . '" alt="Email" /></a></span>';
          }
     }
     if (get_option('va_share_like_format') == 'button_count') {
          if (get_option('va_share_like_fb') == 'true') {
               $social_val.='<span class="vivawsb_facebook hcount fb-share-button" data-href="' . get_permalink($post->ID) . '" data-layout="button_count"></span>';
          }
          if (get_option('va_share_like_tw') == 'true') {
               $social_val.='<span class="vivawsb_twitter hcount"><a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a></span>';
          }
          if (get_option('va_share_like_gp') == 'true') {
               $social_val.='<span class="vivawsb_googleplus hcount"><span class="g-plus" data-action="share" data-annotation="bubble" data-href="' . get_permalink($post->ID) . '"></span></span>';
          }
          if (get_option('va_share_like_pi') == 'true') {
               $social_val.='<span class="vivawsb_pinterest hcount"><a href="//gb.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-config="beside" data-pin-color="red" >
			               <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a><script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script></span>';
          }
          if (get_option('va_share_like_tu') == 'true') {
               $social_val.='<span class="vivawsb_tumblr hcount"><a class="tumblr-share-button" data-color="blue" data-notes="right" href="https://embed.tumblr.com/share"></a></span>';
          }
          if (get_option('va_share_like_li') == 'true') {
               $social_val.='<span class="vivawsb_linkedin hcount"><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share" data-counter="right"></script></span>';
          }
          if (get_option('va_share_like_st') == 'true') {
               $social_val.='<span class="vivawsb_stumbleupon hcount"><a href="http://www.stumbleupon.com/submit?url=' . get_permalink($post->ID) . '&amp;title=' . get_the_title($post->ID) . '" target="_blank"><img src="' . plugins_url('images/stumbleupon-button.png', __FILE__) . '" alt="StumbleUpon" /></a></span>';
          }

          if (get_option('va_share_like_em') == 'true') {
               $social_val.='<span class="vivawsb_email hcount"><a href="mailto:?subject=' . get_the_title($post->ID) . '&amp;body=I%20saw%20this%20and%20thought%20of%20you!%20 ' . get_permalink($post->ID) . '"><img src="' . plugins_url('images/email-share-button.png', __FILE__) . '" alt="Email" /></a></span>';
          }
     }
     $social_val.='<div style="clear:both"></div></div>';

     if (is_singular('post')) {

          $content = $content . $social_val;
     }
     return $content;
}

if (get_option('va_share_spost_page') == 'true') {
     add_filter('the_content', 'va_wc_sh__woocommerce_social_buttons_page');
}
add_shortcode('woocommerce_social_buttons', 'va_wc_sh__form_short_code');
if (get_option('va_share_prod_detail') == 'true') {
     add_action('woocommerce_single_product_summary', 'va_wc_sh__form_code', 31);
}
add_action('admin_menu', 'va_wc_sh__social_menu');

function va_wc_sh__social_menu() {
     add_menu_page('Woocommerce Social Page', 'Share Panel', 'manage_options', 'Woocommerce-social-plugin', 'va_wc_sh__social_init', plugins_url('/images/fb_16.png', __FILE__));
}

function va_wc_sh__social_init() {
     $submited = 0;
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Submit'])) {

          $vivawsb_fb = sanitize_text_field($_REQUEST['vivawsb_fb']);
          $vivawsb_tw = sanitize_text_field($_REQUEST['vivawsb_tw']);
          $vivawsb_gp = sanitize_text_field($_REQUEST['vivawsb_gp']);
          $vivawsb_pi = sanitize_text_field($_REQUEST['vivawsb_pi']);
          $vivawsb_tu = sanitize_text_field($_REQUEST['vivawsb_tu']);
          $vivawsb_li = sanitize_text_field($_REQUEST['vivawsb_li']);
          $vivawsb_st = sanitize_text_field($_REQUEST['vivawsb_st']);
          $share_prod_detail = sanitize_text_field($_REQUEST['share_prod_detail']);
          $share_spostpage = sanitize_text_field($_REQUEST['share_spost_page']);

          $vivawsb_em = sanitize_text_field($_REQUEST['vivawsb_em']);
          $vivawsb_format = sanitize_text_field($_REQUEST['vivawsb_format']);

          update_option('va_share_like_fb', $vivawsb_fb);
          update_option('va_share_like_tw', $vivawsb_tw);
          update_option('va_share_like_gp', $vivawsb_gp);
          update_option('va_share_like_pi', $vivawsb_pi);
          update_option('va_share_like_tu', $vivawsb_tu);
          update_option('va_share_like_li', $vivawsb_li);
          update_option('va_share_like_st', $vivawsb_st);
          update_option('va_share_like_em', $vivawsb_em);
          update_option('va_share_like_format', $vivawsb_format);
          update_option('va_share_prod_detail', $share_prod_detail);
          update_option('va_share_spost_page', $share_spostpage);
          $submited = 1;
     }
     ?>

     <?php echo settings_errors(); ?>
     <div>   
          <h2 class="vivawsb_pluginheader"><?php _e("woocommerce-social-buttons - Settings", "woocommerce-social-buttons"); ?></h2>
          <?php if (isset($submited) && $submited == 1) { ?>
               <div id="setting-error-settings_updated" class="updated settings-error"> 
                    <p><strong><?php _e("Your settings have been saved.", "woocommerce-social-buttons"); ?></strong></p></div>
          <?php } ?>
          <div class="inner_wrap">
               <div class="left container_div" >


                    <form name="social" method="post" >   

                         <div class="headingclass" >   <?php _e("<p>By default the plugin adds social share buttons to your woocommerce single products  page.</p>
        <p> A shortcode you can use in posts, pages, products and custom Post etc.. [woocommerce_social_buttons]</p>
        <p class='p_content_bold'> &lt;?php echo do_shortcode( '[woocommerce_social_buttons]' ); ?></p>", "woocommerce_social_buttons"); ?></div>
                         <table class="vivawsb_form" >
                              <tr><th><h3 class="vivawsb_optionheader"><?php _e("Setting Panel", "woocommerce-social-buttons"); ?></h3><p class="p_content_left">(This social button will display on frontend and you can manage from here.)</p></th></tr>
                              <tr valign="top">
                                   <td><fieldset>
                                             <label><input type="checkbox" name="vivawsb_fb" value="true" <?php echo (get_option('va_share_like_fb') == 'true' ? 'checked' : ''); ?>  /><span style="padding-left: 5px;font-weight: bold;"><?php _e('Facbook', 'woocommerce-social-buttons'); ?></span></label>
                                             <br/>
                                             <label> <input type="checkbox" name="vivawsb_tw" value="true" <?php echo (get_option('va_share_like_tw') == 'true' ? 'checked' : ''); ?>  ><span style="padding-left: 5px;font-weight: bold;"><?php _e('Twitter', 'woocommerce-social-buttons'); ?></span></label>
                                             <br/>
                                             <label><input type="checkbox" name="vivawsb_gp" value="true" <?php echo (get_option('va_share_like_gp') == 'true' ? 'checked' : ''); ?>   /><span style="padding-left: 5px;font-weight: bold;"><?php _e('Google Plus', 'woocommerce-social-buttons'); ?></span></label>
                                             <br/>
                                             <label> <input type="checkbox" name="vivawsb_pi" value="true" <?php echo (get_option('va_share_like_pi') == 'true' ? 'checked' : ''); ?>  ><span style="padding-left: 5px;font-weight: bold;"><?php _e('Pinterest', 'woocommerce-social-buttons'); ?></span></label>
                                             <br/>
                                             <label> <input type="checkbox" name="vivawsb_tu" value="true" <?php echo (get_option('va_share_like_tu') == 'true' ? 'checked' : ''); ?>  ><span style="padding-left: 5px;font-weight: bold;"><?php _e('Tumblr', 'woocommerce-social-buttons'); ?></span></label>
                                             <br/>
                                             <label> <input type="checkbox" name="vivawsb_li"  value="true" <?php echo (get_option('va_share_like_li') == 'true' ? 'checked' : ''); ?>  /><span style="padding-left: 5px;font-weight: bold;"><?php _e('Linkedin', 'woocommerce-social-buttons'); ?></span></label>
                                             <br/>
                                             <label> <input type="checkbox" name="vivawsb_st" value="true" <?php echo (get_option('va_share_like_st') == 'true' ? 'checked' : ''); ?>  ><span style="padding-left: 5px;font-weight: bold;"><?php _e('StumbleUpon', 'woocommerce-social-buttons'); ?></span></label>
                                             <br/>

                                             <label> <input type="checkbox" name="vivawsb_em" value="true" <?php echo (get_option('va_share_like_em') == 'true' ? 'checked' : ''); ?>  ><span style="padding-left: 5px;font-weight: bold;"><?php _e('Email', 'woocommerce-social-buttons'); ?></span></label>
                                        </fieldset></td>
                              </tr>
                              <tr><th><h3 class="vivawsb_optionheader" ><?php _e("Setting Panel", "woocommerce-social-buttons"); ?></h3><p class="p_content_left">(for normal share button or with counter )</p></th></tr>  
                              <tr valign="top">
                                   <td><fieldset>
                                             <img src="<? echo plugins_url( 'images/option.png', __FILE__ );?>" alt="Format Options"/><br/>
                                             <label><input type="radio" name="vivawsb_format" value="button" <?php echo (get_option('va_share_like_format') == 'button' ? 'checked' : ''); ?> /> <span style="padding-left: 5px;font-weight: bold;"><?php _e('Button', 'woocommerce-social-buttons'); ?></span></label>
                                             <br/>
                                             <label><input type="radio" name="vivawsb_format" value="button_count" <?php echo (get_option('va_share_like_format') == 'button_count' ? 'checked' : ''); ?> /><span style="padding-left: 5px;font-weight: bold;"> <?php _e('Button with counter', 'woocommerce-social-buttons'); ?></span></label>

                                        </fieldset>


                                   </td>
                              </tr>
                              <tr><th><h3 class="vivawsb_optionheader"><?php _e("Position Settings Panel", "woocommerce-social-buttons"); ?></h3></th></tr>
                              <tr><th scope="row">
                              <h3 class="form_table_tr_th" >
                                   <?php _e("", "woocommerce-social-buttons"); ?></h3></th></tr>
                              <tr valign="top">
                                   <td><fieldset>
                                             <label><input type="checkbox" name="share_spost_page" value="true"  <?php echo (get_option('va_share_spost_page') == 'true' ? 'checked' : ''); ?> /> <span style="padding-left: 5px;font-weight: bold;"><?php _e('Show on Post', 'woocommerce-social-buttons'); ?></span></label>
                                             <br>
                                             <label> <input type="checkbox" name="share_prod_detail" value="true" <?php echo (get_option('va_share_prod_detail') == 'true' ? 'checked' : ''); ?> /><span style="padding-left: 5px;font-weight: bold;"><?php _e('Show on Product Details Page', 'woocommerce-social-buttons'); ?></span></label>

                                        </fieldset></td>
                              </tr>
                         </table>


                         <input type="hidden" name="action" value="update" />
                         <div  class="submitform">
                              <input type="submit" name="Submit" class="button1" value="Save Changes">
                         </div>       
                    </form>
               </div>

               <div class="right">
                    <center>
                         <div class="bottom">
                              <h3 id="download-comments-wvpd" class="title"><?php _e('Download Free Plugins', 'wvpd'); ?></h3>

                              <div id="downloadtbl-comments-wvpd" class="togglediv">  
                                   <h3 class="company">
                                        <p class='p_content_left_info'> Vivacity InfoTech Pvt. Ltd. is an ISO 9001:2008 Certified Company is a Global IT Services company with expertise in outsourced product development and custom software development with focusing on software development, IT consulting, customized development.We have 200+ satisfied clients worldwide.</p>	
                                        <?php _e('Our Top 5 Latest Plugins', 'wvpd'); ?>:
                                   </h3>
                                   <ul class="social_link_ul">
                                        <li><a target="_blank" href="https://wordpress.org/plugins/woocommerce-social-buttons/">Woocommerce Social Buttons</a></li>
                                        <li><a target="_blank" href="https://wordpress.org/plugins/vi-random-posts-widget/">Vi Random Post Widget</a></li>
                                        <li><a target="_blank" href="http://wordpress.org/plugins/wp-infinite-scroll-posts/">WP EasyScroll Posts</a></li>
                                        <li><a target="_blank" href="https://wordpress.org/plugins/buddypress-social-icons/">BuddyPress Social Icons</a></li>
                                        <li><a target="_blank" href="http://wordpress.org/plugins/wp-fb-share-like-button/">WP Facebook Like Button</a></li>
                                   </ul>
                              </div> 
                         </div>		
                         <div class="bottom">
                              <h3 id="donatehere-comments-wvpd" class="title"><?php _e('Donate Here', 'wvpd'); ?></h3>
                              <div id="donateheretbl-comments-wvpd" class="togglediv">  
                                   <p class="p_content_left"><?php _e('If you want to donate , please click on below image.>', 'wvpd'); ?></p>
                                   <a href="http://vivacityinfotech.net/paypal-donation/" target="_blank"><img class="donate" src="<?php echo plugins_url('assets/paypal.gif', __FILE__); ?>" width="150" height="50" title="<?php _e('Donate Here', 'wvpd'); ?>"></a>		
                              </div> 
                         </div>	
                         <div class="bottom">
                              <h3 id="donatehere-comments-wvpd" class="title"><?php _e('Woocommerce Frontend Plugin', 'wvpd'); ?></h3>
                              <div id="donateheretbl-comments-wvpd" class="togglediv">  
                                   <p class="p_content_left"><?php _e('If you want to purchase , please click on below image.', 'wvpd'); ?></p>
                                   <a href="http://bit.ly/1HZGRBg" target="_blank"><img class="donate" src="<?php echo plugins_url('assets/woo_frontend_banner.png', __FILE__); ?>" width="336" height="280" title="<?php _e('Donate Here', 'wvpd'); ?>"></a>		
                              </div> 
                         </div>
                         <div class="bottom">
                              <h3 id="donatehere-comments-wvpd" class="title"><?php _e('Blue Frog Template', 'wvpd'); ?></h3>
                              <div id="donateheretbl-comments-wvpd" class="togglediv">  
                                   <p class="p_content_left"><?php _e('If you want to purchase , please click on below image.', 'wvpd'); ?></p>
                                   <a href="http://bit.ly/1Gwp4Vv" target="_blank"><img class="donate" src="<?php echo plugins_url('assets/blue_frog_banner.png', __FILE__); ?>" width="336" height="280" title="<?php _e('Donate Here', 'wvpd'); ?>"></a>		
                              </div> 
                         </div>
                    </center>


               </div>
          </div>
     </div>
     <?php
}

function va_wc_sh__my_enqueue_js() {
     wp_enqueue_script('viva_sw_script',plugins_url('/vivawsb_script.js', __FILE__), array(), '1.0.0', true);
     wp_enqueue_style('va_wc_sh-stylesheet-style',plugins_url('/css/style_f.css', __FILE__));
}

add_action('wp_enqueue_scripts', 'va_wc_sh__my_enqueue_js');

function va_wc_sh__my_enqueue_style() {

     wp_enqueue_style('va_wc_sh-stylesheet-style',plugins_url('/css/style_a.css', __FILE__));
}

add_action('admin_enqueue_scripts', 'va_wc_sh__my_enqueue_style');
?>
