<script type="text/javascript"> <!--
<?php
	echo("menuInit = function() { try { 
		var menuid = 'TAB_TV';
		
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
			userTabControl: false, 
			tabSideIsOn: true,
			tabSideCB: function(me)
			{
				return('<div><a class=awtxt href=# title=Refresh onClick=\"' + me.getJSRun('refSelectedIFrame()') + '\">Refresh</a></div>');
			},
			areaTopMargin: areaTopMargin,
			areaTopMarginCB: areaTopMarginCB
		} );
		tabs.addIFrameTab(menuid + 'intro',{ name: 'Intro', txtColor: '#fff', iframeURL:'$me?b=ti', tabLImage: 'images/tabs/tabl_compose.gif', tabTImage: 'images/tabs/tabt_compose.gif', tabRImage: 'images/tabs/tabr_compose.gif', extraBackdrop: '#060646', borderSelect: '#060646 2px solid'});
		tabs.addIFrameTab(menuid + 'detail',{ name: 'Detail', txtColor: '#fff', iframeURL:'$me?b=td', tabLImage: 'images/tabs/tabl_compose.gif', tabTImage: 'images/tabs/tabt_compose.gif', tabRImage: 'images/tabs/tabr_compose.gif', extraBackdrop: '#060646', borderSelect: '#060646 2px solid'});
		doc.body.innerHTML=tabs.getHTML(0);
	} catch(e) { } } ");
?>
// --></script>

