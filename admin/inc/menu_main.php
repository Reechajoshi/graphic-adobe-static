<script type="text/javascript"> <!--
	menuInit = function()
	{ 
		try {
			var menuid = "TAB_MAIN";
			var doc=document;
			var areaBaseMargin = 50;
			var areaBaseMarginCB = function(me,stab)
			{				
				var h = ("<table width=100% height='"+areaBaseMargin+"px' style='background-color:" + stab.extraBackdrop + "'><tr><td align=right valign=center id=orgtxt> &#160;&#160;&#160;&#160;&#160;&#160;</td></tr></table>");
				return(h);
			};
			
			var areaTopMargin = 25;
			
			var areaTopMarginCB = function(me,stab)
			{		
				var h = "";
				if( stab.id == menuid + "clients" || stab.id == menuid + "weare" || stab.id == menuid + "reachus" || stab.id == menuid + "avenues" )
				{
					h = "<div style='overflow:hidden;width:100%;height:" + areaTopMargin + ";background-color: " + stab.extraBackdrop + "'>";
					h += "<table border=0 cellpadding=0 cellspacing=0 width=100% height=100%><tr><td width=100% align=right valign=middle>";
					h += "<a class=awtxt href=# title=Refresh onClick=\"" + me.getJSRun('refSelectedIFrame()') + "\">Refresh</a>";					
					h += "</td></tr></table>"					
					h += "</div>";
				}
				return(h);
			};
			
			var tabSideCB = function(me)
			{
				//h = '<div class=gencon style="width:100px"><div class=asb >User: <?php echo($UNAME); ?> </div><div class=asb></div></div>';
				h = '<div class=gencon style="width:150px;"><div class="asb" id=gtxt style="padding-right:10px">Flying Unicorn Admin</div></div>';
				return(h);
			}
			
			var tabs = new CTabs.tabs(menuid,{ tabBackground: 'transparent', useFullArea: true, tabViewWidthOffset: 10, areaTopMargin: areaTopMargin, areaTopMarginCB: areaTopMarginCB, areaBaseMargin: areaBaseMargin, areaBaseMarginCB: areaBaseMarginCB, tabSideIsOn: true, tabSideCB: tabSideCB });
			
			tabs.addIFrameTab(menuid + "Home",{ name: "Home", txtColor: "#fff", iframeURL:"admin.x?a=home", tabLImage: "images/tabs/tabl_main.gif", tabTImage: "images/tabs/tabt_main.gif", tabRImage: "images/tabs/tabr_main.gif", borderSelect: "#C5161D 5px solid", extraBackdrop: "#C5161D" } );
			tabs.addIFrameTab(menuid + "tv",{ name: "TV", txtColor: "#fff", iframeURL:"admin.x?a=tv", tabLImage: "images/tabs/tabl_compose.gif", tabTImage: "images/tabs/tabt_compose.gif", tabRImage: "images/tabs/tabr_compose.gif", borderSelect: "#060646 5px solid", extraBackdrop: "#060646" } );
			tabs.addIFrameTab(menuid + "events",{ name: "Events", txtColor: "#fff", iframeURL:"admin.x?a=event", tabLImage: "images/tabs/tabl_shop.gif", tabTImage: "images/tabs/tabt_shop.gif", tabRImage: "images/tabs/tabr_shop.gif", borderSelect: "#008000 5px solid", extraBackdrop: "#008000" } );
			tabs.addIFrameTab(menuid + "weare",{ name: "We Are", txtColor: "#fff", iframeURL:"admin.x?a=wr", tabLImage: "images/tabs/tabl_admin.gif", tabTImage: "images/tabs/tabt_admin.gif", tabRImage: "images/tabs/tabr_admin.gif", borderSelect: "#F37022 5px solid", extraBackdrop: "#F37022" } );
			tabs.addIFrameTab(menuid + "avenues",{ name: "Other Avenues", txtColor: "#fff", iframeURL:"admin.x?a=oa", tabLImage: "images/tabs/tabl_camp.gif", tabTImage: "images/tabs/tabt_camp.gif", tabRImage: "images/tabs/tabr_camp.gif", borderSelect: "#090909 5px solid", extraBackdrop: "#090909" } );
			tabs.addIFrameTab(menuid + "clients",{ name: "Clients", txtColor: "#fff", iframeURL:"admin.x?a=cl", tabLImage: "images/tabs/tabl_lists.gif", tabTImage: "images/tabs/tabt_lists.gif", tabRImage: "images/tabs/tabr_lists.gif", borderSelect: "#876E52 5px solid", extraBackdrop: "#876E52" } );
			tabs.addIFrameTab(menuid + "gallery",{ name: "Gallery", txtColor: "#fff", iframeURL:"admin.x?a=g", tabLImage: "images/tabs/tabl_compose.gif", tabTImage: "images/tabs/tabt_compose.gif", tabRImage: "images/tabs/tabr_compose.gif", borderSelect: "#060646 5px solid", extraBackdrop: "#060646" } );
			tabs.addIFrameTab(menuid + "reachus",{ name: "Reach Us", txtColor: "#fff", iframeURL:"admin.x?a=ru", tabLImage: "images/tabs/tabl_shop.gif", tabTImage: "images/tabs/tabt_shop.gif", tabRImage: "images/tabs/tabr_shop.gif", borderSelect: "#008000 5px solid", extraBackdrop: "#008000" } );
			tabs.addIFrameTab(menuid + "images",{ name: "Images", txtColor: "#fff", iframeURL:"admin.x?a=im", tabLImage: "images/tabs/tabl_camp.gif", tabTImage: "images/tabs/tabt_camp.gif", tabRImage: "images/tabs/tabr_camp.gif", borderSelect: "#090909 5px solid", extraBackdrop: "#090909" } );
			doc.body.innerHTML=tabs.getHTML(0);
		} catch(e) { alert(e.message);}
	}
// --></script>
