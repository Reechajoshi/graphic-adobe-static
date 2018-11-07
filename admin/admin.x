<?php
	header("Expires: Mon, 26 Jul 1990 05:00:00 GMT");
	header("Cache-Control: no-cache");
	header("Pragma: no-cache");
	
	include('conf/vars.php');
	include('php/class.helper.php');

	$hlp = new CHelp();
	
	$me = $_SERVER["PHP_SELF"];
	$SESS_ID = "";
	
	echo('<html><head>');
	
	if( isset( $_GET['a'] ) || isset( $_GET['b'] ) )
	{
		if( $_GET['a'] == 't' )
			require( 'top.html' );
		else
		{	
			$include_all = ( isset( $_GET['a'] ) || ( $_GET['b'] === 'ga' ) );
			
			require( 'head.php' );
			
			if( $_GET['a'] == 'm' )
			{
				require('inc/menu_main.php');
				echo('</head><body onload=menuInit();></body>');
			}
			else if( $_GET['a'] == 'oa' )
			{
				require('js/helper.js');
				echo('</head>');	
				require('inc/avenues/avenues.php');
			}
			else if( $_GET['a'] == 'cl' )
			{
				require('js/helper.js');
				echo('</head>');
				include('inc/client/client.php');
			}
			else if( $_GET['a'] == 'home' )
			{
				require('inc/menu_home.php');
				echo('</head><body onload=menuInit();></body>');	
			}
			else if( $_GET['a'] == 'tv' )
			{
				require('inc/menu_tv.php');
				echo('</head><body onload=menuInit();></body>');	
			}
			else if( $_GET['a'] == 'event' )
			{
				require('inc/menu_event.php');
				echo('</head><body onload=menuInit();></body>');	
			}
			else if( $_GET['a'] == 'wr' )
			{
				require('js/helper.js');
				echo('</head>');	
				require('inc/wr/wr.php');
			}
			else if( $_GET['a'] == 'im' )
			{
				require('inc/menu_images.php');
				echo('</head><body onload=menuInit();></body>');	
			}
			else if( $_GET['a'] == 'g' )
			{
				require('inc/menu_gallery.php');
				echo('</head><body onload=menuInit();></body>');	
			}
			else if( $_GET['a'] == 'ru' )
			{
				require('js/helper.js');
				echo('</head>');
				include('inc/reachus.php');
			}
			else if( $_GET['b'] == 'w' )
			{
				require('js/helper.js');
				echo('</head>');
				include('inc/home/home.php');
			}
			else if( $_GET['b'] == 'ti' )
			{
				require('js/helper.js');
				echo('</head>');
				include('inc/tv/tv.php');
			}
			else if( $_GET['b'] == 'td' )
			{
				require('js/helper.js');
				echo('</head>');
				include('inc/tv/tv_detail.php');
			}
			else if( $_GET['b'] == 'ga' )
			{
				require('js/helper.js');
				echo('</head>');
				include('inc/gallery/gallery_all.php');
			}
			else if( $_GET['b'] == 'ge' )
			{
				require('js/helper.js');
				echo('</head>');
				include('inc/gallery/gallery_edit.php');
			}
			else if( $_GET['b'] == 'gd' )
			{
				require('js/helper.js');
				echo('</head>');
				include('inc/gallery/gallery_detail.php');
			}
			else if( $_GET['b'] == 'ei' )
			{
				require('js/helper.js');
				echo('</head>');
				include('inc/event/event.php');
			}
			else if( $_GET['b'] == 'ed' )
			{
				require('js/helper.js');
				echo('</head>');
				include('inc/event/event_detail.php');
			}
			else if( $_GET['b'] == 'vi' )
			{
				echo('</head>');
				include('inc/images/imageview.php');
			}
			else if( $_GET['b'] == 'ui' )
			{
				require('js/helper.js');
				echo('</head>');
				include('inc/images/imageupload.php');
			}
		}		
	}
	else
	{
		echo("</head><frameset rows='*'>
				<frame src='$me?a=m' frameborder=0 marginheight=0 marginwidth=0 name=fb noresize=noresize scrolling=auto />
			</frameset>");
	}
	echo('</html>');	
?>
