<!DOCTYPE HTML>
<?php include( TEMPLATEPATH . '/includes/get_options.php' ); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<?php if($gazpo_favicon_url){ ?>
	<link rel="shortcut icon" href="<?php echo ($gazpo_favicon_url); ?>" />
	<?php } ?>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />			
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feeds" href="<?php if ($gazpo_rss_url) { echo $gazpo_rss_link; } else { bloginfo('rss2_url'); } ?>" />
	
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,italic,bold" rel="stylesheet" type='text/css' />
		
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>	
	<?php wp_head(); ?>
		
</head>
<body>

<div id="header">
<div class="wrap">
	<div class = "logo">
		<?php if ($gazpo_logo_url){ ?>
		<a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('name');?>">
			<img src="<?php echo $gazpo_logo_url; ?>" alt="<?php bloginfo( 'name' ); ?>" />
		</a>
		<?php }else {?>		
		<div class="text">        
          <h1><a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('name');?>"><?php bloginfo('name');?></a></h1>
        </div>
		<?php } ?>		
	</div>
	<div class = "right">
		<div class = "header-menu">
			<?php wp_nav_menu( array(
					'container' => false,
					'theme_location' => 'header_menu'
				) );
			?>
		</div>
		<div class="twitter">
		<ul id="twitter_update_list">
		<li>
		<?php  
			
			if ($gazpo_twitter_username){
				
				$interval = 3600;
				$stored_tweet = get_option('gazpo_twitter_text');
				
				if((empty($stored_tweet)) OR ($_SERVER['REQUEST_TIME'] > get_option('wellthemes_twitter_cache_time'))) {
					$json = wp_remote_get("http://api.twitter.com/1/statuses/user_timeline.json?screen_name=$gazpo_twitter_username&count=1");
					$data = json_decode($json['body'], true);
					
					foreach($data as $tweets){
						
						$text = $tweets['text'];
						$date = $tweets['created_at'];
						$timeago = sprintf(__('about %s ago', 'gazpo'), human_time_diff(strtotime($date)));	
						$tweet = $text . ' - ' .$timeago;
						
						if (!empty($text)){
							update_option('gazpo_twitter_text', $tweet);	
						}
						
					}
				}
				
				echo get_option('gazpo_twitter_text');
			
			} 
		?>
		</li>
		</ul>
		</div>
	</div>
</div>

</div>


<div id="subheader">
<div class="wrap">
	<div class="main-menu">
		<?php wp_nav_menu( array(
					'container' => false,
					'theme_location' => 'main_menu'
				) );
		?>
	</div>
	<div class="search">		
		<?php $search_text = "Search"; ?> 
			<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/"> 
				<input class="searchfield" type="text" value="<?php echo $search_text; ?>" name="s" id="s" onblur="if (this.value == '') {this.value = '<?php echo $search_text; ?>';}" onfocus="if (this.value == '<?php echo $search_text; ?>') {this.value = '';}" /> 
				<input type="hidden" id="searchsubmit" />
			</form>
	</div>
</div>
</div>

<div id="container">