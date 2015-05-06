<?php 
// create custom plugin settings menu
add_action('admin_menu', 'wpgw_create_menu');

function wpgw_create_menu(){

	//create new submenu
	add_submenu_page('themes.php', 'Website Settings', 'Website Settings', 'administrator', __FILE__, 'wpgw_settings_page');

	//call register settings function
	add_action('admin_init', 'wpgw_register_settings');
}

function wpgw_register_settings(){
	
	//register our settings
	register_setting('wpgw-settings-group', 'wpgw_copyright');
	register_setting('wpgw-settings-group', 'wpgw_analytics');

}

function wpgw_settings_page(){

?>

<div class="wrap">

	<h2>Website Settings</h2>

	<form id="landingOptions" method="post" action="options.php">
	
	    <?php settings_fields('wpgw-settings-group'); ?>
	    
	    <table class="form-table">
	        <tr valign="top">
	        <th scope="row">Copyright:</th>
	        <td>
	       		<?php wp_editor(get_option('wpgw_copyright'), 'wpgw_copyright', $settings = array('name' => 'wpgw_copyright', 'teeny' => true, 'media_buttons' => false, 'textarea_rows' => 5)); ?>
	       	</td>
	        </tr>
	        <th scope="row">Google Analytics ID:</th>
	        <td>
	       		<input name="wpgw_analytics" size="51" value="<?php echo get_option('wpgw_analytics'); ?>" />
	       	</td>
	        </tr>      
	    </table>
	    <p class="submit">
	    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
	    </p>
	</form>
	
</div><!-- / .wrap -->

<?php } ?>
