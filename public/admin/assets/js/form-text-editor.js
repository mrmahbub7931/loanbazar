$(function() {
	"use strict";
	
	
	    tinymce.init({
			forced_root_block : "",
			selector: '#mytextarea',
			entity_encoding: 'raw',
				plugins: [
					'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
					'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks','image','code',
					'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
				],
				toolbar: 'undo redo |link image| code formatpainter casechange blocks | bold italic backcolor | ' +
					'alignleft aligncenter alignright alignjustify | ' +
					'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help',
				image_title: true,
				automatic_uploads: true,
				file_picker_types: 'image',
				/* and here's our custom image picker*/
				file_picker_callback: function (cb, value, meta) {
				    var input = document.createElement('input');
				    input.setAttribute('type', 'file');
				    input.setAttribute('accept', 'image/*');

				    /*
				      Note: In modern browsers input[type="file"] is functional without
				      even adding it to the DOM, but that might not be the case in some older
				      or quirky browsers like IE, so you might want to add it to the DOM
				      just in case, and visually hide it. And do not forget do remove it
				      once you do not need it anymore.
				    */

				    input.onchange = function () {
				        var file = this.files[0];

				        var reader = new FileReader();
				        reader.onload = function () {
				            /*
				              Note: Now we need to register the blob in TinyMCEs image blob
				              registry. In the next release this part hopefully won't be
				              necessary, as we are looking to handle it internally.
				            */
				            var id = 'blobid' + (new Date()).getTime();
				            var blobCache = tinymce.activeEditor.editorUpload.blobCache;
				            var base64 = reader.result.split(',')[1];
				            var blobInfo = blobCache.create(id, file, base64);
				            blobCache.add(blobInfo);

				            /* call the callback and populate the Title field with the file name */
				            cb(blobInfo.blobUri(), {
				                title: file.name
				            });
				        };
				        reader.readAsDataURL(file);
				    };

				    input.click();
				},
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