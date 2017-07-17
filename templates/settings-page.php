<?php global $wpe_data, $wpe_pro, $wpe_premium_link;
//pree($opts);
?>

<div class="wrap">

	<div class="wpes-container">

		<div class="wpes-column wpes-primary">

			<h2>WP Easy Sharing <?php echo '('.$wpe_data['Version'].($wpe_pro?') Pro':')'); ?> - Settings</h2>

			<form id="ES_settings" method="post">

			<?php settings_fields( 'wpe_sharing' ); ?>

			<table class="form-table">

				<tr valign="top">

					<th scope="row">

						<label><?php _e('Active platforms','wp-easy-sharing');?></label>

					</th>

					<td>

<ul>

<li>
						<input type="checkbox" id="facebook_share" name="wpe_sharing[social_options][]" value="facebook" <?php checked( in_array( 'facebook', $opts['social_options'] ), true ); ?> /><label for="facebook_share"><?php echo _e('Facebook','wp-easy-sharing')?></label><input type="text" name="wpe_sharing[social_me][facebook]" value="<?php echo (isset($opts['social_me']['facebook'])?$opts['social_me']['facebook']:''); ?>" placeholder="Your Facebook Page URL" />
</li>

<li>



						<input type="checkbox" id="twitter_share" name="wpe_sharing[social_options][]" value="twitter" <?php checked( in_array( 'twitter', $opts['social_options'] ), true ); ?> /><label for="twitter_share"><?php echo _e('Twitter','wp-easy-sharing')?></label><input type="text" name="wpe_sharing[social_me][twitter]" value="<?php echo (isset($opts['social_me']['twitter'])?$opts['social_me']['twitter']:''); ?>" placeholder="Your Twitter Profile Link" />
</li>                        

<li>
						<input type="checkbox" id="googleplus_share" name="wpe_sharing[social_options][]" value="googleplus" <?php checked( in_array( 'googleplus', $opts['social_options'] ), true ); ?> /><label for="googleplus_share"><?php echo _e('Google Plus','wp-easy-sharing')?></label><input type="text" name="wpe_sharing[social_me][googleplus]" value="<?php echo (isset($opts['social_me']['googleplus'])?$opts['social_me']['googleplus']:''); ?>" placeholder="Your Google+ Profile URL" />
</li>                        
<li>
						<input type="checkbox" id="linkedin_share" name="wpe_sharing[social_options][]" value="linkedin" <?php checked( in_array( 'linkedin', $opts['social_options'] ), true ); ?> /><label for="linkedin_share"><?php echo _e('Linkedin','wp-easy-sharing')?></label><input type="text" name="wpe_sharing[social_me][linkedin]" value="<?php echo (isset($opts['social_me']['linkedin'])?$opts['social_me']['linkedin']:''); ?>" placeholder="Your Linked In Profile Link" />
</li>

<li>
						<input type="checkbox" id="pinterest_share" name="wpe_sharing[social_options][]" value="pinterest" <?php checked( in_array( 'pinterest', $opts['social_options'] ), true ); ?> /><label for="pinterest_share"><?php echo _e('Pinterest','wp-easy-sharing')?></label><input type="text" name="wpe_sharing[social_me][pinterest]" value="<?php echo (isset($opts['social_me']['pinterest'])?$opts['social_me']['pinterest']:''); ?>" placeholder="Your Pinterest Profile Link" />
                        
</li>                        

<li>
						<input type="checkbox" id="youtube_share" name="wpe_sharing[social_options][]" value="youtube" <?php checked( in_array( 'youtube', $opts['social_options'] ), true ); ?> /><label for="youtube_share"><?php echo _e('Youtube','wp-easy-sharing')?></label><input type="text" name="wpe_sharing[social_me][youtube]" value="<?php echo (isset($opts['social_me']['youtube'])?$opts['social_me']['youtube']:''); ?>" placeholder="Your Youtube Channel Link" />
                        
</li>  

