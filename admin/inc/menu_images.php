<script type="text/javascript"> <!--
<?php
	echo("menuInit = function() { try { 
		var menuid = 'TAB_IMAGES';
		
		var areaTopMargin = 15;
		
		var areaTopMarginCB = function(me,stab)
		{								
			h = \"<div style='overflow:hidden;width:100%;height:\" + areaTopMargin + \";background-color: \" + stab.extraBackdrop + \"'>\";
			h += '</div>';				
			
			return(h);
		};
		
		var doc=document;
		var tabs = new CTabs.tabs(menuid,{
			tabBackground: '#090909',
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
		tabs.addIFrameTab(menuid + 'all',{ name: 'All', txtColor: '#fff', iframeURL:'$me?b=vi', tabLImage: 'images/tabs/tabl_camp.gif', tabTImage: 'images/tabs/tabt_camp.gif', tabRImage: 'images/tabs/tabr_camp.gif', extraBackdrop: '#090909', borderSelect: '#090909 2px solid'});
		tabs.addIFrameTab(menuid + 'upload',{ name: 'Upload', txtColor: '#fff', iframeURL:'$me?b=ui', tabLImage: 'images/tabs/tabl_camp.gif', tabTImage: 'images/tabs/tabt_camp.gif', tabRImage: 'images/tabs/tabr_camp.gif', extraBackdrop: '#090909', borderSelect: '#090909 2px solid'});
		doc.body.innerHTML=tabs.getHTML(0);
	} catch(e) { } } ");
?>
// --></script>

