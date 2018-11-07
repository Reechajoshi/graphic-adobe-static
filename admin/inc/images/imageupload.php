<body>

<?php
	if( $_GET['ac'] == 'upl' )
	{
		if( isset( $_FILES ) )
		{
			$upl_cnt = 0;
			foreach( $_FILES as $fl => $fldetail )
			{
				if( $fldetail[ 'error' ] === 0 )
				{
					$s = @getimagesize($fldetail['tmp_name']);
					$m = $s['mime'];
					$width = intval( $s[ 0 ] );
					$height = intval( $s[ 1 ] );
					
					if(($m=='image/jpeg')||($m=='image/gif')||($m=='image/png')||($m=='image/jpg'))
					{
						$flname = $fldetail[ 'name' ];
						$upl_name = $hlp->get_temp_name( $UPL_IMG_DIR );
						$iext = explode('/',$m);
						$fl_name = $upl_name.'.'.$iext[1];
						
						if( move_uploaded_file($fldetail['tmp_name'],$fl_name) && chmod($fl_name,0770))
						{
							$twidth = false;
							$theight = false;
							
							if( $width >= $height )
							{
								$aspect = floatval( $width/$height );
								$twidth = 177;
								$theight = intval( $twidth/$aspect );
							}
							else
							{
								$aspect = floatval( $width/$height );
								$theight = 107;
								$twidth = intval( $theight*$aspect );
							}
							
							if( $twidth && $theight )
							{
								$thumb_name = $UPL_IMG_DIR."thumb".basename( $fl_name );
								exec( "convert -resize ${twidth}x${theight} $fl_name $thumb_name",$ret,$arr );
								if( $ret === false )
									$thumb_name = false;
							}							
							
							if( $hlp->_db->db_query( "insert into images values( '".basename( $upl_name )."','$flname','$fl_name','$thumb_name' );" ) )
								$hlp->echo_ok( $flname.' Upload Succeed','camp_ext' );
							else
							{
								@unlink( $upl_name );
								$hlp->echo_err( $flname.' Upload failed','camp_ext' );
							}	
						}
						else
							$hlp->echo_err( $flname.' Upload failed','camp_ext' );
					}	
				}
			}
		}
	}
	echo("<div style='padding-top:10px;padding-left:15px;'>
			<form method=post action='$me?b=ui&ac=upl' enctype='multipart/form-data' >
				<div name=upltopdiv >
					<div>
						<div style='width:60px;float:left;'>Image :</div>
						<div style='width:230px;float:left;'><input style='width:220px;' type=file name=imfl1 id=imfl1 /></div>
						<div><a href=# style='text-decoration:none;' onClick='CHelper.addImageInput(this,\"upltopdiv\");' >Add more image</a></div>
					</div>
				</div>
				<div style='clear:both;width:400px;padding-top:10px;text-align:center;'><button class=camp >Upload</button></div>
			</form>
		  </div>");	
?>

</body>