<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Lists</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/github-dark.min.css" rel="stylesheet">

    <style>
        /* code {
            padding-top:0px !important;
        } */
    </style>
</head>

<body>
   
    @include('question.laravel')
    @include('question.mysql')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
    <script>

        window.addEventListener('load', function(){
            hljs.highlightAll();
        })

        const checkAll = document.getElementById('all-permissions');
        const checkboxes = document.querySelectorAll('.permission');

        checkAll.addEventListener('change', function() {
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (!this.checked) {
                    checkAll.checked = false;
                }
            });
        });
    </script>
</body>
</html>