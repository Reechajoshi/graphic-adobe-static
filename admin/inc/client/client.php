<body>

<?php
	require("ckeditor/ckeditor.php");
	
	if( $_GET['ac'] == 'clsave' )
	{
		if( $hlp->saveClientHtml( $_POST['pagehtml'] ) )
			$hlp->echo_ok( 'html changed','lists_ext' );
		else
			$hlp->echo_err( 'html change failed','lists_ext' );
	}
	
	$client_html = $hlp->getClientHtml();
	
	echo('<div style="border-bottom:1px #ccc dashed;">');
	
	echo("<form method=post action='$me?a=cl&ac=clsave' >
			<div name=htmlpar style='padding-left:30px;border-bottom;1px #ccc dashed;padding-top:10px;height:400px;'>
				<div style='padding-top:3px;padding-bottom:10px;'>
					<button style='width:70px;' class='lists' onClick=\"CHelper.toggleHomeHtml( this,'viewhtml','edhtml','htmlpar');return false;\" >Edit</button>
				</div>
				<div name='viewhtml' style='width:90%;height:90%;padding-top:7px;border:1px #ccc solid;overflow:auto;'>$client_html</div>
				<div name='edhtml' style='display:none;width:90%;height:90%;padding-top:7px;'>
					<textarea id='pagehtml' name=pagehtml rows='20' cols='80' style='width: 95%'>$client_html</textarea>
				</div>
			</div>
		<form>");
	$toolbar_type = "BasicToolbar";		
	
	$CKEditor1 = new CKEditor();
	$CKEditor1->returnOutput = true;
	
	echo($CKEditor1->replace("pagehtml",array("toolbar"=>$toolbar_type)));	
	echo('</div>');
?>

</body>