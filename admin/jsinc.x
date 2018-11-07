<?php
	
	if( $include_all )
	{
		include("lib/def.js.php");echo("\n");
		include("lib/tabs.js.php");echo("\n");
	}
		include("lib/util.js.php");echo("\n");
	if( $include_all )
	{
		include("lib/ui.js.php");echo("\n");
		
		include("php/ui.js.php");echo("\n");
		include("php/grid.js.php");echo("\n");
	}	
?>
