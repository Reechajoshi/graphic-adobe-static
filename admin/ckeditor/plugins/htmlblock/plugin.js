CKEDITOR.plugins.add('htmlblock',
{
	init:function(a)
	{
		//CKEDITOR.dialog.add('audio', this.path + 'dialogs/audio.js');
		CKEDITOR.dialog.add( 'htmlBlockDG', function( a )
		{
			return {
				title : 'Html block Dialog',
				resizable : CKEDITOR.DIALOG_RESIZE_BOTH,
				minWidth : 500,
				minHeight : 150,
				onOk : function()
				{
					var dialog = CKEDITOR.dialog.getCurrent(),
						caption = dialog.getContentElement('tab1','blockcaption').getValue(),
						imgUri = dialog.getContentElement('tab1','comboImg').getValue(),
						leftAlign = dialog.getContentElement('tab1','imgAlign').getValue(),
						blocktxt = dialog.getContentElement('tab1','blocktxt').getValue(),
						drawBorder = dialog.getContentElement('tab1','drawBorder').getValue(),
						html = '',
						border = (drawBorder)?('border-bottom: 1px dashed rgb(0, 91, 177);'):('');
						
						if( imgUri.length > 0 )
						{
							if( leftAlign )
								html = '<div style="background-color: rgb(10, 43, 74);'+border+'">'+( (caption.length>0)?('<div class="rh_1">'+caption+':</div>'):('') )+'<div><div style="padding-right: 10px; float: left;"><img height="92" src="'+imgUri+'" width="172" /></div>'+( ( blocktxt.length>0 )?( '<div class="rh">'+blocktxt+'</div>' ):('') )+'</div><div style="clear: both;">&nbsp;</div></div>';
							else
								html = '<div style="background-color: rgb(10, 43, 74);'+border+'">'+( (caption.length>0)?('<div class="rh_1">'+caption+':</div>'):('') )+'<div>'+( ( blocktxt.length>0 )?( '<div class="rh" style="padding-right: 10px; float: left;width:67%;">'+blocktxt+'</div>' ):('') )+'<div ><img height="92" src="'+imgUri+'" width="172" /></div></div><div style="clear: both;">&nbsp;</div></div>';
						}
						else
						{
							html = '<div style="background-color: rgb(10, 43, 74);'+border+'">'+( (caption.length>0)?('<div class="rh_1">'+caption+':</div>'):('') )+( ( blocktxt.length>0 )?( '<div class="rh">'+blocktxt+'</div>' ):('') )+'<div style="clear: both;">&nbsp;</div></div>';
						}
						html += '<p>&nbsp;</p>';
						CKEDITOR.instances.pagehtml.insertHtml(html);
						
				//if( audioUri.length>0 )	
					//CKEDITOR.instances.pagehtml.insertHtml(insertAudioHTML);
				},
				contents : [
				{
					id : 'tab1',
					label : 'Html Block Tab',
					title : 'Add Html Block',
					accessKey : 'B',
					elements : [
						{
						  type : 'text',
						  label : 'Caption',
						  id : 'blockcaption',
						  'default' : '',
						  style : 'width:100%;'
						},	
						{
						  type : 'checkbox',
						  label : 'Image Left Align',
						  id : 'imgAlign',
						  'default':true,
						  style : 'width:20px;'
						},
						{
						  type : 'textarea',
						  label : 'Text',
						  id : 'blocktxt',
						  'default' : '',
						  style : 'width:100%;'
						},	
						{
						  type : 'checkbox',
						  label : 'Draw Bottom Border',
						  id : 'drawBorder',
						  'default':true,
						  style : 'width:20px;'
						}	
					]
				}
				]
			};
		});
		a.addCommand('htmlblock', new CKEDITOR.dialogCommand('htmlBlockDG'));
		a.ui.addButton( 'Html Block',
		{
			label : 'Html Block',
			command : 'htmlblock',
			icon : this.path+'images/a.jpg'
		});
	}
}
);
					