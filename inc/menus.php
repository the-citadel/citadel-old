<?php

global $blog_id;

if ($blog_id == 1) {
	register_nav_menus( array(
		'primary' 		=> 'Citadel Main Menu',
		'secondary' 	=> 'Citadel Secondary Menu',
		'social' 		=> 'Citadel Social Menu',
		'leftfooter' 	=> 'Citadel Left Footer Menu',
		'rightfooter' 	=> 'Citadel Right Footer Menu',
		'legalfooter' 	=> 'Citadel Legal Footer Menu',
		'leftmenu' 		=> 'Citadel Left Menu',
	) );
} else {
	register_nav_menus( array(
		'leftmenu' 		=> 'Citadel Left Menu',
	) );
}