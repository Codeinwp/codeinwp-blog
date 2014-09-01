jQuery(document).ready(function () {	
	autosave();
	
	var dry_preview_link = null;
	
	var dry_preview_scroll_position = 0;
	var dry_preview_meta_box_scroll_position = 0;
	
	var data = {
		'action': 'dry_quick_preview',
		'post_ID': jQuery('#post_ID').val(),
		'post_status': 'auto-draft',
		'post_format': ''
	};
	
	jQuery.post(ajaxurl, data, function(response) {
		dry_preview_link = response;
	});
	
	var tabsHolder = null;
		
	tabsHolder = (jQuery('.wp-editor-tabs').length > 0) ? jQuery('.wp-editor-tabs') : jQuery('.wp-editor-tools');	
	
	tabsHolder.prepend("<a onclick='switchEditors.switchto(this);' class='wp-switch-editor switch-decp' id='content-decp'>"+DRY_Preview.quickPreviewNormal+"</a>");
	
	var toggleVisualComposer = function(mode){
		switch(mode){
			case 'preview':
			{
				jQuery('#wpb_visual_composer').hide();							
				jQuery('#dry-quick-preview').show();
				jQuery('.wpb_switch-to-quick-preview').text(DRY_Preview.quickPreviewActive);
			}
			break;
			case 'visual':
			{
				jQuery('#wpb_visual_composer').show();							
				jQuery('#dry-quick-preview').hide();
				jQuery('.wpb_switch-to-quick-preview').text(DRY_Preview.quickPreviewNormal);
			}
			break;
		}		
	}
	
	//-------------------	
		if(DRY_Preview.visualComposer == 'on'){
			var visualComposerCheckIntervalAttempts = 0;
			var visualComposerCheckIntervalID = window.setInterval(function(){
				if (jQuery('.composer-switch').length > 0 || visualComposerCheckIntervalAttempts == 5)
				{     
					clearInterval(visualComposerCheckIntervalID);					
					
					if(jQuery('#wpb_visual_composer').length > 0){
						jQuery('.composer-switch').append('<a href="#" class="wpb_switch-to-quick-preview button-primary">'+DRY_Preview.quickPreviewNormal+'</a>');
						
						if(!jQuery('#wpb_visual_composer').is(':visible')){
							jQuery('.wpb_switch-to-quick-preview').hide();
						}
						
						
						jQuery('.wpb_switch-to-composer').on('click', function(e){						
							if(jQuery('#wpb_vc_js_status').val().toLowerCase() == 'true'){
								jQuery('.wpb_switch-to-quick-preview').show();
							}else{
								jQuery('.wpb_switch-to-quick-preview').hide();
								jQuery('#dry-quick-preview').hide();
								jQuery('.wpb_switch-to-quick-preview').text(DRY_Preview.quickPreviewNormal);
								jQuery('.wpb_switch-to-quick-preview').removeClass('activeDryPreview');
							}						
						});
						
						
						jQuery('.wpb_switch-to-quick-preview').on('click',function(e){
							e.preventDefault();
							
							jQuery('.wpb_switch-to-quick-preview').toggleClass('activeDryPreview');							
							
							if(jQuery('.wpb_switch-to-quick-preview').hasClass('activeDryPreview')){
								toggleVisualComposer('preview');								
							}else{
								dry_preview_meta_box_scroll_position = jQuery('#dry-quick-preview .inside iframe').contents().find('html').scrollTop();
								
								toggleVisualComposer('visual');								
								return;
							}
							
							jQuery('#dry-quick-preview .inside iframe').remove();
							
							jQuery('#dry-quick-preview .inside').append("<iframe width='100%'></textarea>")
							jQuery('#dry-quick-preview .inside iframe').css({ 'height' : DRY_Preview.previewHeight });
							
							autosave();
							
							var visualComposerAjaxIntervalID = window.setInterval(function(){
								if (jQuery.active == 0)
								{     
									clearInterval(visualComposerAjaxIntervalID);
									
									jQuery('#dry-quick-preview .inside iframe').attr("src", dry_preview_link).load(function(){
										if(DRY_Preview.excludeAdminBar == 'on'){
											jQuery('#dry-quick-preview .inside iframe').contents().find( "#wpadminbar" ).remove();
											
											jQuery('#dry-quick-preview .inside iframe').contents().find('html, html body').each(function(){
												jQuery(this).get(0).style.setProperty("margin-top", "0px", "important");
											})
										}
										
										var unwantedElements = DRY_Preview.unwantedElements.split(',');
										
										jQuery.each(unwantedElements, function(index, selectorValue) { 
											jQuery('#dry-quick-preview .inside iframe').contents().find(selectorValue.trim()).remove();
										});
										
										//ZAK
										jQuery('#preview').css('opacity', '1');
										//
										
										if(DRY_Preview.autoScroll == 'on'){
											jQuery('#dry-quick-preview .inside iframe').contents().find('html').scrollTop(dry_preview_meta_box_scroll_position);
										}
									});
								}
							}, 500);
						});
					}
				}
			}, 500);
		}
		//ZAK
		if(!jQuery('#wpb_visual_composer').length > 0)
		{
		jQuery('#dry-quick-preview').remove();
		}
		//
	//-------------------
	
	jQuery('#content-tmce, #content-html').on('click', function(e){
		if(jQuery('#wp-content-editor-container iframe#preview').is(':visible')){
			dry_preview_scroll_position = jQuery('#wp-content-editor-container iframe#preview').contents().find('html').scrollTop();
			//ZAK
			jQuery('#preview').css('opacity', '0');
			//
		}
		
		jQuery('#wp-content-editor-container textarea#content').css({'position':'relative','top':'auto'});
		jQuery('#wp-content-editor-container iframe#preview').remove();
		
		var editorId = 'content';
		
		jQuery('#wp-content-wrap').removeClass("decp-active");
		var mode = (jQuery(this).is(jQuery('#content-html'))) ? 'text' : 'visual';
		var ed = null;
		switch(mode){		
			case 'visual':
			{
				ed = tinyMCE.get(editorId);
				if(typeof ed == 'undefined' || ed == null){
					ed = new tinymce.Editor(editorId, tinyMCEPreInit.mceInit[editorId]);
					ed.render();
				}
				if(typeof ed != 'undefined' && ed != null){							
					ed.show();
				}
				
				jQuery('#wp-content-wrap').addClass("tmce-active");
			}
			break;
			
			//ZAK
			case 'text':
			{
			jQuery('#wp-content-wrap').addClass("html-active");
			}
			break;
			//
		}
	});
	 
	jQuery('#content-decp').on('click', function(){
	
	//ZAK
	if (!jQuery('#wp-content-wrap').hasClass('decp-active'))
	{
	//
	
		autosave();	
			
		var intervalID = window.setInterval(function(){
			if (jQuery.active == 0)
			{     
				clearInterval(intervalID);		
			
				var editorId = 'content';	
				
				QTags.closeAllTags(editorId);
				setUserSetting('editor', 'tinymce');
				
				var ed = tinyMCE.get(editorId);
				
				if(typeof ed != 'undefined' && ed != null){		
					ed.hide();
				}
				
				jQuery('#wp-content-editor-container iframe#preview').remove();
				jQuery('#wp-content-editor-container textarea#content').css({'position':'absolute','top':'-10000px'});
				jQuery('#wp-content-editor-container').append("<iframe width='100%' id='preview'></textarea>")
				jQuery('#wp-content-editor-container iframe#preview').css({ 'height' : DRY_Preview.previewHeight });
				jQuery('#wp-content-editor-container iframe#preview').attr("src", dry_preview_link).load(function(){
					if(DRY_Preview.excludeAdminBar == 'on'){
						jQuery('#wp-content-editor-container iframe#preview').contents().find( "#wpadminbar" ).remove();
						
						jQuery('#wp-content-editor-container iframe#preview').contents().find('html, html body').each(function(){
							jQuery(this).get(0).style.setProperty("margin-top", "0px", "important");
						})
					}
					
					var unwantedElements = DRY_Preview.unwantedElements.split(',');
					
					jQuery.each(unwantedElements, function(index, selectorValue) { 
						jQuery('#wp-content-editor-container iframe#preview').contents().find(selectorValue.trim()).remove();
					});
					
					//ZAK
					jQuery('#preview').css('opacity', '1');
					//
					
					if(DRY_Preview.autoScroll == 'on'){
						jQuery('#wp-content-editor-container iframe#preview').contents().find('html').scrollTop(dry_preview_scroll_position);
					}
				});
								
				jQuery('#wp-content-wrap').removeClass("html-active tmce-active");
				jQuery('#wp-content-wrap').addClass("decp-active");
			}
		},500);
	}
	});
});