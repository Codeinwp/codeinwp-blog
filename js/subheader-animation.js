				//Setup aniamtion
				jQuery(document).ready(function($) {
				    
				    if (window.location.hash =="#fb" && window.location.href.indexOf('best-wordpress-hosting')>0 )
				    $("a").each(function(index){
				        
				      if ($(this).hasAttr('href') && $(this).attr('href').indexOf('siteground')>0 ) {
				          s_atr = $(this).attr('href');
				          $(this).attr('href',s_atr+'?afcode=b1d0f6820e046c19802d21f3b46eb61d&campaign=fb')
				      }
				          
				          
				      
				        
				    })
				
					$(".presentation-shortcode:last").addClass("presentation-shortcode-last");

				    var $grower = $('.dot_one');
				    var $grower_two = $('.dot_two');
				    var $grower_three = $('.dot_three');
				    var $grower_four = $('.dot_four');
				    var $grower_five = $('.dot_five');
				    var $grower_six = $('.dot_six');
				    var $grower_seven = $('.dot_seven');
				    var $grower_eight = $('.dot_eight');
				    var $grower_nine = $('.dot_nine');

				    function runIt() {

				        $grower.animate({
				            opacity:"0"
				        }, 1300, function() {
				            $grower.removeAttr("style");
				            runIt();
				        });

				        $grower_two.animate({
				            opacity:"0"
				        }, 900, function() {
				            $grower_two.removeAttr("style");
				            runIt();
				        });

				        $grower_three.animate({
				            opacity:"0"
				        }, 1100, function() {
				            $grower_three.removeAttr("style");
				            runIt();
				        });

				        $grower_four.animate({
				            opacity:"0"
				        }, 1500, function() {
				            $grower_four.removeAttr("style");
				            runIt();
				        });

				        $grower_five.animate({
				            opacity:"0"
				        }, 1200, function() {
				            $grower_five.removeAttr("style");
				            runIt();
				        });

				        $grower_six.animate({
				            opacity:"0"
				        }, 900, function() {
				            $grower_six.removeAttr("style");
				            runIt();
				        });

				        $grower_seven.animate({
				            opacity:"0"
				        }, 700, function() {
				            $grower_seven.removeAttr("style");
				            runIt();
				        });

				        $grower_eight.animate({
				            opacity:"0"
				        }, 800, function() {
				            $grower_eight.removeAttr("style");
				            runIt();
				        });

				        $grower_nine.animate({
				            opacity:"0"
				        }, 1000, function() {
				            $grower_nine.removeAttr("style");
				            runIt();
				        });
				    }
				    runIt();
				    
				    $('.img-theme-post').each(function (index, element){
				        if(typeof $(this).attr("data-demo") != 'undefined'){
                            
                            
                            
                            if($(this).hasClass('alignright')) {
                                $(this).wrap("<div class='codeinwp-wrap-div alignright'></div>");
                                $(this).closest('.codeinwp-wrap-div img').after('<div class="codeinwp-wrap-div-before"></div>');
                            }
                            else {
                                $(this).wrap("<div class='codeinwp-wrap-div alignleft'></div>");
                                $(this).closest('.codeinwp-wrap-div img').after('<div class="codeinwp-wrap-div-before"></div>');
                            }
                            $(this).before('<div class="codeinwp-button-demo"><a href="' + $(this).attr("data-demo") +  '" target="_blank">Demo</a></div>');
				        }    
                    });
				});
