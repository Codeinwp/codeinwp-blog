<?php
/*
  Plugin Name: Dry Preview
  Description: Dry Preview is a simple plugin which boost up your productivity with just one click by enabling you to preview all of your changes in editor immediately.
  Version: 1.2.0
  Author: DryThemes
  Author URI: http://www.drythemes.com
 */

include('dry-preview-page.php');
 
class DryPreview {
	
    function __construct() {
		register_activation_hook(__FILE__, array(&$this, 'dry_preview_add_defaults'));
		
        add_action('init', array(&$this, 'init'));		
		
        add_action('admin_init', array(&$this, 'dry_preview_init'));
		add_action('admin_menu', array(&$this, 'dry_preview_add_options_page'));
		
		add_action('add_meta_boxes',  array(&$this,'dry_add_quick_preview_meta_box'));  
    }

    function init() {
        $options = get_option('dry_preview_options');
		
		$preview_page =  plugins_url('dry-preview-page.php',__FILE__);
		
        if (is_admin()) {
			global $pagenow;
			if( 'post.php' == $pagenow || 'post-new.php' == $pagenow) {
				$options = get_option('dry_preview_options');
				
				wp_enqueue_style("dry_preview_admin_style", plugins_url('assets/css/admin.css', __FILE__));
				
				global $wp_version;
				preg_match_all('!\d+!', $wp_version, $matches);
				$wp_ver = $matches[0][0].$matches[0][1];
				$wp_ver = (int)$wp_ver;
				
		        if($wp_ver<39)
				{
				wp_enqueue_script("dry_preview_admin_script", plugins_url('assets/js/editor-preview-old.js', __FILE__),array('jquery'));
				}
				else
				{
				wp_enqueue_script("dry_preview_admin_script", plugins_url('assets/js/editor-preview.js', __FILE__),array('jquery'));
				}
				
				
				
				wp_localize_script('dry_preview_admin_script', 'DRY_Preview', array(
					'preview_page' =>  $preview_page,
					'quickPreviewNormal' => __('Quick Preview','dryPreview'), 
					'quickPreviewActive' => __('Back To Visual Composer','dryPreview'),
					'autoScroll' => (isset($options['autoScroll'])) ? $options['autoScroll'] : 'off',
					'excludeAdminBar' =>  (isset($options['excludeAdminBar'])) ? $options['excludeAdminBar'] : 'off',
					'previewHeight' =>  (isset($options['previewHeight']) && trim($options['previewHeight']) != "") ? $options['previewHeight'] : '480px',
					'unwantedElements' => (isset($options['unwantedElements'])) ? $options['unwantedElements'] : '',
					'visualComposer' => (isset($options['visualComposer'])) ? $options['visualComposer'] : 'off'
				));
			}
			add_filter( "plugin_action_links_".plugin_basename( __FILE__ ), array(&$this, 'dry_preview_settings_link') );
        }
		
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
            return;
        }
    }

    function dry_preview_init() {
        register_setting('dry_preview_plugin_options', 'dry_preview_options');
    }	
		
	function dry_add_quick_preview_meta_box()  
	{  
		$screens = array( 'post', 'page' );

		$custom_post_types = get_post_types( array(
		   'public'   => true,
		   '_builtin' => false
		), "names", "and" ); 

		foreach ( $custom_post_types as $custom_post_type ) {
		   add_meta_box( 'dry-quick-preview', __('Quick Preview','dryPreview'), array(&$this, 'dry_add_quick_preview_meta_box_callback'), $custom_post_type, 'normal', 'high' );
		}
		foreach ( $screens as $screen ) {
			add_meta_box( 'dry-quick-preview', __('Quick Preview','dryPreview'), array(&$this, 'dry_add_quick_preview_meta_box_callback'), $screen, 'normal', 'high' ); 
		}
	}  
	
	function dry_add_quick_preview_meta_box_callback()  
	{  
		echo '';     
	}

	function dry_preview_settings_link( $links ) {
		$isSet=apply_filters('ebs_custom_option',false);
		if (!$isSet) {
			$settings_link = '<a href="options-general.php?page=dry-preview/dry-preview.php">Settings</a>';
			array_push( $links, $settings_link );
		}
		return $links;
	}
	
	function dry_preview_add_defaults() {
			$arr = array(	
				"autoScroll" => "on",
				"excludeAdminBar" => "on",
				"previewHeight" => "480px",
				"unwantedElements" => "",
				"visualComposer" => "off"
			);
			update_option( 'dry_preview_options', $arr );
	}
	
	function dry_preview_add_options_page(){
		add_options_page(__('Dry Preview','dry_preview'), __('Dry Preview','dry_preview'), 'manage_options', __FILE__, array(&$this, 'render_options_form'));
	}
	
	function render_options_form(){
		$options = get_option('dry_preview_options');
		
		$outputHTML  = '<div class="wrap">';
		$outputHTML .= '	<div id="icon-options-general" class="icon32"></div>';
		$outputHTML .= '	<h2>'.__('Dry WP Quick Preview','dry_preview').'</h2>';
		$outputHTML .= '	<h4>'.__('Main options related to the default settings','dry_preview').'</h4>';
		$outputHTML .= '	<form class="dry-preview" method="post" action="options.php">';
		
		echo($outputHTML);
		
		settings_fields('dry_preview_plugin_options');
		
		$outputHTML = '';
		
		$outputHTML .= '		<table>';
		$outputHTML .= '			<tbody>';
		$outputHTML .= '				<tr valign="top">';
		$outputHTML .= '					<th scope="row">';
		$outputHTML .= '						<label for="previewHeight">'.__('Preview Container Height','dry_preview').'</label>';
		$outputHTML .= '					</th>';
		$outputHTML .= '					<td>';
		$outputHTML .= '						<input type="text" id="previewHeight" name="dry_preview_options[previewHeight]" value="'.$options["previewHeight"].'"/>';
		$outputHTML .= '						<p class="description">'.__('Height of preview container in pixels (480px by default)','dry_preview').'</p>';
		$outputHTML .= '					</td>';
		$outputHTML .= '				</tr>';
		$outputHTML .= '				<tr>';	
		$outputHTML .= '					<th scope="row">';
		$outputHTML .= '						'.__('Auto Scroll','dry_preview');
		$outputHTML .= '					</th>';
		$outputHTML .= '					<td>';
		$outputHTML .= '						<label for="autoScroll">';
		$outputHTML .= '							<input type="checkbox" id="autoScroll" name="dry_preview_options[autoScroll]" value="on" '.(( isset($options['autoScroll']) && 'on' == $options['autoScroll'] ) ? 'checked="checked"' : '').'/>';
		$outputHTML .= '							'.__('Enabled','dry_preview');
		$outputHTML .= '						</label>';
		$outputHTML .= '						<span>'.__('(scroll to the same position as last time)','dry_preview').'</span>';
		$outputHTML .= '					</td>';
		$outputHTML .= '				</tr>';	
		$outputHTML .= '				<tr>';	
		$outputHTML .= '					<th scope="row">';
		$outputHTML .= '						'.__('Admin Bar','dry_preview');
		$outputHTML .= '					</th>';
		$outputHTML .= '					<td>';
		$outputHTML .= '						<label for="excludeAdminBar">';
		$outputHTML .= '							<input type="checkbox" id="excludeAdminBar" name="dry_preview_options[excludeAdminBar]" value="on" '.(( isset($options['excludeAdminBar']) && 'on' == $options['excludeAdminBar'] ) ? 'checked="checked"' : '').'/>';
		$outputHTML .= '							'.__('Hidden','dry_preview');
		$outputHTML .= '						</label>';
		$outputHTML .= '						<span>'.__('(exclude admin bar from quick preview)','dry_preview').'</span>';
		$outputHTML .= '					</td>';
		$outputHTML .= '				</tr>';		
		$outputHTML .= '				<tr>';	
		$outputHTML .= '					<th scope="row">';
		$outputHTML .= '						'.__('Visual Composer Add-on','dry_preview');
		$outputHTML .= '					</th>';
		$outputHTML .= '					<td>';
		$outputHTML .= '						<label for="visualComposer">';
		$outputHTML .= '							<input type="checkbox" id="visualComposer" name="dry_preview_options[visualComposer]" value="on" '.((isset($options['visualComposer']) && 'on' == $options['visualComposer'] ) ? 'checked="checked"' : '').'/>';
		$outputHTML .= '							'.__('Enabled','dry_preview');
		$outputHTML .= '						</label>';
		$outputHTML .= '						<span>'.__('(check this option if you use "Visual Composer")','dry_preview').'</span>';
		$outputHTML .= '					</td>';
		$outputHTML .= '				</tr>';
		$outputHTML .= '			</tbody>';
		$outputHTML .= '		</table>';
		$outputHTML .= '	<h4>'.__('Advance options related to previewed elements','dry_preview').'</h4>';
		$outputHTML .= '		<table>';
		$outputHTML .= '			<tbody>';
		$outputHTML .= '				<tr valign="top">';
		$outputHTML .= '					<th scope="row">';
		$outputHTML .= '						<label for="unwantedElements">'.__('Unwanted Elements','dry_preview').'</label>';
		$outputHTML .= '					</th>';
		$outputHTML .= '					<td>';
		$outputHTML .= '						<textarea id="unwantedElements" name="dry_preview_options[unwantedElements]">'.$options["unwantedElements"].'</textarea>';
		$outputHTML .= '						<p class="description">'.__('Comma separated CSS selectors of elements that you want to hide in preview (eg. header, footer) so you can preview your clean page content.','dry_preview').'</p>';
		$outputHTML .= '					</td>';
		$outputHTML .= '				</tr>';
		$outputHTML .= '			</tbody>';
		$outputHTML .= '		</table>';
		//$outputHTML .= '		<a href="#" target="_blank">For more details please follow this link.</a>';
		$outputHTML .= '		<p class="submit">';
		$outputHTML .= '			<input type="submit" name="submit" id="submit" class="button button-primary" value="'.__('Save Changes','dry_preview').'">';
		$outputHTML .= '		</p>';
		$outputHTML .= '	</form>';
		$outputHTML .= '</div>';
		
		echo $outputHTML;
		
		wp_enqueue_style("awp_options_form_style", plugins_url('assets/css/settings.css', __FILE__));
	}
}

$drycodes = new DryPreview();
?>