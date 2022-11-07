var editor_config = {
    path_absolute: "/",
    selector: 'textarea#content',
    relative_urls: false,

    plugins: 'codesample code table lists link image preview fullscreen media',

    codesample_languages: [
        { text: 'HTML/XML', value: 'markup' },
        { text: 'JavaScript', value: 'javascript' },
        { text: 'CSS', value: 'css' },
        { text: 'PHP', value: 'php' },
        { text: 'Python', value: 'python' },
        { text: 'Bash', value: 'bash' },
        { text: 'CSV', value: 'csv' },
        { text: 'GIT', value: 'git' },
        { text: 'REGEX', value: 'regex' },
        { text: 'SASS', value: 'sass' },
        { text: 'SCSS', value: 'scss' },
        { text: 'SQL', value: 'sql' },
        { text: 'Markdown', value: 'markdown' },
        { text: 'LATEX', value: 'latex' },

      ],    

    toolbar: 'codesample | undo redo | bold italic removeformat | alignleft aligncenter alignright alignjustify | indent outdent bullist numlist | link image| preview media fullscreen | code',
    content_css: "/css/app.css",
    content_style: "body {padding: 20px;font-family:Sarabun;}",
    file_picker_callback: function (callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.openUrl({
            url: cmsURL,
            title: 'Filemanager',
            width: x * 0.8,
            height: y * 0.8,
            resizable: "yes",
            close_previous: "no",
            onMessage: (api, message) => {
                callback(message.content);
            }
        });
    }
};

tinymce.init(editor_config);