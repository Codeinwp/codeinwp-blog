				//Setup aniamtion
				jQuery(document).ready(function($) {
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
				});
