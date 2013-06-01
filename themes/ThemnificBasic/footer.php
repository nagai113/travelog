
    	<div id="social">
        <div class="box">  
		<?php get_template_part('/includes/uni-social');?>
       	</div>	
		</div>

        
    	<div id="footer">
        
        <div class="box">   
        <?php if (get_option('themnific_dis_foowidgets') <> "true") { ?>
            <?php get_template_part('/includes/uni-bottombox');?>
        <?php } ?>

        
          	<div id="copyright" class="fl">
				<p>&copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?></p>
			</div>
        
        
        	<div id="credit" class="fr">
				<p><?php _e('Powered by','themnific');?> <a href="http://www.wordpress.org">Wordpress</a>. <?php _e('Designed by','themnific');?> <a href="http://themnific.com">Themnific</a></p>
			</div>

		</div>	
        
		</div><!-- /#footer  -->
        


<?php wp_footer(); ?>
<?php themnific_foot(); ?>
</body>
</html>