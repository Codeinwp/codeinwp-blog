<?php

$themename = get_current_theme(); //Use css theme name
$shortname = "hr"; //Set variable prefix

$options = array (
 
//General
array( "name" => $themename." Options",
	   "type" => "title"),

array( "name" => "Social Media",
	   "type" => "section"),
array( "type" => "open"),

array( "name" => "Facebook Link",
	   "desc" => "",
	   "id" => $shortname."_fb_link",
	   "type" => "text",
	   "std" => ""),
array( "name" => "Youtube",
	   "desc" => "",
	   "id" => $shortname."_yt_link",
	   "type" => "text",
	   "std" => ""),
array( "name" => "Twitter",
	   "desc" => "",
	   "id" => $shortname."_tw_link",
	   "type" => "text",
	   "std" => ""),

array( "type" => "close"),

array( "name" => "General",
	   "type" => "section"),
	
array( "type" => "open"),
array( "name" => "Phone number",
	   "desc" => "",
	   "id" => $shortname."_phone_nr",
	   "type" => "text",
	   "std" => ""),

array( "name" => "Email address",
	   "desc" => "",
	   "id" => $shortname."_e_mail",
	   "type" => "text",
	   "std" => ""),

array( "type" => "close"),

array( "name" => "Style",
	   "type" => "section"),
array( "type" => "open"),

array( "name" => "Logo url",
	   "desc" => "Add logo url in next field. 100px 1000x ( demo ).",
	   "demo" => "Your current logo:",
	   "id" => $shortname."_logo_url",
	   "type" => "image",
	   "std" => "You don't have selected a logo yet."),

array( "name" => "Background Pattern",
	   "desc" => "ASelect your background pattern.",
	   "demo" => "Your current logo:",
	   "id" => $shortname."_bg_url",
	   "type" => "image",
	   "std" => "You don't have selected a background yet."),

array( "type" => "close"),);

?>