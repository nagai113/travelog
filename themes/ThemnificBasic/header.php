<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<title><?php global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' ); $site_description = get_bloginfo( 'description', 'display' ); echo " | $site_description"; if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s','themnific'), max( $paged, $page ) ); ?></title>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- load main css stylesheet -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />






<?php wp_head(); ?>
<?php themnific_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php themnific_top(); ?>
       

<div id="header">
	<div class="box">
        <div id="logo">
            <a href="<?php  echo home_url(); ?>" title="<?php bloginfo('description'); ?>">
                <img src="<?php echo get_option('themnific_logo');?>" alt="<?php bloginfo('name'); ?>" />
            </a>
        </div>
        	<?php get_template_part('/includes/uni-searchformhead');?>
        
	</div><!--end #header box-->
</div><!--end #header-->


<div id="navigation">
	<div class="boxsp">
		<?php get_template_part('/includes/uni-navigation');?>
	</div><!--end #navigation box-->
<div style="clear: both;"></div>
</div><!--end #navigation-->