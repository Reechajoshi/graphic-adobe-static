<title>Flying Unicorn</title>
<script type="text/javascript" >
<?php
	include('jsinc.x');
?>
</script>
<link rel="stylesheet" type="text/css" href="styles/ui.css.x">
<link href="../fontstyle.css" rel="stylesheet" type="text/css" />
<?php
	if( $include_all )
	{
		echo('<script type="text/javascript"> <!--
		
			var tabprops = new Array();
			tabprops["Edit Category"] = { tabLImage: "images/tabs/tabl_compose.gif", tabTImage: "images/tabs/tabt_compose.gif", tabRImage: "images/tabs/tabr_compose.gif", borderSelect: "#060646 2px solid", extraBackdrop: "#060646" };
			tabprops["Detail Category"] = { tabLImage: "images/tabs/tabl_compose.gif", tabTImage: "images/tabs/tabt_compose.gif", tabRImage: "images/tabs/tabr_compose.gif", borderSelect: "#060646 2px solid", extraBackdrop: "#060646" };
			
			var addDynTab = function(parentTabID,newTabName,tabTxt,iuri,isNMailer)
			{		
				addDynTabEx(parentTabID,newTabName,"",tabTxt,iuri,isNMailer);				
			}

			var addDynTabEx = function(parentTabID,newTabID,newTabIDFix,tabTxt,iuri,isNMailer)
			{
				var doc = parent.window.document;
				var ptm = parent.window.CTabs.getTabObject(parentTabID);
				var tabc = ptm.getTabIndexFromID(newTabID + newTabIDFix);
				
				if(!tabc)
				{
					var p = { name: tabTxt, txtColor: "#fff", iframeURL: iuri };
					if(CUtil.varok(tabprops[newTabID]))
						for(var i in tabprops[newTabID])
							p[i] = tabprops[newTabID][i];			
					
					var tabc = ptm.addIFrameTab( (newTabID + newTabIDFix) , p);
					ptm.displayNewTab(tabc);
					
					if(CUtil.varok(isNMailer) && isNMailer)
						parent.window.CTabs.regSafeClose(newTabID,_EDITOR_CLOSE_MSG);
				}
				else
					ptm.selectEx(tabc);
			}

			var indTabRef = function(tid,tp)
			{
				var doc = parent.window.document;
				var ptm = parent.window.CTabs.getTabObject(tid);
				ptm.indRefIFrame(0);
			}
			
			CUi.init(document);
			CTabs.init();
			CUi.initMouse();
			// --> </script> ');		
	}
 ?>