<li>

                        <input type="checkbox" id="tutorsloop_share" name="wpe_sharing[social_options][]" value="tutorsloop" <?php checked( in_array( 'tutorsloop', $opts['social_options'] ), true ); ?> /><label for="tutorsloop_share"><?php echo _e('Tutorsloop','wp-easy-sharing')?></label><input type="text" name="wpe_sharing[social_me][tutorsloop]" value="<?php echo (isset($opts['social_me']['tutorsloop'])?$opts['social_me']['tutorsloop']:''); ?>" placeholder="Your Tutorsloop Profile Link" />
</li>
</ul>
					</td>

				</tr>

				<tr valign="top">

					<th>Active order</th>

					<td>

						<div class="dndicon">

							<?php $s_order=get_option('wes_wpe_sharing');

								  //pree($s_order);

								  if(empty($s_order)) $s_order=WPES_DEFAULT_ORDER;

								  $io=explode(',',rtrim($s_order,','));

							foreach ($io as $i){

								switch($i){

									case 'f':

										echo '<div class="s-icon facebook-icon" id="f"></div>';				

										break;

									case 'g':

										echo '<div class="s-icon googleplus-icon" id="g"></div>';

										break;

									case 't':

										echo '<div class="s-icon twitter-icon" id="t"></div>';

										break;

									case 'l':

										echo '<div class="s-icon linkedin-icon" id="l"></div>';	

										break;

									case 'p':

										echo '<div class="s-icon pinterest-icon" id="p"></div>';

										break;

									case 'tl':

										echo '<div class="s-icon tutorsloop-icon" id="tl"></div>';

										break;

										

								}

							}?>

						</div>

					<br /><small><?php _e('Drag the social icon to change the order.', 'wp-easy-sharing'); ?></small>

					</td>

				</tr>

				<tr valign="top">

					<th valign="top"><label for="alws_show_icons"><?php _e('Active Type','wp-easy-sharing');?></label></th>

					<td>

						<input type="radio" id="alws_show_icons" name="wpe_sharing[show_icons]" value="1" <?php checked(  '1', $opts['show_icons'], true ); ?> /><label for="alws_show_icons"><?php echo _e('Icons','wp-easy-sharing')?></label><br />

<input type="radio" id="alws_show_text" name="wpe_sharing[show_icons]" value="0" <?php echo ($opts['show_icons']!=1?'checked="checked"':''); ?> /><label for="alws_show_text"><?php echo _e('Text','wp-easy-sharing')?></label>

                        

					</td>

				</tr>

				<tr>

                <td colspan="2" style="padding:0">

                



                

                

<table id="alws_show_text_tbl" cellpadding="0" cellspacing="0" width="100%" border="0" <?php echo ($opts['show_icons']!=1?'':'style="display:none"'); ?>>

<tr valign="top">

					<th><label for="before_button_text"><?php _e('Text before Sharing buttons','wp-easy-sharing');?></label></th>

					<td>

						<input type="text" class="widefat" name="wpe_sharing[before_button_text]" id="before_button_text" value="<?php echo esc_attr($opts['before_button_text']); ?>" /> 

					</td>

				</tr>

				<tr valign="top">

					<th><label for="facebook_text"><?php _e('Facebook Share button text','wp-easy-sharing');?></label></th>

					<td>

						<input type="text" class="widefat" name="wpe_sharing[facebook_text]" id="facebook_text" value="<?php echo esc_attr($opts['facebook_text']); ?>" /> 

					</td>

				</tr>

				<tr valign="top">

					<th><label for="twitter_text"><?php _e('Twitter Share button text','wp-easy-sharing');?></label></th>

					<td>

						<input type="text" class="widefat" name="wpe_sharing[twitter_text]" id="twitter_text" value="<?php echo esc_attr($opts['twitter_text']); ?>" /> 

					</td>

				</tr>

				<tr valign="top">

					<th><label for="googleplus_text"><?php _e('Google plus share button text','wp-easy-sharing');?></label></th>

					<td>

						<input type="text" name="wpe_sharing[googleplus_text]" id="googleplus_text" class="widefat" value="<?php echo esc_attr($opts['googleplus_text']); ?>" /> 

					</td>

				</tr>

				<tr valign="top">

					<th><label for="linkedin_text"><?php _e('Linkedin share button text','wp-easy-sharing');?></label></th>

					<td>

						<input type="text" name="wpe_sharing[linkedin_text]" id="linkedin_text" class="widefat" value="<?php echo esc_attr($opts['linkedin_text']); ?>" /> 

					</td>

				</tr>

				<tr valign="top">

					<th><label for="pinterest_text"><?php _e('Pinterest share button text','wp-easy-sharing');?></label></th>

					<td>

						<input type="text" name="wpe_sharing[pinterest_text]" id="pinterest_text" class="widefat" value="<?php echo esc_attr($opts['pinterest_text']); ?>" /> 

					</td>

				</tr>

                <tr valign="top">

					<th><label for="tutorsloop_text"><?php _e('Tutorsloop share button text','wp-easy-sharing');?></label></th>

					<td>

						<input type="text" name="wpe_sharing[tutorsloop_text]" id="tutorsloop_text" class="widefat" value="<?php echo esc_attr($opts['tutorsloop_text']); ?>" /> 

					</td>

				</tr>

