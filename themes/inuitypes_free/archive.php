<?php 

/* 
   WARNING! DO NOT EDIT THIS FILE!

   BizzThemes framewrok is built with hooks, which are all located in
   library/hooks template directory. Please edit those files to
   customize your design/look, combined with Theme Option Panel 
   in Wordpress backed.

*/

    get_header(); 

    /* 
	    This is ARCHIVE PAGE template displayed according to your settings in
	    theme options panel. You have option to show checked function
       	block sections in order you like of course - now GO TO 
		THEME OPTIONS PANEL TO SET IT UP.
	*/
	
	foreach ($GLOBALS['opt']['bizzthemes_archive_s'] as $key => $value) {
					
		if ( isset($GLOBALS['opt']['bizzthemes_archive_s_'.$key.'']) ) {
						
			eval('bizz_'.$key.'(); ');
							
		}
						
	}

    get_footer(); 

?>
