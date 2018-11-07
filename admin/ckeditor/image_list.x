<?php
	require('../conf/vars.php');
	require('../php/class.helper.php');
	$hlp = new chelp();
	
	$res = $hlp->_db->db_query('select iid, iname, ipath from images ;');
	$sz = $hlp->_db->db_num_rows($res);
	$cnt = 0;
	if($sz>0)
	{
		echo("[['','']");//important to keep one empty elment ..coz if 1st image is not present then image loader will cause probs and doesnt come up
		while(($row=$hlp->_db->db_get($res)))
		{
			echo(',["'.$row['iname'].'", "'.$IMG_URL.base64_encode($row['iid']).'"]');
			$cnt++;
		}
		echo("]");
	}
	else
		echo("''");
?>