<body>
<?php
	require("ckeditor/ckeditor.php");
	
	if( $_GET['ac'] == 'avsave' )
	{
		if( $hlp->saveAvenuesHtml( $_POST['pagehtml'] ) )
			$hlp->echo_ok( 'html changed','camp_ext' );
		else
			$hlp->echo_err( 'html change failed','camp_ext' );
	}
	
	$oa_html = $hlp->getAvenuesHtml();
	
	echo('<div style="border-bottom:1px #ccc dashed;">');
	
	echo("<form method=post action='$me?a=oa&ac=avsave' >
			<div name=htmlpar style='padding-left:30px;border-bottom;1px #ccc dashed;padding-top:10px;height:400px;'>
				<div style='padding-top:3px;padding-bottom:10px;'>
					<button style='width:70px;' class='camp' onClick=\"CHelper.toggleHomeHtml( this,'viewhtml','edhtml','htmlpar');return false;\" >Edit</button>
				</div>
				<div name='viewhtml' style='width:90%;height:90%;padding-top:7px;border:1px #ccc solid;overflow:auto;'>$oa_html</div>
				<div name='edhtml' style='display:none;width:90%;height:90%px;padding-top:7px;'>
					<textarea id='pagehtml' name=pagehtml rows='20' cols='80' style='width: 95%'>$oa_html</textarea>
				</div>
			</div>
		<form>");
	$toolbar_type = "BasicToolbar";		
	
	$CKEditor2 = new CKEditor();
	$CKEditor2->returnOutput = true;
	
	echo($CKEditor2->replace("pagehtml",array("toolbar"=>$toolbar_type)));	
	echo('</div>');
?>
</body>