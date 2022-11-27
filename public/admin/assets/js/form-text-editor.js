$(function() {
	"use strict";
	
	
	    tinymce.init({
			forced_root_block : "",
			selector: '#mytextarea',
			entity_encoding: 'raw',
				plugins: [
					'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
					'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks','code',
					'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
				],
				toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
					'alignleft aligncenter alignright alignjustify | ' +
					'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help',
		});
	
	    tinymce.init({
		  selector: '#disclaimer',
		  entity_encoding: 'raw',
				plugins: [
					'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
					'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks','code',
					'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
				],
				toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
					'alignleft aligncenter alignright alignjustify | ' +
					'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help',
		});

	    tinymce.init({
			forced_root_block : "",
		  	selector: '#serviceDocs',
			entity_encoding: 'raw',
			plugins: [
				'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
				'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks','code',
				'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
			],
			toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
				'alignleft aligncenter alignright alignjustify | ' +
				'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help',
		});
	    tinymce.init({
			forced_root_block : "",
		  	selector: '#faq_description',
			entity_encoding: 'raw',
			plugins: [
				'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
				'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks','code',
				'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
			],
			toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
				'alignleft aligncenter alignright alignjustify | ' +
				'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help',

		});
	
	
	});