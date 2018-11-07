<body>

<?php

	require("ckeditor/ckeditor.php");
	
	if( $_GET['ac'] == 'rusave' )
	{
		if( $hlp->saveReachUsHtml( $_POST['pagehtml'] ) )
			$hlp->echo_ok( 'html changed','detail_ex' );
		else
			$hlp->echo_err( 'html change failed','detail_ex' );
	}
	
	$ru_html = $hlp->getReachUsHtml();
	
	echo('<div style="border-bottom:1px #ccc dashed;">');
	
	echo("<form method=post action='$me?a=ru&ac=rusave' >
			<div name=htmlpar style='padding-left:30px;border-bottom;1px #ccc dashed;padding-top:10px;height:350px;'>
				<div style='padding-top:3px;padding-bottom:10px;'>
					<button style='width:70px;' class='detail_ex' onClick=\"CHelper.toggleHomeHtml( this,'viewhtml','edhtml','htmlpar');return false;\" >Edit</button>
				</div>
				<div name='viewhtml' style='width:90%;height:300px;padding-top:7px;border:1px #ccc solid;overflow:auto;'>$ru_html</div>
				<div name='edhtml' style='display:none;width:90%;height:300px;padding-top:7px;'>
					<textarea id='pagehtml' name=pagehtml rows='20' cols='80' style='width: 95%'>$ru_html</textarea>
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