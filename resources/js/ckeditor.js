import { ClassicEditor } from '@ckeditor/ckeditor5-editor-classic';
import { BlockQuote } from '@ckeditor/ckeditor5-block-quote';
import { Bold } from '@ckeditor/ckeditor5-basic-styles';
import { CloudServices } from '@ckeditor/ckeditor5-cloud-services';
import { Code } from '@ckeditor/ckeditor5-basic-styles';
import { CodeBlock } from '@ckeditor/ckeditor5-code-block';
import {Essentials} from '@ckeditor/ckeditor5-essentials';
import { FontSize } from '@ckeditor/ckeditor5-font';
import { Heading } from '@ckeditor/ckeditor5-heading';
import { Image } from '@ckeditor/ckeditor5-image';
import { ImageCaption, ImageStyle, ImageToolbar, ImageUpload } from '@ckeditor/ckeditor5-image';
import Indent from '@ckeditor/ckeditor5-indent/src/indent.js';
import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic.js';
import Link from '@ckeditor/ckeditor5-link/src/link.js';
import List from '@ckeditor/ckeditor5-list/src/list.js';
import MediaEmbed from '@ckeditor/ckeditor5-media-embed/src/mediaembed.js';
import Paragraph from '@ckeditor/ckeditor5-paragraph/src/paragraph.js';
import TextTransformation from '@ckeditor/ckeditor5-typing/src/texttransformation.js';
import { ImageInsert } from '@ckeditor/ckeditor5-image';
import { ImageResizeEditing, ImageResizeHandles } from '@ckeditor/ckeditor5-image';
import { AutoImage } from '@ckeditor/ckeditor5-image';
import { Base64UploadAdapter } from '@ckeditor/ckeditor5-upload';


class Editor extends ClassicEditor {}

Editor.builtinPlugins = [
	BlockQuote,
	Bold,
	CloudServices,
	Code,
	CodeBlock,
	Essentials,
	FontSize,
	Heading,
	Image,
	ImageUpload,
	ImageInsert,
	AutoImage,
	ImageResizeEditing, 
	ImageResizeHandles,
	ImageCaption,
    ImageStyle,
    ImageToolbar,
	Indent,
	Italic,
	Link,
	List,
	MediaEmbed,
	Paragraph,
	TextTransformation,
	Base64UploadAdapter
	// CKFinder
];

Editor.defaultConfig = {
	resizeOptions: [
        {
            name: 'resizeImage:original',
            value: null,
            label: 'Original'
        },
        {
            name: 'resizeImage:40',
            value: '40',
            label: '40%'
        },
        {
            name: 'resizeImage:60',
            value: '60',
            label: '60%'
        }
    ],
	toolbar: {
		items: [
			'heading',
			'|',
			'bold',
			'italic',
			'link',
			'bulletedList',
			'numberedList',
			'|',
			'outdent',
			'indent',
			'|',
			'insertImage',
			'blockQuote',
			'mediaEmbed',
			'undo',
			'redo',
			'fontSize',
			'code',
		],
		shouldNotGroupWhenFull: true,
	},
	image: {
        toolbar: [
            'imageStyle:inline',
            'imageStyle:block',
            'imageStyle:side',
            '|',
            'toggleImageCaption',
            'imageTextAlternative'
        ]
    },
	language: 'en'
};

export default Editor;
