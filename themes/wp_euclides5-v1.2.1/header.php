<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8" />

	<title><?php ci_e_title(); ?></title>

	<?php // CSS files are loaded via /functions/styles.php ?>

	<?php // JS files are loaded via /functions/scripts.php ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action('after_open_body_tag'); ?>

<div id="wrap">
	<div id="page">

		<header id="header">
			<div id="logo">
				<?php ci_e_logo('', ''); ?>
				<?php ci_e_slogan('<em>', '</em>'); ?>
			</div>

			<nav id="nav">
				<?php 
					if(has_nav_menu('ci_main_menu'))
						wp_nav_menu( array(
							'theme_location' 	=> 'ci_main_menu',
							'fallback_cb' 		=> '',
							'container' 		=> '',
							'menu_id' 			=> '',
							'menu_class' 		=> 'main-nav group'
						));
					else
						wp_page_menu();
				?>
			</nav><!-- #nav -->
		</header><!-- #header -->
