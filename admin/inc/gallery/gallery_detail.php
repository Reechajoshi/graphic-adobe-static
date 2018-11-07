<body>

<?php
	if( isset( $_GET['i'] ) )
	{
		$cid = $_GET['i'];
		
		require("ckeditor/ckeditor.php");
		
		if( $_GET['ac'] == 'dsave' )
		{
			if( $hlp->saveCategoryDetailHtml( $cid,$_POST['pagehtml'] ) )
				$hlp->echo_ok( 'Detail changed','tv' );
			else
				$hlp->echo_err( 'Detail change failed','tv' );
		}
		
		$cat_detail_html = $hlp->getCategoryDetailHtml( $cid );
		
		echo('<div style="border-bottom:1px #ccc dashed;">');
		
		echo("<form method=post action='$me?b=gd&i=${cid}&ac=dsave' >
				<div name=htmlpar style='padding-left:30px;border-bottom;1px #ccc dashed;padding-top:10px;height:400px;'>
					<div style='padding-top:3px;padding-bottom:10px;'>
						<button style='width:70px;' class='comp' onClick=\"CHelper.toggleHomeHtml( this,'viewhtml','edhtml','htmlpar');return false;\" >Edit</button>
					</div>
					<div name='viewhtml' style='width:90%;height:90%;padding-top:7px;border:1px #ccc solid;overflow:auto;'>$cat_detail_html</div>
					<div name='edhtml' style='display:none;width:90%;height:90%;padding-top:7px;'>
						<textarea id='pagehtml' name=pagehtml rows='20' cols='80' style='width: 95%'>$cat_detail_html</textarea>
					</div>
				</div>
			<form>");
		$toolbar_type = "BasicToolbar";		
		
		$CKEditor2 = new CKEditor();
		$CKEditor2->returnOutput = true;
		
		echo($CKEditor2->replace("pagehtml",array("toolbar"=>$toolbar_type)));	
		echo('</div>');
	}	
	
?>

</body>