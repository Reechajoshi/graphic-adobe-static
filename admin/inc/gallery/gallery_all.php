<body>

<?php

if( isset( $_GET['ac'] ) )
{
	if( $_GET['ac'] == 'cc' )
	{
		$cat = trim( $_POST['catname'] );
		
		if( strlen( $cat )>0 )
		{
			$cid = md5( $cat.date( 'U' ) );
			
			$cnum = intval( $hlp->_db->db_return( 'select max(cnum) cnum from category','cnum' ) )+1;
			$insert_q = " insert into category(cid,cname,cnum) values( '$cid','$cat',$cnum ) ";
			
			if( $hlp->_db->db_query( $insert_q ) )
				$hlp->echo_ok( 'Category Created','tv' );
			else
				$hlp->echo_err( 'Category creation failed','tv' );	
		}		
	}
	else if( $_GET['ac'] == 'd' )
	{
		$cid = $_GET['i'];
		
		if( $hlp->_db->db_query( "delete from catimages where cid = '$cid' ;" ) )
		{
			if( $hlp->_db->db_query( "delete from category where cid = '$cid' ;" ) )
				$hlp->echo_ok( 'Category Deleted','tv' );
			else
				$hlp->echo_err( 'Category deletion failed','tv' );	
		}
		else
			$hlp->echo_err( 'Category deletion failed','tv' );	
	}
	else if( $_GET['ac'] == 'or' )
	{
		foreach( $_POST as $c => $o )
		{
			$hlp->_db->db_query( "update category set cnum=$o where cid='$c';" );
		}
	}
}	
	
echo('
	<div style="padding-bottom:10px;padding-top:20px;">
		<div style="border-bottom:#ccc 1px solid;">
			<form method="post" action='.$me.'?b=ga&ac=cc>
				<div style="padding-left:30px;" >
					Name: &#160; <input type=text name=catname  style="width:300px;"/>&#160;&#160;
					<button type=submit style="width:70px;" class="comp" >Create</button>
				</div>
			</form>
		</div>	
	</div>');
	
	$q = "select cid,cname,(select count(*) from catimages where catimages.cid=category.cid) cnt,cnum from category order by cnum asc";
	$res = $hlp->_db->db_query( $q );
	
	if( $res )
	{
		if( ( $num_rows = intval( $hlp->_db->db_num_rows( $res ) ) ) > 0 )
		{
			$catcnt = 1;
			echo( '<form method="post" action='.$me.'?b=ga&ac=or ><div style="padding-top:20px;padding-left:30px;">');
			while( ( $row = $hlp->_db->db_get( $res ) ) !== false )
			{
				$catid = $row[ 'cid' ];
				$catname = $row[ 'cname' ];
				$imcnt = intval( $row[ 'cnt' ] );
				
				$strOrderCombo = "<select name=$catid >";
				for( $cnt = 1; $cnt <= $num_rows; $cnt++ )
				{
					$sel = '';
					if( $catcnt === $cnt )
						$sel = 'SELECTED';
					$strOrderCombo .= "<option value=$cnt $sel >$cnt</option>";
				}
				$strOrderCombo .= '</select>';
			
				$catcnt++;
			
				echo("<div style='padding-bottom:10px;padding-top:20px;width:950px;' >
						<div style='border-bottom:1px dashed #ccc;' >
							<div style='width:700px;float:left;' ><div style='float:left;width:600px;' >$strOrderCombo &#160;&#160; $catname</div><div >$imcnt Image(s).</div></div>
							<div style='float:left;'>".$hlp->getLinkAncHtml( 'ed',75,'lviewcell asb','#','addDynTabEx("TAB_GALLERY","Detail Category","'.$catname.'","Detail of '.$catname.'","'.$me.'?b=gd&i='.$catid.'");',10,'images/ic/idelete.gif',"Detail" )."</div>
							<div style='float:left;'>".$hlp->getLinkAncHtml( 'ed',75,'lviewcell asb','#','addDynTabEx("TAB_GALLERY","Edit Category","'.$catname.'","Edit '.$catname.'","'.$me.'?b=ge&i='.$catid.'");',10,'images/ic/idelete.gif',"Edit" )."</div>
							<div>".$hlp->getLinkAncHtml( 'ed',75,'lviewcell rviewcell asb',$me.'?b=ga&ac=d&i='.$catid,'confirm("Are you sure?")',10,'images/ic/idelete.gif',"Delete" )."</div>
							<div style='clear:both;' />
						</div>	
					</div>");
			}
			echo( '<div style="padding-top:10px;" > <button type=submit style="width:120px;" class="comp" >Change Order</button> </div>' );	
			echo( '</div></form>' );
		}
		else
			echo( '<div style="padding-top:20px;padding-left:30px;">
					No Category added.
				   </div>' );
	}
?>
</body>