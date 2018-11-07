<script type='text/javascript'>
	CHelper = {
		_IMG_INPUT_CNT: 1,
		_IM_FL_SYMBOL: "#_IMFL_#",
		
		_CAT_IMG_CNT: 1,
		_CAT_IMG_NAME: 'catimgbox',
		_CAT_IMG_COMBO_NAME: 'imgcombo',
		_CAT_IMG_BOX_HTML: '<div style="padding-top:10px;padding-left:80px;" > <?php echo( $hlp->getUnAddedImages( $_GET["i"],"imgcombo" ) ) ?> &#160; &#160; <a style="text-decoration:none;" href="#" onClick="CHelper.removeCatgoryImageDiv(this,\'catimgbox\',\'addparent\')">Remove</a></div>',
		
		toggleHomeHtml: function(ob,viewHtml,edHtml,parDivName){
			
			var parDiv = CUtil.getParentByName( ob,parDivName );	
			
			if( parDiv )
			{
				if( ob.innerHTML == 'Edit' )
				{
					CUtil.applyToChildNodes( parDiv, 'DIV', true, function(elm){
						
						if( elm.getAttribute("name") == viewHtml )
							elm.style.display = 'none';
						else if( elm.getAttribute("name") == edHtml )
							elm.style.display = 'block';
					});
					ob.innerHTML = 'Cancel';
					parDiv.style.height = '420px';
				}	
				else
				{
					CUtil.applyToChildNodes( parDiv, 'DIV', true, function(elm){
						
						if( elm.getAttribute("name") == viewHtml )
							elm.style.display = 'block';
						else if( elm.getAttribute("name") == edHtml )
							elm.style.display = 'none';
					});
					ob.innerHTML = 'Edit';
					parDiv.style.height = '350px';
				}	
			}
		},
		
		addImageInput: function(ob,parDivName){
			var parDiv = CUtil.getParentByName( ob,parDivName ),
				imgInputHtml = "<div style='clear:both;padding-top:7px;' name='newfldiv' ><div style='width:60px;float:left;'>&#160;</div><div style='width:230px;float:left;'><input style='width:220px;' type=file name="+CHelper._IM_FL_SYMBOL+" id="+CHelper._IM_FL_SYMBOL+" /></div><div><a href=# style='text-decoration:none;' onClick='CHelper.removeImageInput(this,\""+parDivName+"\",\"newfldiv\");' >Remove</a></div></div>";
			
			if( parDiv )
			{
				CHelper._IMG_INPUT_CNT++;
				var d = document.createElement( "DIV" );
				d.innerHTML = imgInputHtml.replace( CHelper._IM_FL_SYMBOL,"imfl"+CHelper._IMG_INPUT_CNT ).replace( CHelper._IM_FL_SYMBOL,"imfl"+CHelper._IMG_INPUT_CNT )
				parDiv.appendChild( d );
			}
		},
		
		removeImageInput: function(ob,parDivName,newFl){
			var parDiv = CUtil.getParentByName( ob,parDivName ),
				newFlDiv = CUtil.getParentByName( ob,newFl ).parentNode;
				
			if( parDiv && newFlDiv && CHelper._IMG_INPUT_CNT > 1 )
			{
				parDiv.removeChild( newFlDiv );
			}			
		},
		
		addCatgoryImageDiv: function(ob,parDivName){
			var parDiv = CUtil.getParentByName( ob,parDivName );
			
			if( parDiv )
			{
				var d = document.createElement( "DIV" );
				
				CHelper._CAT_IMG_CNT++;
				
				d.setAttribute( 'name', CHelper._CAT_IMG_NAME );
				
				d.innerHTML = CHelper._CAT_IMG_BOX_HTML.replace( CHelper._CAT_IMG_COMBO_NAME,CHelper._CAT_IMG_COMBO_NAME+CHelper._CAT_IMG_CNT );
				parDiv.appendChild( d );
			}
		},
		
		removeCatgoryImageDiv: function(ob,parDivName,mainDivName){
			var parDiv = CUtil.getParentByName( ob,parDivName ),
				mainDiv = CUtil.getParentByName( ob,mainDivName );
			
			if( parDiv && mainDiv && CHelper._CAT_IMG_CNT > 1 )
			{
				mainDiv.removeChild( parDiv );
			}
		}
		
	}
</script>