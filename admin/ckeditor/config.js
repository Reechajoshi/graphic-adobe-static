﻿/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	config.toolbar_BasicToolbar =
	[
		['Source','-','Save','NewPage','Preview','-','Templates'],
	    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
	    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	    '/',
	    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
	    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
	    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	    ['Link','Unlink','Anchor'],
	    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
	    '/',
	    ['Styles','Format','Font','FontSize'],
	    ['TextColor','BGColor'],
	    ['Maximize', 'ShowBlocks','-','About'],
		'/',
		['addfullname','addfirstname','addlastname','-','unsub','-','addA','addB','addC','-','addMailToF'],
		'/',
		['Html Block','Add Line','Expand']
	];
	
	config.contentsCss = '../../fontstyle.css' ;
	
	CKEDITOR.on( 'dialogDefinition', function( ev )
	{
		// Take the dialog name and its definition from the event data.
		var dialogName = ev.data.name;
		var dialogDefinition = ev.data.definition;
		var imgList = <?php require("image_list.x"); ?>;
		
		if ( dialogName == 'image' || dialogName == 'imagebutton' )
		{
			var c = dialogDefinition.getContents('info');
			var combo = {
				type : "select",
				items : imgList,
				id : "comboImg",
				style:'width:100%',
				label: 'Images',
				onChange: function(){var d = this.getDialog(), v = d.getValueOf("info","comboImg"); if(v.length>0)d.setValueOf("info","txtUrl",v);}
			}
			c.add(combo,'firstElement');
		}
		else if( dialogName == 'htmlBlockDG' )
		{
			var c = dialogDefinition.getContents('tab1');
			var combo = {
				type : "select",
				items : imgList,
				id : "comboImg",
				style:'width:100%',
				label: 'Images',
				onChange: function(){}
			}
			c.add(combo,'imgAlign');
		}
	});
	
	config.extraPlugins = 'htmlblock,custom';
};
