<script type="text/javascript"> <!--
<?php
	echo("menuInit = function() { try { 
		var menuid = 'TAB_EVENT';
		
		var areaTopMargin = 15;
		
		var areaTopMarginCB = function(me,stab)
		{								
			h = \"<div style='overflow:hidden;width:100%;height:\" + areaTopMargin + \";background-color: \" + stab.extraBackdrop + \"'>\";
			h += '</div>';				
			
			return(h);
		};
		
		var doc=document;
		var tabs = new CTabs.tabs(menuid,{
			tabBackground: '#008000',
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
		tabs.addIFrameTab(menuid + 'eventintro',{ name: 'Intro', txtColor: '#fff', iframeURL:'$me?b=ei', tabLImage: 'images/tabs/tabl_shop.gif', tabTImage: 'images/tabs/tabt_shop.gif', tabRImage: 'images/tabs/tabr_shop.gif', extraBackdrop: '#008000', borderSelect: '#008000 2px solid'});
		tabs.addIFrameTab(menuid + 'eventdetail',{ name: 'Detail', txtColor: '#fff', iframeURL:'$me?b=ed', tabLImage: 'images/tabs/tabl_shop.gif', tabTImage: 'images/tabs/tabt_shop.gif', tabRImage: 'images/tabs/tabr_shop.gif', extraBackdrop: '#008000', borderSelect: '#008000 2px solid'});
		
		doc.body.innerHTML=tabs.getHTML(0);
	} catch(e) { } } ");
?>
// --></script>

