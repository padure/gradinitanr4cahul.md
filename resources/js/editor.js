import Editor from './ckeditor';


Editor
    .create(document.querySelector('#event_construct'))
    .catch(error => {
        console.error(error);
    });