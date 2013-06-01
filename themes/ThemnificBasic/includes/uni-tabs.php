<script type="text/javascript">
jQuery(document).ready(function(){
  jQuery( '#serinfo li:not(:first)' ).hide();
  
  jQuery('#serinfo-nav li').click(function(e) {
    jQuery('#serinfo li').hide();
    jQuery('#serinfo-nav .current').removeClass("current");
    jQuery(this).addClass('current');
    
    var clicked = $(this).find('a:first').attr('href');
    jQuery('#serinfo ' + clicked).fadeIn('slow');
    e.preventDefault();
  }).eq(0).addClass('current');
});
</script>
<div id="hometab">

<div id="sernav">

<ul id="serinfo-nav" class="indexpost" style="background-image:none">

        <li class="li01"><a href="#serpane0"><?php _e('Latest','themnific');?></a></li>
        <li class="li02"><a href="#serpane1"><?php _e('Popular','themnific');?></a></li>
        <li class="li03" style="width:75px"><a href="#serpane2"><?php _e('Random','themnific');?></a></li>
        <li class="li04" style="width:50px"><a href="#serpane3"><?php _e('Tags','themnific');?></a></li>

</ul>
</div>

<ul id="serinfo">

  		<li id="serpane0">		
        	<?php include (get_template_directory(). "/includes/tabs/tabs-latest.php"); ?>	
  		</li>


  		<li id="serpane1">
        	<?php include (get_template_directory(). "/includes/tabs/tabs-popular.php"); ?>	
  		</li>
        
        
        
     	<li id="serpane2">	
        	<?php include (get_template_directory(). "/includes/tabs/tabs-random.php"); ?>	
        </li>
        
        
        
  		<li id="serpane3">
           <?php wp_tag_cloud('smallest=7&largest=22&'); ?>
        </li>
     



</ul>

</div>