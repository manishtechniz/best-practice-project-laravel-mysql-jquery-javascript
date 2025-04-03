<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Lists</title>
    @vite('resources/js/app.js')
</head>

<body>
    @include('question.laravel')
    @include('question.mysql')

    <script>
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