</table>

                

                </td>

                </tr>

                

				<tr valign="top" class="hide">

					<th><label for="pinterest_image"><?php _e('Default share image','wp-easy-sharing')?></label></th>

					<td>

						<input type="text" name="wpe_sharing[pinterest_image]" id="pinterest_image"  value="<?php echo esc_attr($opts['pinterest_image']); ?>"/><input type="button" class="sc_img button" id="sc_img" value="<?php _e('Upload','wp-easy-sharing')?>" />

						<input type="button" class="button" id="rc_img" value="<?php _e('Remove','wp-easy-sharing')?>" />

						<br /><small><?php _e('Required for Pinterest', 'wp-easy-sharing'); ?></small>

						<div id="sc_img_src"><?php if($opts['pinterest_image'] != ''): ?><img src="<?php echo $opts['pinterest_image'];?>" width="100px" /> <?php endif;?></div>

					</td>

				</tr>

				<tr>

					<th><label><?php _e('Customization','wp-easy-sharing');?></label></th>

					<td>

						<input type="checkbox" name="wpe_sharing[load_esset][]" id="load_icon_css" value="load_css" <?php checked( in_array( 'load_css', $opts['load_esset'] ), true ); ?>><label for="load_icon_css"><?php _e('Use default CSS','wp-easy-sharing');?></label><br />



						<input type="checkbox" name="wpe_sharing[load_esset][]" id="load_popup_js" value="load_js"  <?php checked( in_array( 'load_js', $opts['load_esset'] ), true ); ?>><label for="load_popup_js"><?php _e('Use popups for sharing','wp-easy-sharing') ?></label>

					</td>

				</tr>

				

				<tr valign="top">

					<th scope="row">

						<label><?php _e('Add sharing links to?', 'wp-easy-sharing'); ?></label>

					</th>

					<td>

						<ul>

						<?php foreach( $post_types as $post_type_id => $post_type ) { ?>

							<li>

								<label>

									<input type="checkbox" name="wpe_sharing[auto_add_post_types][]" value="<?php echo esc_attr( $post_type_id ); ?>" <?php checked( in_array( $post_type_id, $opts['auto_add_post_types'] ), true ); ?>> <?php printf( __('%s', 'wp-easy-sharing' ), $post_type->labels->name ); ?>

								</label>

							</li>

						<?php } ?>

						</ul>

						<small><?php _e('Will add the sharing links to the end of the bottom of these post types.', 'wp-easy-sharing'); ?></small>

					</td>

				</tr>

				<tr valign="top">

					<th scope="row">

						<label for="ES_twitter_username"><?php _e('Twitter Profile', 'wp-easy-sharing'); ?></label>

					</th>

					<td>

						<input type="text" name="wpe_sharing[twitter_username]" id="ES_twitter_username" class="widefat" placeholder="wpmechanic" value="<?php echo esc_attr($opts['twitter_username']); ?>">

						<small><?php _e('If you want to append <br />e.g. "via @wpmechanic" to tweets.', 'wp-easy-sharing'); ?></small>

					</td>

				</tr>

			</table>

			<?php

				submit_button();

			?>

		</form>

	</div>



	<div class="wpes-column wpes-secondary">



		

		<div class="wpes-box">

			<h3 class="wpes-title"><?php _e( 'Need Help?', 'wp-easy-sharing' ); ?></h3>

			<p><?php printf( __( 'Post your issue on %splugin support forums%s on WordPress.org.', 'wp-easy-sharing' ), '<a href="https://wordpress.org/support/plugin/wp-easy-sharing" target="_blank">', '</a>' ); ?></p>

		</div>

		<br style="clear:both; " />

        

        

        <div class="wpes-box">

			<h3 class="wpes-title"><?php _e( 'WP Easy Shortcodes', 'wp-easy-sharing' ); ?></h3>

			

            <div>[wpe_sharing]</div>            

			

            <p>Or</p>

            

            <div>[wpe_sharing social_options='facebook,twitter,googleplus,linkedin,pinterest,tutorsloop' twitter_username='wpmechanic' facebook_text='' twitter_text='' googleplus_text='' linkedin_text='' pinterest_text='' tutorsloop_text='' icon_order='f,t,l,g,p,tl' show_icons='0' before_button_text='' social_image='']
            <br />
