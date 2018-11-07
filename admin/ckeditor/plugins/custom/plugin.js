CKEDITOR.plugins.add('custom',{
	init:function(a)
	{
		var lnCommand = a.addCommand( 'line',{exec:execLine} ),
			blankCommand = a.addCommand( 'expand',{exec:execAddBlank} );
		lnCommand.canUndo=true;
		blankCommand.canUndo=true;
		
		a.ui.addButton( 'Add Line',
		{
			label : 'Add Line',
			command : 'line',
			icon : this.path+'images/a.jpg'
		});
		
		a.ui.addButton( 'Expand',
		{
			label : 'Expand',
			command : 'expand',
			icon : this.path+'images/expand.jpg'
		});
	}
});

var execLine = function(e){
	CKEDITOR.instances.pagehtml.insertHtml( "<div style='background-color: rgb(10, 43, 74); border-bottom: 1px dashed rgb(0, 91, 177);' />" );
}

var execAddBlank = function(e){
	CKEDITOR.instances.pagehtml.setData( CKEDITOR.instances.pagehtml.getData()+"<p>&nbsp;</p>",'','' );
}