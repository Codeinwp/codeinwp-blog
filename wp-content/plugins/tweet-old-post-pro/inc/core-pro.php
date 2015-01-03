<?php
if (!class_exists('CWP_TOP_Core_PRO')) {
	class CWP_TOP_Core_PRO  {
		public $notices;
		function __construct(){

			$this->topLoadHooks();

		}
		function toppro_admin_notice() {
			global $current_user ;
			$user_id = $current_user->ID;
			/* Check that the user hasn't already clicked to ignore the message */
			if ( ! class_exists('CWP_TOP_Core') ) {
				echo '<div class="error"> This is just a pro addon so you will need to install the Revive Old Post free plugin from the WordPress repository';

				echo "</p></div>";
			}
		}

		function topProAddNewAccount(){


			$twp = new CWP_TOP_Core;
			$twp->addNewAccount();
			/*$twp->oAuthCallback = $_POST['currentURL'];

			$twitter = new TwitterOAuth($twp->consumer, $twp->consumerSecret);
			$requestToken = $twitter->getRequestToken($twp->oAuthCallback);

			update_option('cwp_top_oauth_token', $requestToken['oauth_token']);
			update_option('cwp_top_oauth_token_secret', $requestToken['oauth_token_secret']);



			switch ($twitter->http_code) {
				case 200:
					$url = $twitter->getAuthorizeURL($requestToken['oauth_token']);
					echo $url;
					break;

				default:
					return __("Could not connect to Twitter!", CWP_TEXTDOMAIN);
					break;
			}

			die(); // Required*/

		}

		function url_get_contents ($Url) {
			$allowurl = ini_get('allow_url_fopen') ? "enabled" : "Disabled";
			if (function_exists('file_get_contents')&& $allowurl =="enabled") {
				$output = file_get_contents($Url);
			}
			else {
				if (!function_exists('curl_init')){
					die('CURL is not installed!');
				}
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $Url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$output = curl_exec($ch);
				curl_close($ch);
			}
			return $output;
		}

		function topProGetCustomCategories($postQuery, $maximum_hashtag_length){
			$taxonomi = get_object_taxonomies( $postQuery->post_type, 'objects' );
			$newHashtags = "";
			foreach ($taxonomi as $key => $value) {
				if (strpos($key,"category")) {
					$postCategories = get_the_terms($postQuery->ID,$key);

					foreach ($postCategories as $category) {
						if(strlen($category->name.$newHashtags) <= $maximum_hashtag_length || $maximum_hashtag_length == 0) {
							$newHashtags = $newHashtags . " #" . preg_replace('/-/','',strtolower($category->slug));
						}
					}
				}
			}
			return $newHashtags;
		}

		function topProImage($connection, $finalTweet, $id,$service='twitter') {
			//global $post, $posts;
			//$plugin_data = get_plugin_data( PLUGINPATH.'/tweet-old-post.php', $markup = true, $translate = true );
			//print_r($post);
			//print_r($plugin_data);

			//if ($plugin_data['Version']=='6.7.7'&&$plugin_data['Version']=='6.7.8'&&$plugin_data['Version']=='6.7.9'&&$plugin_data['Version']=='6.8'){
			//	$fullTweet = $finalTweet;
			//	$finalTweet = $finalTweet['message'];
			//}
			//echo has_post_thumbnail( $id );
			if ( strlen( $img = get_the_post_thumbnail( $id, array( 150, 150 ) ) ) ) :
				$image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'optional-size' );
				$image = $image_array[0];
			else :
				$post = get_post($id);
				$image = '';
				ob_start();
				ob_end_clean();
				$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

				$image = $matches [1] [0];

			endif;
			if ($image == '')
				$status = $connection->post('statuses/update', array('status' => $finalTweet));
			else
				$status = $connection->upload('statuses/update_with_media', array('status' => $finalTweet,'media[]' => $this->url_get_contents($image)));

			return $status;
		}

		function topLoadStyles()
		{
			global $cwp_top_settings; // Global Tweet Old Post Settings

			// Enqueue and register all scripts on plugin's page
			if(isset($_GET['page'])) {
				if ($_GET['page'] == $cwp_top_settings['slug'] || $_GET['page'] == "ExcludePosts") {

					// Enqueue and Register Main CSS File
					wp_register_style( 'cwp_top_pro_stylesheet', plugins_url( 'css/style.css', dirname(__FILE__) ), false, '1.0.0' );
					wp_enqueue_style( 'cwp_top_pro_stylesheet' );


				}
			}

		}

		function topLoadHooks()
		{
			add_action('admin_enqueue_scripts', array($this,'topLoadStyles'));
			add_action('admin_notices', array($this,'toppro_admin_notice'));
			add_action('admin_init', array($this,'download_file'));
			add_action( 'admin_notices', array($this, 'adminNotice') );
			add_action(  'facebookcwptoptweetcron', array( $this, 'tweetOldPostPro' ) ,10,1);
			add_action(  'twittercwptoptweetcron', array( $this, 'tweetOldPostPro' ) ,10,1);
			add_action(  'linkedincwptoptweetcron', array( $this, 'tweetOldPostPro' ) ,10,1);

		}

		public function adminNotice(){
			if(is_array($this->notices)){
				foreach($this->notices as $n){
					?>
					<div class="error">
	                         <p><?php _e( $n, CWP_TEXTDOMAIN ); ?></p>
	                 </div>
				<?php
				}
			}

		}
		function download_file(){
			if(!defined('CWP_TOP_PRO')){

				$this->notices[] =  "You need to have the latest version of the Revive Old Post plugin in order to have the updated features available !";
			}
			if(isset($_POST['cwp-action'])){
				if($_POST['cwp-action'] == 'download_sysinfo'){
					header('Content-Disposition: attachment; filename="report.txt"');
					header('Content-type: text/plain');
					echo $_POST['cwp-top-sysinfo'];
					die();

				}

			}

		}

		function tweetOldPostPro($n){

			global $CWP_TOP_Core;
			$CWP_TOP_Core->tweetOldPost(false,$n);
			$this->startOldPostPro($n);
		}
		public function clearScheduledTweets()
		{
			wp_clear_scheduled_hook('facebookcwptoptweetcron',array("facebook"));
			wp_clear_scheduled_hook('twittercwptoptweetcron',array("twitter"));
			wp_clear_scheduled_hook('linkedincwptoptweetcron',array("linkedin"));

		}
		function startOldPostPro($net = ''){
			global $CWP_TOP_Core;
			global $cwp_top_networks;
			$networks = $CWP_TOP_Core->getAvailableNetworks();

			if(!in_array($net,$networks) && !empty($net)) return false;
			if($net == ''){
				foreach($cwp_top_networks as $n=>$d){

					if(in_array($n,$networks)){
						$this->scheduleNextTweet($n,true);
					}
				}
			}else{
				$this->scheduleNextTweet($net);

			}
		}
		function scheduleNextTweet($n,$first = false){
			if($first){
				global $CWP_TOP_Core;
				$time = $CWP_TOP_Core->getTime() + 15;
			}else{
				$time = $this->getNextTweetTime($n);
			}
			if($time != 0 ){

				wp_clear_scheduled_hook($n . 'cwptoptweetcron',array($n));
				wp_schedule_single_event($time,$n . 'cwptoptweetcron',array($n)) ;

			}
		}
		function getUpperDays($day,$days){
			$tmp = array();
			foreach($days as $d){
				if($day <= $d){
					$tmp[] = $d;
				}
			}
			return $tmp;
		}
		function getNextTweetTime($network){
			$cwp_top_global_schedule = get_option("cwp_top_global_schedule" );
			global $CWP_TOP_Core;
			$type = $cwp_top_global_schedule[$network.'_schedule_type_selected'];
			if($type == 'each'){
				return $CWP_TOP_Core->getTime() + $cwp_top_global_schedule[$network.'_top_opt_interval'] * 3600;

			}else{
				$cday = date("N",$CWP_TOP_Core->getTime());

				$days = explode(",",$cwp_top_global_schedule[$network.'_top_opt_interval']['days']);
				if(!empty($days)){
					$day = 0;
					$upper_days = $this->getUpperDays($cday,$days);

					if($days[count($days) - 1] < $cday){
						$day = $days[0];

					}else{
						$day = $upper_days[0];
					}
					$times = $cwp_top_global_schedule[$network.'_top_opt_interval']['times'];
					$ctime = date("G:i",$CWP_TOP_Core->getTime());
					$ctime = explode(":",$ctime);
					$thour = false;
					$tmin = false;

					if(!empty($times)){

						foreach($times as $t){
							if(intval($t['hour']) >= intval($ctime[0]) ){
								if(intval($t['minute']) >= intval($ctime[1])){
									$thour = intval($t['hour']);
									$tmin = intval($t['minute']);
									break;
								}

							}

						}
						if($thour === false || $tmin === false){

							$thour = intval($times[0]['hour']);
							$tmin = intval($times[0]['minute']);
							if(count($upper_days)>1){
								$day = $upper_days[1];
							}else{

								$day = $days[0];
							}

						}
						$days_passed = 0;
						if($day >= $cday){
							$days_passed = $day - $cday;

						}else{
							$days_passed = (7 - $cday) + $day ;
						}

						$ctime[0] = intval($ctime[0]);
						$ctime[1] = intval($ctime[1]);

						if($days_passed > 1){
							return $CWP_TOP_Core->getTime() + (($days_passed-1) * 24 * 3600) + $thour * 3600 + $tmin * 60 + ((23 - $ctime[0])*3600) + ((60 - $ctime[1])*60);
						}else{
							if($days_passed == 1){

								return $CWP_TOP_Core->getTime()  + $thour * 3600 + $tmin * 60 + ((23 - $ctime[0])*3600) + ((60 - $ctime[1])*60);

							}
							if($days_passed == 0){
								return $CWP_TOP_Core->getTime()  + (( $thour - $ctime[0]) * 3600) + (( $tmin - $ctime[1]) * 60);

							}

						}

					}
				}
			}
			return 0;
		}
		function updateTopProAjax(){
			global $cwp_top_networks;
			$dataSent = $_POST['dataSent']['dataSent'];

			$options = array();
			parse_str($dataSent, $options);
			$optionsdb = array();
			foreach($cwp_top_networks as $n=>$d){
				if($options[$n.'_schedule_type_selected'] == 'each'){

					$optionsdb[$n.'_schedule_type_selected'] = 'each';
					$optionsdb[$n.'_top_opt_interval']  = $options[$n."_top_opt_interval"];
				}else{

					$optionsdb[$n.'_schedule_type_selected'] = 'custom';
					$optionsdb[$n.'_top_opt_interval']["days"] = $options[$n."_top_schedule_days"];
					$optionsdb[$n.'_top_opt_interval']['times'] = array();

					foreach($options[$n."_time_choice_min"] as $k=>$min){
						$optionsdb[$n.'_top_opt_interval']['times'][] = array("minute"=>$min,"hour"=>$options[$n."_time_choice_hour"][$k]);
					}
					$mins = array();
					$hour = array();
					foreach ($optionsdb[$n.'_top_opt_interval']['times'] as $key => $row) {
						$hour[$key]  = $row['hour'];
						$mins[$key] = $row['minute'];
					}
					array_multisort($hour, SORT_ASC, $mins, SORT_ASC, $optionsdb[$n.'_top_opt_interval']['times']);
					if(count($optionsdb[$n.'_top_opt_interval']['times']) == 0){

						$optionsdb[$n.'_schedule_type_selected'] = 'each';
						$optionsdb[$n.'_top_opt_interval']  = $options[$n."_top_opt_interval"];

					}

				}

			}
			update_option("cwp_top_global_schedule",$optionsdb);
		}


	}
}
if(class_exists('CWP_TOP_Core_PRO')) {
	$CWP_TOP_Core_PRO = new CWP_TOP_Core_PRO;
}