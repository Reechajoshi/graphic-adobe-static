<script type="text/javascript"> <!--
<?php
	echo("menuInit = function() { try { 
		var menuid = 'TAB_GALLERY';
		
		var areaTopMargin = 15;
		
		var areaTopMarginCB = function(me,stab)
		{								
			h = \"<div style='overflow:hidden;width:100%;height:\" + areaTopMargin + \";background-color: \" + stab.extraBackdrop + \"'>\";
			h += '</div>';				
			
			return(h);
		};
		
		var doc=document;
		var tabs = new CTabs.tabs(menuid,{
			tabBackground: '#060646',
			useFullArea: true,
			userTabControl: true, 
			tabSideIsOn: true,
			tabSideCB: function(me)
			{
				return('<div><a class=awtxt href=# title=Refresh onClick=\"' + me.getJSRun('refSelectedIFrame()') + '\">Refresh</a></div>');
			},
			areaTopMargin: areaTopMargin,
			areaTopMarginCB: areaTopMarginCB
		} );
		tabs.addIFrameTab(menuid + 'All',{ name: 'All', txtColor: '#fff', iframeURL:'$me?b=ga', tabLImage: 'images/tabs/tabl_compose.gif', tabTImage: 'images/tabs/tabt_compose.gif', tabRImage: 'images/tabs/tabr_compose.gif', extraBackdrop: '#060646', borderSelect: '#060646 2px solid'});
		doc.body.innerHTML=tabs.getHTML(0);
	} catch(e) { } } ");
?>
// --></script>

