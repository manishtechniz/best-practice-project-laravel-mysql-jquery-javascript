<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Question Lists</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
    @include('question.laravel')
    @include('question.mysql')
    @include('question.jquery')
    
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

    <script type="module">
        // open recent active question summary
        $("details[data-summary='" + localStorage.getItem("summary") + "']").attr("open", true);

        // Track questions toggles
        $("details").on("toggle", function() {
            if ($(this).attr("open")) {
               localStorage.setItem("summary", $(this).attr("data-summary"));
            } else {
                localStorage.removeItem("summary");
            }
        });

        // Add image prev
        $("#profile_image").change(function(){
            let file = $(this).prop('files')[0];

            const reader = new FileReader();

            reader.onload = function(e) {
                $('#image_prev').attr('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });
        
        // Upload user image
        $("#upload").click(function(){
            let file = $("#profile_image").prop('files')[0];

            if (!!! file) {
                return;
            }

            $("#upload").attr('disabled', true);
            $("#upload").text('Uploading...');

            let formData = new FormData();

            formData.append('image_url', file);

            $.ajax({
                url: "{{ route('update_profile_image') }}",
                
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#image_message').html('<label style="color:green">'+ response.message +'</label>');
                    console.log(response);
                },
                error: function(error) {
                    $('#image_message').html('<label style="color:red">Something went wrong</label>');
                },
                complete: function() {
                    $("#upload").attr('disabled', false);
                    $("#upload").text('Upload');
                }   
            });
        });

        // Run commands
        $(".run").click(async function(){
            let questionIndex = $(this).attr('data-index');

            let target = `#output-${questionIndex}`;

            console.log('click');

            // remove all previous logs
            $(target).html('');

            // prodcide target id for custom log
            let orignalLogFunctionality = editorConsoleLog(target);

            // get editor content
            const editorContent = allViews[questionIndex].state.doc.toString();

            try {
                await eval(editorContent);
            } catch (error) {
                console.log(error);
                $(target).text('Error:' + error);
            }

            resetCustomConsoleLog(orignalLogFunctionality);
        })

        // onload
        $(function(){
            // Set editors on load and after 1 second
            setTimeout(() => setJqueryQuestionsEditors(editorCodes), 1000)
        });

        // Add code to all editors
        function setJqueryQuestionsEditors(editorCodes) {
            editorCodes.forEach((question, index) => {
                let view = allViews[index];

                view.dispatch({
                    changes: {
                        from: 0,
                        to: view.state.doc.length,
                        insert: `${question?.code}`
                    }
                });
            });
        }

        // custom editor console log
        function editorConsoleLog(target = null) {
            if (target === null) {
                return;
            }

            const originalLog = console.log;

            let messageLogs = '';

            // override original console.log
            console.log = function(message) {
                if (typeof message === 'object') {
                    $(`${target}`).append(JSON.stringify(message) + '\n');
                } else {
                    $(`${target}`).append(message + '\n');
                }

                originalLog.apply(console, arguments);
            };

            return originalLog;
        }

        // reset custom console log
        function resetCustomConsoleLog(originalLog) {
            console.log = function(message) {
                originalLog.apply(console, arguments);
            };
        }

    </script>
</body>
</html>