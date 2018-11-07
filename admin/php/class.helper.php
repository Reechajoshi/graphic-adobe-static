<?php
	
	require('class.db.php');
	
	class chelp
	{   
		var $_db = null;
		
		var $_isIE = false;
		var $_isGecko = false;		
		
		function chelp($dof=true)
		{
			@session_start();
						
			$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
			$this->_isIE = (strpos($ua,"msie")!==false);
			$this->_isGecko = (strpos($ua,"gecko")!==false);
			
			if($dof)
			{
				global $DBN, $UNAME, $UPASS;
				$this->dbinit($DBN,$UNAME,$UPASS);
			}
		}
		
		function dbinit($dbn,$uname,$upass,$die_onerr=true)
		{
			if($this->_db==null)
			{
				if(strlen($dbn)>0)
				{		
					$this->_db = new cdb($dbn,$uname,$upass,$die_onerr);				
				}
			}
		}
		
		function getWelcomeHtml()
		{
			GLOBAL $WELCOME_HTML_SYMBOL;
			return( $this->_db->db_return( "select hcontent from html where hid = '$WELCOME_HTML_SYMBOL';",'hcontent' ) );
		}
		
		function saveWelcomeHtml($welcome_html)
		{
			GLOBAL $WELCOME_HTML_SYMBOL;
			return( $this->saveHtml( $WELCOME_HTML_SYMBOL,$welcome_html ) );
		}
		
		function getReachUsHtml()
		{
			GLOBAL $REACH_US_HTML_SYMBOL;
			return( $this->_db->db_return( "select hcontent from html where hid = '$REACH_US_HTML_SYMBOL';",'hcontent' ) );
		}
		
		function saveReachUsHtml($ru_html)
		{
			GLOBAL $REACH_US_HTML_SYMBOL;
			return( $this->saveHtml( $REACH_US_HTML_SYMBOL,$ru_html ) );
		}
		
		function getTeleProdHtml()
		{
			GLOBAL $TELE_PROD_HTML_SYMBOL;
			return( $this->_db->db_return( "select hcontent from html where hid = '$TELE_PROD_HTML_SYMBOL';",'hcontent' ) );
		}
		
		function saveTeleProdHtml($tele_prod_html)
		{
			GLOBAL $TELE_PROD_HTML_SYMBOL;
			return( $this->saveHtml( $TELE_PROD_HTML_SYMBOL,$tele_prod_html ) );
		}
		
		function getTVDetailHtml()
		{
			GLOBAL $TELE_PROD_DETAIL_HTML_SYMBOL;
			return( $this->_db->db_return( "select hcontent from html where hid = '$TELE_PROD_DETAIL_HTML_SYMBOL';",'hcontent' ) );
		}
		
		function saveTVDetailHtml($tv_det_html)
		{
			GLOBAL $TELE_PROD_DETAIL_HTML_SYMBOL;
			return( $this->saveHtml( $TELE_PROD_DETAIL_HTML_SYMBOL,$tv_det_html ) );
		}
		
		function getCategoryDetailHtml($cid)
		{
			return( $this->_db->db_return( "select cdesc from category where cid = '$cid';",'cdesc' ) );
		}
		
		function saveCategoryDetailHtml($cid,$cat_det_html)
		{
			return( $this->_db->db_query( "update category set cdesc='$cat_det_html' where cid='$cid';" ) );
		}
		
		function getEventHtml()
		{
			GLOBAL $UNICORN_EVENT_HTML_SYMBOL;
			return( $this->_db->db_return( "select hcontent from html where hid = '$UNICORN_EVENT_HTML_SYMBOL';",'hcontent' ) );
		}
		
		function saveEventHtml($event_html)
		{
			GLOBAL $UNICORN_EVENT_HTML_SYMBOL;
			return( $this->saveHtml( $UNICORN_EVENT_HTML_SYMBOL,$event_html ) );
		}
		
		function getEventDetialHtml()
		{
			GLOBAL $UNICORN_EVENT_DETAIL_HTML_SYMBOL;
			return( $this->_db->db_return( "select hcontent from html where hid = '$UNICORN_EVENT_DETAIL_HTML_SYMBOL';",'hcontent' ) );
		}
		
		function saveEventDetailHtml($event_detail_html)
		{
			GLOBAL $UNICORN_EVENT_DETAIL_HTML_SYMBOL;
			return( $this->saveHtml( $UNICORN_EVENT_DETAIL_HTML_SYMBOL,$event_detail_html ) );
		}
		
		function getWeAreHtml()
		{
			GLOBAL $WE_ARE_HTML_SYMBOL;
			return( $this->_db->db_return( "select hcontent from html where hid = '$WE_ARE_HTML_SYMBOL';",'hcontent' ) );
		}
		
		function getAvenuesHtml()
		{
			GLOBAL $AVENUES_HTML_SYMBOL;
			return( $this->_db->db_return( "select hcontent from html where hid = '$AVENUES_HTML_SYMBOL';",'hcontent' ) );
		}
		
		function saveWeAreHtml($cl_html)
		{
			GLOBAL $WE_ARE_HTML_SYMBOL;
			return( $this->saveHtml( $WE_ARE_HTML_SYMBOL,$cl_html ) );
		}
		
		function saveAvenuesHtml($cl_html)
		{
			GLOBAL $AVENUES_HTML_SYMBOL;
			return( $this->saveHtml( $AVENUES_HTML_SYMBOL,$cl_html ) );
		}
		
		function getClientHtml()
		{
			GLOBAL $CLIENT_LIST_HTML_SYMBOL;
			return( $this->_db->db_return( "select hcontent from html where hid = '$CLIENT_LIST_HTML_SYMBOL';",'hcontent' ) );
		}
		
		function saveClientHtml($cl_html)
		{
			GLOBAL $CLIENT_LIST_HTML_SYMBOL;
			return( $this->saveHtml( $CLIENT_LIST_HTML_SYMBOL,$cl_html ) );
		}
		
		function saveHtml( $hid,$html )
		{
			$html = addslashes( $html );
			return( $this->_db->db_query( "insert into html values ('$hid','$html') on duplicate key update hcontent='$html'" ) );
		}
		
		function echo_err($m,$c='txt')
		{
			echo("<div class='$c gencon'> $m </div>");
		}
		
		function echo_ok($m,$c='txt')
		{
			echo("<div class='$c gencon'> $m </div>");
		}
		
		function get_temp_name($wdir)
		{
			$tdir=$wdir.md5(uniqid(time()));
			$trydir=$tdir;
			$ix = 0;
			while(file_exists($trydir))
			{
				$trydir = $tdir.(++$ix);
			}

			return($trydir);
		}
		
		function echoHeaders($flmime,$flname,$flsz)
		{
			header('Content-Description: File Transfer');
			header('Content-Type: '.$flmime );
			header('Content-Disposition: inline; filename="'.$flname.'"');
			header('Content-Transfer-Encoding: binary');
			header('Content-Length: '.$flsz );
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Expires: 0');
		}
		
		function format_space($sp)
		{
			if($sp<1024)
				return($sp.'B');
			else if($sp < 1048576)
				return(round($sp/1024,2).'KB');
			else
				return(round($sp/1048576,2).'MB');
		}
		
		function getLinkAncHtml($aid,$w,$asb,$anc,$clCB,$imgh,$imgl,$txt)
		{
			$clEvnt = 'onclick';
			
			if($anc=='#')
				$clCB .= ';return(false);';
			else if(strpos($clCB,'confirm')===0)
				$clCB = 'if('.$clCB.') { document.location.replace("'.$anc.'"); } ;return(false);';				
			else if($clCB=='')
				$clCB = "document.location.replace(\"$anc\");return(false);";
				
			return("<div class='$asb'>
				<a id=$aid href=# $clEvnt='$clCB' target=_self class=acur>
					<table width=$w border=0><tr><td align=center valign=top><img height=$imgh border=0 src='$imgl' /></td></tr>
					<tr><td align=center valign=top><span id=txt>$txt</span></td></tr></table>
				</a>
			</div>");
		}
		
		function getUnAddedImages($cid,$name)
		{
			$q = "select iid,iname from images where iid not in ( select catimages.iid from catimages where catimages.cid = '$cid' ) order by iname;";
			
			$res = $this->_db->db_query( $q );
			
			if( $res )
			{
				if( $this->_db->db_num_rows( $res ) )
				{
					$retstr = "<select name=$name>";
					while( ( $row = $this->_db->db_get( $res ) ) )	
					{
						$retstr .= '<option value="'.$row['iid'].'">'.$row['iname'].'</option>';
					}
					$retstr .= '</select>';
					
					return( $retstr );
				}
			}
			
			return( false );
		}
		
		function getAllGalleries()
		{
			$res = $this->_db->db_query( 'select cname,cid from category order by cnum asc;' );
			if( $res )
			{
				if( $this->_db->db_num_rows( $res ) > 0 )
				{
					$str = '<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tbody>';

					while( ( $row = $this->_db->db_get( $res ) ) !== false )
					{
						$cname = $row[ 'cname' ];
						$cid = $row[ 'cid' ];
						
						$str .= '<tr>
									<td width="6%">
										&nbsp;</td>
									<td align="center" valign="middle" width="7%">
										<strong><img height="9" src="images/bullet.png" width="10" /></strong></td>
									<td class="rh" width="87%">
										<a class=rh href="frame_gallery.html?i='.$cid.'" style="text-decoration:none;cursor:crosshair;cursor:pointer;" >'.$cname.'</a></td>
								</tr>';
					}
					
					$str .=	'</tbody>
						</table>';
						
					return( $str );	
				}
			}
		}
	}
?>
