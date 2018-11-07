<?php
	//fnqx = actual id
	//tnqx = thumbnail should be echoed
	if( isset( $_GET['fnqx'] ) )
	{
		include('admin/conf/vars.php');
		include('admin/php/class.helper.php');
		
		$hlp = new CHelp();
	
		$iid = base64_decode( $_GET['fnqx'] );
		
		if( ( $result = $hlp->_db->db_return( "select concat(ipath,'#_#',iname,'#_#',ifnull(ithumbnail,'') ) i from images where iid = '$iid';",'i' ) ) !== false )
		{
			$reEx = explode( '#_#',$result );
			$path = $reEx[0];
			$iname = $reEx[1];
			$ithumbnail = $reEx[2];
			
			if( isset( $_GET['tnqx'] ) )
				$path = $ithumbnail;
				
			if( file_exists( $path ) )
			{
				$s = @getimagesize( $path );
				$m = $s['mime'];
				
				$hlp->echoHeaders( $m,$iname,filesize( $path ) );
				echo( file_get_contents( $path ) );
			}	
		}		
	}
?>