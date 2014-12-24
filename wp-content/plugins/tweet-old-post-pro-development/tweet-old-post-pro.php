<?php
#     /*
#     Plugin Name: Revive old post Pro Add-on
#     Plugin URI: https://themeisle.com/plugins/tweet-old-post-pro/
#     Description: This addon enable the pro functions of Revive Old Post plugin.For questions, comments, or feature requests, <a href="http://themeisle.com/contact/">contact </a> us!
#     Author: ThemeIsle
#     Version: 1.4.5
#     Author URI: https://themeisle.com/
#     */

define("TOPCSSFILE", plugins_url('css/style.css',__FILE__ ));
define("ROPPROPLUGINPATH", realpath(dirname(__FILE__) ));
require_once(ROPPROPLUGINPATH."/inc/core-pro.php");
