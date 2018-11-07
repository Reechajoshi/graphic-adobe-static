<?php
	if( isset( $_GET['i'] ) )
	{
		$cid = $_GET['i'];
		
		if( intval( $hlp->_db->db_return( "select count(*) num from category where cid = '$cid'",'num' ) ) === 1 )
		{
			if( isset( $_GET['ac'] ) )
			{
				if( $_GET['ac'] == 'ai' )
				{
					$imgs = array();
					foreach ( $_POST as $k => $v )
					{
						if( strpos( $k,'imgcombo' ) === 0 )
							$imgs[ $v ] =  true;
					}
					
					$str = '';
					$cnt = 0;
					foreach ( $imgs as $im => $v )
					{
						$str .= ( ( $cnt++>0 )?(','):('') )."('$cid','$im')";
					}
					
					$str = "insert into catimages values $str";
					
					if( $hlp->_db->db_query( $str ) )
						$hlp->echo_ok( 'Images Added','tv' );
					else
						$hlp->echo_err( 'Image Add Failed','tv' );	
				}
				else if(  $_GET['ac'] == 'di'  )
				{
					$im = $_GET['im'];
					
					$q = "delete from catimages where cid='$cid' and iid='$im';";
					
					if( $hlp->_db->db_query( $q ) )
						$hlp->echo_ok( 'Image Removed','tv' );
					else
						$hlp->echo_err( 'Image Remove Failed','tv' );	
				}
			}	
		}
		
		$imlist = $hlp->getUnAddedImages( $cid,'imgcombo1' );
		
		if( $imlist !== false )
		{
			echo( '<div	style="padding-top:20px;padding-left:30px;">
						<form method=post action='.$me.'?b=ge&i='.$cid.'&ac=ai >
							<div name="addparent" >
								<div>
									<div style="float:left;width:80px;">Add Image: </div>
									<div >'.$imlist.' &#160; &#160; <a style="text-decoration:none;" href="#" onClick="CHelper.addCatgoryImageDiv(this,\'addparent\')">Add</a></div>
								</div>	
							</div>
							<div style="padding-top:20px;padding-left:120px;" ><button type=submit class="comp" style="width:70px;" >Add</button></div>
						</form>
				   </div>' );
		}
		else
			echo( '<div	style="padding-top:20px;padding-left:30px;">
						<div name="addparent" >
							All Images Are Already added.
						</div>
				   </div>' );
				   
		$res = $hlp->_db->db_query( "select iname,iid from images where iid in ( select c.iid from catimages c where cid='$cid' );" );
		
		if( $res )
		{
			if( $hlp->_db->db_num_rows( $res ) > 0 )
			{
				echo( '<div	style="border-top:1px solid #ccc;width:800px;padding-top:20px;padding-left:30px;">');
				while( ( $row = $hlp->_db->db_get( $res ) ) !== false )
				{
					$iname = $row['iname'];
					$iid = $row['iid'];
					$iuri = $IMG_URL.base64_encode( $iid );
					
					echo("<div style='padding-top:20px;' >
							<div style='float:left;width:200px;'><img height='92' width='172' alt='$iname' src='$iuri' ></div>
							<div style='float:left;'><b>$iname</b>&#160;&#160;</div>
							<div style='padding-left:10px;'>".$hlp->getLinkAncHtml( 'del',75,'lviewcell rviewcell asb',$me.'?b=ge&i='.$cid.'&ac=di&im='.$iid,'confirm("Are you sure?")',10,'images/ic/idelete.gif',"Delete" )."</div>
							<div style='clear:both;padding-top:10px;border-bottom:1px dashed #ccc;width:500px;' />
						</div>");
				}
				echo( '</div>' );
			}
			else
				echo( '<div	style="border-top:1px solid #ccc;width:800px;padding-top:20px;padding-left:30px;">No Images Added.</div>');
		}
	}
?>