<br /><br />
OR<br />
<br />

			[wpe_sharing type='sharing']<br />
            <small style="color:#000">For your website pages to share.</small>
<br /><br />
<br />

OR<br />
<br />

			[wpe_sharing type='default']
           <br />
<small style="color:#000">For your social links.</small>
            </div>

            

            <br />



            <h3 class="wpes-title"><?php _e( 'Premium Shortcodes', 'wp-easy-sharing' ); ?> <?php if(!$wpe_pro){ ?> <a style="float:right; font-size:12px; color:#fff; font-weight:bold; text-decoration:none;" href="<?php echo $wpe_premium_link; ?>" target="_blank">Go Premium</a><?php } ?></h3>

			<div>[wpes_wall]</div>

            

            <p>

[wpes_wall] will enable you in the following things:

            	<ol>

                	<li>People can share content on your website like they share on Facebook, Twitter & Google+ etc. and shared content will be displayed on a page with this shortcode.</li>

                    <li>Sharing will work only if you enabled registration from <a href="options-general.php" target="_blank">settings page</a>.<br />

                    Membership = Anyone can register (Ticked)

</li>

					<li>You can control the users that if someone is spamming so simply restrict them from <a href="users.php?page=wp-allow-sharing" target="_blank">user settings</a>.</li>

                    <li>You can ask "WP Easy Sharing Team" to add your website logo as a sharing portal. <a href="https://topprogrammers.wordpress.com/2016/05/14/wp-easy-sharing-affiliation-requirements-checklist/" target="_blank">Click here</a> to check requirements. </li>

                </ol>

            </p>

		</div>

	</div>

</div>

</div>

<script type="text/javascript" language="javascript">

jQuery(document).ready(function($){

	$('#alws_show_icons').click(function(){

		$('#alws_show_text_tbl').hide();

		$('#alws_show_text_tbl').find('input').val('');

	});

	$('#alws_show_text').click(function(){

		$('#alws_show_text_tbl').slideDown();

	});

	

});

</script>

<style type="text/css">

li.current{

	background-color:#9CCF31;

}

#wpcontent{

	border-left:10px solid #9CCF31;

	background-color:#009ECE;

}

#wpcontent h2,

#wpcontent .notice-success,

#wpcontent div.updated{

    background-color: #fff;

    border-left: 10px solid #9ccf31;

    border-radius: 2px;

    color: #009ece;

    font-weight: bold;

    padding: 16px 0 14px 12px;

}



#wpcontent label,

#wpcontent th,

#wpcontent small{

	color:#fff;

}

.button.button-primary{

	background-color:#9CCF31;

	font-size:14px;

	padding:6px 30px;

	height: 40px;

}

.button.button-primary:hover{

	background-color:#95C72C;

}

#wpfooter,.update-nag,#message{

	display:none;

}

</style>

