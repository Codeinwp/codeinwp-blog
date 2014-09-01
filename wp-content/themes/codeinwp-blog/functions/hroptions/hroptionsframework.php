<?php
/*
	HR Options Panel Framework
*/

//Add external style files
function hr_theme_options_styles() {
   ?>
   <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/functions/hroptions/style/hr_style.css" type="text/css" />
   <script src="<?php echo get_template_directory_uri(); ?>/functions/hroptions/style/rm_script.js" type="text/javascript"></script>
   <?php
}
add_action('admin_head', 'hr_theme_options_styles');

function hr_add_admin() {
 
	global $themename, $shortname, $options;
	
	//Update options, reset options
	if (isset($_GET['page']) && $_GET['page'] == basename(__FILE__)) {
		
		if (isset($_REQUEST['action']) && 'save' == $_REQUEST['action']){  
		
		foreach ($options as $option){
				
				$hrthe_value = stripslashes($_REQUEST[$option['id']]);
				
				if(isset($_REQUEST[$option['id']])){ update_option($option['id'], $hrthe_value); }else{ delete_option($option['id']); } 
				
			}
			
			header("Location: admin.php?page=hroptionsframework.php&saved=true");
			
			die;
		 
		}else if(isset($_REQUEST['action']) && 'reset' == $_REQUEST['action']) {
			
			foreach ($options as $option) {
				delete_option($option['id']); 
			}
			
			header("Location: admin.php?page=hroptionsframework.php&reset=true");
			
			die;
		 
		}
	}
	
	/* Get icon url */
	$cm_t_icon = get_bloginfo('template_url');  //Get theme folder url
	$cm_icon_url = "/functions/hroptions/style/images/menu_icon.png"; //Get file location
	$cm_icon = $cm_t_icon."".$cm_icon_url; //Now kiss!

	//Add HR options page and menu
	add_menu_page($themename." Options", $themename." Options", 'edit_themes', basename(__FILE__), 'hr_admin', $cm_icon);
}

