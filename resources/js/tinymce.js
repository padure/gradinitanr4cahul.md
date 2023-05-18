import tinymce from 'tinymce';

// Încarcă plugin-urile și temele dorite pentru TinyMCE
// import 'tinymce/themes/silver';
// import 'tinymce/plugins/lists';
// import 'tinymce/plugins/link';
// ...

// Inițializează TinyMCE
tinymce.init({
    selector: '#blog_construct',
    height: 500,
    plugins: [
        'lists',
        'link',
        // ...
    ],
    toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
});
