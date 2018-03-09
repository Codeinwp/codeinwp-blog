    function createCookie(name,value,days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + value + expires + "; path=/";
        }	
	document.addEventListener("DOMContentLoaded", function() {
			var currentTime = new Date().getHours();
				//console.log(currentTime);

			if (0 <= currentTime&&currentTime < 12) {
				jQuery('#subheader').addClass('morning');
				var morning = '<div class="container">' +
                                '<div data-depth="0.20" class="layer triunghi_mare noon"></div>' +
                                '<div data-depth="0.10" class="layer triunghi_mic noon"></div>' +
                                '<div data-depth="0.0" class="layer sunmorning"></div>' +
                                '<div data-depth="0.20" class="layer poly_globe"></div>' +
                                '<div data-depth="0.60" class="layer noonrocketmorning"></div>' +
                                '<form action="https://codeinwp.us3.list-manage.com/subscribe/post?u=bf06b9a7223d1c8f65272caf7&amp;id=bd98fdaf54" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>' +
                                    '<div class="newsletter">Get the list of 10 Tools We Use <br /><span>When Designing for WP That Cut Our Work Time in Half<br />(by the Way, 7 of Them Are Free)</span></div>' +
                                    '<input type="email" value="" name="EMAIL" class="emailinput animated flipInY" id="mce-EMAIL" placeholder="Your e-mail address" required>' +
                                    '<div style="position: absolute; left: -5000px;"><input type="text" name="b_bf06b9a7223d1c8f65272caf7_bd98fdaf54" value=""></div>' +
                                    '<input type="submit" name="subscribe" id="mc-embedded-subscribe" class="subscribe animated flipInY" value="Subscribe">' +
                                '</form>' +
                            '</div><!--/container-->';
				jQuery('#subheader').append(morning);
				jQuery('#headernav ul li:last').addClass('morning');
		    }

		    if (12 <= currentTime&&currentTime < 20) {
		    	jQuery('#subheader').addClass('noonday');
		    	var noon = '<div class="container">' +
								'<div data-depth="0.20" class="layer triunghi_mare noon"></div>' +
								'<div data-depth="0.10" class="layer triunghi_mic noon"></div>' +
								'<div data-depth="0.40" class="layer sun"></div>' +
								'<div data-depth="0.20" class="layer poly_globe"></div>' +
								'<div data-depth="0.60" class="layer noonrocket"></div>' +
								'<div data-depth="0.30" class="layer circleone"></div>' +
								'<div data-depth="0.90" class="layer circletwo"></div>' +
                                '<form action="https://codeinwp.us3.list-manage.com/subscribe/post?u=bf06b9a7223d1c8f65272caf7&amp;id=bd98fdaf54" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>' +
                                '<div class="newsletter">Get the list of 10 Tools We Use <br /><span>When Designing for WP That Cut Our Work Time in Half<br />(by the Way, 7 of Them Are Free)</span></div>' +
                                '<input type="email" value="" name="EMAIL" class="emailinput animated flipInY" id="mce-EMAIL" placeholder="Your e-mail address" required>' +
                                '<div style="position: absolute; left: -5000px;"><input type="text" name="b_bf06b9a7223d1c8f65272caf7_bd98fdaf54" value=""></div>' +
                                '<input type="submit" name="subscribe" id="mc-embedded-subscribe" class="subscribe animated flipInY" value="Subscribe">' +
                                '</form>' +
				            '</div><!--/container-->';
				jQuery('#subheader').append(noon);
				jQuery('#headernav ul li:last').addClass('day');
		    }

		    if (20 <= currentTime&&currentTime < 24) {
		    	jQuery('#subheader').addClass('night');
		    	var night = '<div class="container">' +
								'<div data-depth="0.20" class="layer triunghi_mare"></div>' +
								'<div data-depth="0.10" class="layer triunghi_mic"></div>' +
								'<div data-depth="0.40" class="layer stars"></div>' +
								'<div data-depth="0.30" class="layer astar_big">' +
									'<div class="star dot_one"></div>' +
									'<div class="star dot_two"></div>' +
									'<div class="star dot_three"></div>' +
									'<div class="star dot_four"></div>' +
								'</div><!--/astar_big-->' +

								'<div data-depth="0.10" class="layer astar_small">' +
									'<div class="star_small dot_five"></div>' +
									'<div class="star_small dot_six"></div>' +
									'<div class="star_small dot_seven"></div>' +
									'<div class="star_small dot_eight"></div>' +
									'<div class="star_small dot_nine"></div>' +
								'</div><!--/astar_small-->' +
								'<div data-depth="0.50" class="layer wordpress_stars"></div>' +
								'<div data-depth="0.20" class="layer poly_globe"></div>' +
								'<div data-depth="0.60" class="layer night_rocket"></div>' +
                                '<form action="https://codeinwp.us3.list-manage.com/subscribe/post?u=bf06b9a7223d1c8f65272caf7&amp;id=bd98fdaf54" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>' +
                                    '<div class="newsletter">Get the list of 10 Tools We Use <br /><span>When Designing for WP That Cut Our Work Time in Half <br />(by the Way, 7 of Them Are Free)</span></div>' +
                                    '<input type="email" value="" name="EMAIL" class="emailinput animated flipInY" id="mce-EMAIL" placeholder="Your e-mail address" required>' +
                                    '<div style="position: absolute; left: -5000px;"><input type="text" name="b_bf06b9a7223d1c8f65272caf7_bd98fdaf54" value=""></div>' +
                                    '<input type="submit" name="subscribe" id="mc-embedded-subscribe" class="subscribe animated flipInY" value="Subscribe">' +
                                '</form>' +
				            '</div><!--/container-->';
				jQuery('#subheader').append(night);
				jQuery('#headernav ul li:last').addClass('night');
		    }

	
    	//Setup parallax
    	var scene = document.getElementById('subheader');
    	if (Parallax) var parallax = new Parallax(scene);
    	
    	var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34374795-3']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  
    	jQuery("#mc-embedded-subscribe").click(function(){

    _gaq.push(['_trackEvent', 'Subscribe', 'Subscribed', '<?php the_permalink();?>']);



  jQuery(".mc-field-group .button").click(function(){

    _gaq.push(['_trackEvent', 'Subscribe', 'Subscribed', '<?php the_permalink();?>']);
   

  })
    });



(function (tos) {
  window.setInterval(function () {
    tos = (function (t) {
      return t[0] == 50 ? (parseInt(t[1]) + 1) + ':00' : (t[1] || '0') + ':' + (parseInt(t[0]) + 10);
    })(tos.split(':').reverse());
    window.pageTracker ? pageTracker._trackEvent('Time', 'Log', tos) : _gaq.push(['_trackEvent', 'Time', 'Log', tos]);
        
  
        

  }, 10000);
})('00');







    var filetypes = /\.(zip|exe|dmg|pdf|doc.*|xls.*|ppt.*|mp3|txt|rar|wma|mov|avi|wmv|flv|wav)$/i;
    var baseHref = '';
    if (jQuery('base').attr('href') != undefined) baseHref = jQuery('base').attr('href');
 
    jQuery('a').on('click', function(event) {
      var el = jQuery(this);
      var track = true;
      var href = (typeof(el.attr('href')) != 'undefined' ) ? el.attr('href') :"";
      var isThisDomain = href.match(document.domain.split('.').reverse()[1] + '.' + document.domain.split('.').reverse()[0]);
      if (!href.match(/^javascript:/i)) {
        var elEv = []; elEv.value=0, elEv.non_i=false;
        if (href.match(/^mailto\:/i)) {
          elEv.category = "email";
          elEv.action = "click";
          elEv.label = href.replace(/^mailto\:/i, '');
          elEv.loc = href;
        }
        else if (href.match(filetypes)) {
          var extension = (/[.]/.exec(href)) ? /[^.]+$/.exec(href) : undefined;
          elEv.category = "download";
          elEv.action = "click-" + extension[0];
          elEv.label = href.replace(/ /g,"-");
          elEv.loc = baseHref + href;
        }
        else if (href.match(/^https?\:/i) && !isThisDomain) {
          elEv.category = "external";
          elEv.action = "click";
          elEv.label = href.replace(/^https?\:\/\//i, '');
          elEv.non_i = true;
          elEv.loc = href;
        }
        else if (href.match(/^tel\:/i)) {
          elEv.category = "telephone";
          elEv.action = "click";
          elEv.label = href.replace(/^tel\:/i, '');
          elEv.loc = href;
        }
        else track = false;
        // set cookie for external clicks
        
        
        
        createCookie('externalclick','yes',7);
        
        //track fb event for external clicks
        window._fbq.push(['track', 'ViewContent', {type:'external'}]);
      }
    })

})
    