//Options page function
function hr_admin() {
 
	global $themename, $shortname, $options;
	$i=0;
    
	//Display update box
	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset. Now all fields are empty.</strong></p></div>';
?>

<!--Options page title-->
<h2 class="hr_header">
	<?php echo $themename; ?> Options Panel

	<!--<img src="<?php bloginfo('template_directory')?>/functions/hroptions/style/images/logo.png" alt="premium wordpress theme">-->
</h2>
<!--Layout-->
<div class="wrap">
  <div class="hr_opts">
	<form method="post">
		<?php 
		foreach ($options as $value) { switch ( $value['type'] ) { 
		
		case "open": 
		break; case "close": 
		?>
	</div>
    </div>
<br />

<?php break; case "title": ?>

<?php 
//Sub-title, display theme version, logs and help documentation
$hr_version = get_bloginfo('version');  //Get theme version ?>  <!--se repara dupa-->
<p><i>Version: <?php echo $hr_version; ?> | <a href="#" title="#">Help documentation</a> | <a href="#" title="#">Updates log</a> </i></p>

<?php break; case 'text': ?>

<!--Text input style-->
<div class="hr_row">
	<div class="hr_label">
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?>
			<small><?php echo $value['desc']; ?></small>
		</label>
	</div><!--hr_label end-->
	
	<div class="hr_right">
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
    </div><!--hr_right end-->
	<div class="clearfix"></div>
</div>
<!--Text input style end-->

<?php break; case 'textcolor': ?>

<!--Text color style-->
<div class="hr_row">
	<div class="hr_label">
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?>
			<small><?php echo $value['desc']; ?></small>
		</label>
	</div><!--hr_label end-->
	
	<div class="hr_right">
		<input style="background:#<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
    </div><!--hr_right end-->
	<div class="clearfix"></div>
</div>
<!--Text color style end-->

<?php break; case 'image': ?>

<!--Image url style-->
<div class="hr_row">
	<div class="hr_label">
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?>
			<small><?php echo $value['desc']; ?></small>
			<small class="hr_img_desc"><?php echo $value['demo']; ?></small>
		</label>
	</div><!--hr_label end-->
	
	<div class="hr_right">
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo stripslashes(get_settings( $value['id'])) ?>" />
   <div class="clearfix"></div>
   <div class="hr_img">
    <?php
   if( get_settings( $value['id'] ) != "") {
   		echo '<img src="'.stripslashes(get_settings( $value['id'])).'" width="100%"/>';
   } else {
		echo $value['std'];
   }
   ?>
   </div><!--img end-->
   
   </div><!--hr_right end-->
    <div class="clearfix"></div>
</div>
<!--Image url style end-->

<?php break; case 'textarea': ?>

<!--Textarea style-->
<div class="hr_row">
	<div class="hr_label">
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?>
			<small><?php echo $value['desc']; ?></small>
		</label>
	</div><!--hr_label end-->
	
	<div class="hr_right">
		<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
    </div><!--hr_right end-->
	<div class="clearfix"></div>
</div>
<!--Textarea style end-->

<?php break; case 'select': ?>

<!--Drop-down list style-->
<div class="hr_row">
	<div class="hr_label">
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?>
			<small><?php echo $value['desc']; ?></small>
		</label>
	</div><!--hr_label end-->
	
	<div class="hr_right">
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
			<?php foreach ($value['options'] as $option) { ?>
			<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
		</select>
	</div><!--hr_right end-->
    <div class="clearfix"></div>
</div>
<!--Drop-down list style end-->

<?php break; case 'selectpattern': ?>

<!--Drop-down list style-->
<div class="hr_row">
	<div class="hr_label">
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?>
			<small><?php echo $value['desc']; ?></small>
			<small class="hr_img_desc"><?php echo $value['demo']; ?></small>
		</label>
	</div><!--hr_label end-->
	
	<div class="hr_right">
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
			<?php foreach ($value['options'] as $option) { ?>
			<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
		</select>
		<div class="hr_pattern" style="background:url(<?php echo get_template_directory_uri(); ?>/functions/hroptions/style/images/patterns/<?php echo stripslashes(get_settings( $value['id'])) ?>.png);"></div>
	</div><!--hr_right end-->
	<div class="clearfix"></div>
</div>
<!--Drop-down list style end-->

<?php break; case "checkbox": ?>

<!--Checkbox style-->
<div class="rm_input rm_checkbox">
	<div class="hr_label">
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?>
			<small><?php echo $value['desc']; ?></small>
		</label>
	</div><!--hr_label end-->
	
	<div class="hr_right">
		<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
		<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?>/>
	</div><!--hr_right end-->
	<div class="clearfix"></div>
</div>
 <!--Checkbox style end-->
 

<?php break; case "subsection": ?>

<!--Suvsection ( section title ) style-->
<div class="rm_input">
		<div class="hr_section_title"><?php echo $value['name']; ?></div>
	<div class="clearfix"></div>
</div>
 <!--Suvsection ( section title ) style end-->
 

<?php break; case "section":
	$i++;
?>

<div class="hr_section">
	<div class="rm_title" title="Click to open and edit <?php echo $value['name']; ?> settings.">
		<h3>
    		<img src="<?php bloginfo('template_directory')?>/functions/hroptions/style/images/trans.png" class="inactive" alt=""><?php echo $value['name']; ?>
    	</h3>
    	<span class="submit"><input title="Pressing this button will save all options!" name="save<?php echo $i; ?>" type="submit" value="Save changes" class="button-primary" /></span>
<div class="clearfix"></div>
</div><!--hr_section end-->

<div class="rm_options">
<?php break; } } ?>

	<input type="hidden" name="action" value="save" />
</form>
</div><!--.hr_opts end-->
</div><!--.wrap end-->
<form method="post">
	<p class="submit">
		<input name="reset" type="submit" value="Reset" />
		<input type="hidden" name="action" value="reset" />
	</p>
</form>

<?php } add_action('admin_menu', 'hr_add_admin'); ?>
