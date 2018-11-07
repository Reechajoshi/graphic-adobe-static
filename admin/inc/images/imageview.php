<body>

<?php
	if( isset( $_GET[ 'd' ] ) )
	{
		$id = $_GET['i'];
		$ipath = false;
		$ithumbnail = false;
		
		if( intval( $hlp->_db->db_return( "select count(*) cnt from catimages where iid = '$id';",'cnt' ) ) === 0 )
		{
			$res = $hlp->_db->db_query( "select ipath,ithumbnail from images where iid = '$id';" );
			if( $res )
			{
				if( $hlp->_db->db_num_rows( $res ) === 1 )
				{
					$row = $hlp->_db->db_get( $res );
					$ipath = $row['ipath'];
					$ithumbnail = $row['ithumbnail'];
				}	
			}
			
			if( $ipath )
			{
				@unlink( $ipath );
				if( $ithumbnail && strlen( $ithumbnail )>0 )
					@unlink( $ithumbnail );
					
				$hlp->_db->db_query( "delete from images where iid = '$id';" );
				$hlp->echo_ok( 'Image deleted.','camp_ext' );
			}
			else
				$hlp->echo_err( 'Image deletion failed.','camp_ext' );
		}
		else
			$hlp->echo_err( 'Image deletion failed, Gallery is using this image.','camp_ext' );
	}
	$res = $hlp->_db->db_query( "select * from images order by iname ;" );
	if( $res )
	{
		if( $hlp->_db->db_num_rows( $res ) > 0 )	
		{
			while( ( $row = $hlp->_db->db_get( $res ) ) !== false )
			{
				$iname = $row[ 'iname' ];
				$iid = $row[ 'iid' ];
				$ipath = $row[ 'ipath' ];
				$iinfo = getimagesize( $ipath );
				$iw = $iinfo[0];
				$ih = $iinfo[1];
				$iuri = $IMG_URL.base64_encode( $iid );
				$isze = $hlp->format_space( filesize( $ipath ) );
				
				echo('<div class="gencon bviewdash"><div class=gensidemaxblock>');
				
				echo("<img src='$iuri' border=0 height='92' width='172' />");
				/*if($iw>$ih)
				{
					if($iw<$IMG_VIEW_MAX_W)
						echo("<img src='$iuri' border=0 width=".$iw."px />");
					else
						echo("<img src='$iuri' border=0 width=".$IMG_VIEW_MAX_W."px />");
				}
				else
				{
					if($ih<$IMG_VIEW_MAX_H)
						echo("<img src='$iuri' border=0 height=".$ih."px />");
					else
						echo("<img src='$iuri' border=0 height=".$IMG_VIEW_MAX_H."px />");
				}*/
				
				echo('</div><div class=gensidemaxblock id=txt>
					<div class="gencon bviewcell">
						<div class=asb id=txt style="padding-right:5px;"><b>'.$iname.'</b>&#160;('.$isze.')</div>');
						echo($hlp->getLinkAncHtml('delimg',75,'lviewcell asb',$me.'?b=vi&d&i='.$iid,'confirm("Are you sure?")',10,'images/ic/idelete.gif',"Delete"));					
				echo('</div>				
					</div></div>');
			}
		}
	}
	else
		$hlp->echo_err( 'Unable to process ur request now!' );
?>

</body>