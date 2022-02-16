<?php
add_action('admin_menu', 'ch_essentials_admin');
function ch_essentials_admin() {
    // Header Option
	register_setting('zang-settings-header', 'phone');
	register_setting('zang-settings-header', 'email_header');
	// Social Option
	register_setting('zang-settings-socials', 'footer_fb');
	register_setting('zang-settings-socials', 'footer_twitter');
	register_setting('zang-settings-socials', 'footer_email');
	register_setting('zang-settings-socials', 'footer_pinterest');
	register_setting('zang-settings-socials', 'footer_linkedin');
	/* Base Menu */
	add_menu_page('Theme Option','Quin Framework','manage_options','template_admin_zang','zang_theme_create_page',get_template_directory_uri() . '/images/favico-framework.png',110);
}
add_action('admin_init', 'zang_custom_settings');
function zang_custom_settings() { 

	/* Header Options Section */
	add_settings_section('zang-header-options', 'Chỉnh sửa header','zang_header_options_callback','zang-settings-header' );
	add_settings_field('address-hd','Số điện thoại', 'zang_phone_header','zang-settings-header', 'zang-header-options');
	add_settings_field('email-hd','Email', 'zang_email_header','zang-settings-header', 'zang-header-options');

	/* Social Options Section */
	add_settings_section('zang-social-options','Chỉnh sửa social','zang_social_options_callback','zang-settings-socials' );
	add_settings_field('facebook','Facebook Link', 'zang_footer_fb','zang-settings-socials', 'zang-social-options');
	add_settings_field('twitter','Twitter Link', 'zang_footer_twitter','zang-settings-socials', 'zang-social-options');
	add_settings_field('email','Email Link', 'zang_footer_email','zang-settings-socials', 'zang-social-options');
	add_settings_field('pinterest','Pinterest Link', 'zang_footer_pinterest','zang-settings-socials', 'zang-social-options');
	add_settings_field('linkedin','Linkedin Link', 'zang_footer_linkedin','zang-settings-socials', 'zang-social-options');
}

function zang_header_options_callback(){
	echo '';
}

function zang_social_options_callback(){
	echo '';
}

function zang_commit_options_callback(){
	echo '';
}

function zang_phone_header(){
	$phone = esc_attr(get_option('phone'));
	echo '<input type="text" class="iptext_adm" name="phone" value="'.$phone.'" >';
}
function zang_email_header(){
	$email_header = esc_attr(get_option('email_header'));
	echo '<input type="text" class="iptext_adm" name="email_header" value="'.$email_header.'" placeholder="" ';
}
function zang_footer_fb(){
	$footer_fb = esc_attr(get_option('footer_fb'));
	echo '<input type="text" class="iptext_adm" name="footer_fb" value="'.$footer_fb.'" placeholder="" ';
}
function zang_footer_twitter(){
	$footer_twitter = esc_attr(get_option('footer_twitter'));
	echo '<input type="text" class="iptext_adm" name="footer_twitter" value="'.$footer_twitter.'" placeholder="" ';
}
function zang_footer_email(){
	$footer_email = esc_attr(get_option('footer_email'));
	echo '<input type="text" class="iptext_adm" name="footer_email" value="'.$footer_email.'" placeholder="" ';
}
function zang_footer_pinterest(){
	$footer_pinterest = esc_attr(get_option('footer_pinterest'));
	echo '<input type="text" class="iptext_adm" name="footer_pinterest" value="'.$footer_pinterest.'" placeholder="" ';
}
function zang_footer_linkedin(){
	$footer_linkedin = esc_attr(get_option('footer_linkedin'));
	echo '<input type="text" class="iptext_adm" name="footer_linkedin" value="'.$footer_linkedin.'" placeholder="" ';
}

function myshortcode(){
	ob_start();
	if(get_option('footer_fb') || get_option('footer_twitter') || get_option('footer_email') || get_option('footer_pinterest') || get_option('footer_linkedin')){
		?>
		<ul class="social_ft">
			<?php if(get_option('footer_fb')){ ?>
				<li><a href="<?php echo get_option('footer_fb'); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-html="true" target="_blank" data-placement="top" title="" data-original-title="Share on Facebook"></i></a></li>
			<?php }?>
			<?php if(get_option('footer_twitter')){ ?>
				<li><a href="<?php echo get_option('footer_twitter'); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			<?php }?>
			<?php if(get_option('footer_email')){ ?>
				<li><a href="<?php echo get_option('footer_email'); ?>" target="_blank"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
			<?php }?>
			<?php if(get_option('footer_pinterest')){ ?>
				<li><a href="<?php echo get_option('footer_pinterest'); ?>" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
			<?php }?>
						<?php if(get_option('footer_linkedin')){ ?>
				<li><a href="<?php echo get_option('footer_linkedin'); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
			<?php }?>
		</ul>	
		<?php
	}
	return ob_get_clean();
}
add_shortcode('social_ft','myshortcode');



/* Display Page
-----------------------------------------------------------------*/
function zang_theme_create_page() {
	?>
	<div class="wrap">  
		<?php settings_errors(); ?>  

		<?php  
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'header_page_options';  
		?>  

		<ul class="nav-tab-wrapper"> 
			<li><a href="?page=template_admin_zang&tab=header_page_options" class="nav-tab <?php echo $active_tab == 'header_page_options' ? 'nav-tab-active' : ''; ?>">Header</a> </li>
			<li><a href="?page=template_admin_zang&tab=social_page_options" class="nav-tab <?php echo $active_tab == 'social_page_options' ? 'nav-tab-active' : ''; ?>">Social Footer</a></li>	
		</ul>  

		<form method="post" action="options.php">  
			<?php 
			if( $active_tab == 'header_page_options' ) {  
				settings_fields( 'zang-settings-header' );
				do_settings_sections( 'zang-settings-header' ); 
			} else if( $active_tab == 'social_page_options' ) {
				settings_fields( 'zang-settings-socials' );
				do_settings_sections( 'zang-settings-socials' ); 
			}
			else if( $active_tab == 'commit_page_options' ) {
				settings_fields( 'zang-settings-commit' );
				do_settings_sections( 'zang-settings-commit' ); 
			}
			?>             
			<?php submit_button(); ?>  
		</form> 

	</div> 

	<?php
}

