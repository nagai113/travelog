<aside id="sidebar">
	<?php
		if( is_page() and is_active_sidebar('sidebar-pages') )
			dynamic_sidebar('sidebar-right');
		else
			dynamic_sidebar('sidebar-right');
	?>
</aside><!-- #sidebar -->
