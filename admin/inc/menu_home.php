<script type="text/javascript"> <!--
<?php
	echo("menuInit = function() { try { 
		var menuid = 'TAB_HOME';
		
		var areaTopMargin = 15;
		
		var areaTopMarginCB = function(me,stab)
		{								
			h = \"<div style='overflow:hidden;width:100%;height:\" + areaTopMargin + \";background-color: \" + stab.extraBackdrop + \"'>\";
			h += '</div>';				
			
			return(h);
		};
		
		var doc=document;
		var tabs = new CTabs.tabs(menuid,{
			tabBackground: '#C5161D',
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
		tabs.addIFrameTab(menuid + 'welcome',{ name: 'Welcome', txtColor: '#fff', iframeURL:'$me?b=w', tabLImage: 'images/tabs/tabl_main.gif', tabTImage: 'images/tabs/tabt_main.gif', tabRImage: 'images/tabs/tabr_main.gif', extraBackdrop: '#C5161D', borderSelect: '#C5161D 2px solid'});
		doc.body.innerHTML=tabs.getHTML(0);
	} catch(e) { } } ");
?>
// --></script>

