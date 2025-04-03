<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Progress</title>
</head>
<body>

<div style="text-align: center; margin-top: 50px;font-size:25px;font-weight:bold">
    
    Total Jobs: <span id="total_jobs">0</span> <br> <br>
    Progress: <span id="progress">0</span>% <br> <br>
    Pending Jobs: <span id="pending_jobs">0</span>  <br> <br>
    Proccessed Jobs: <span id="proccessed_jobs">0</span>  <br> <br>
    Failed jobs: <span id="failed_jobs">0</span>  <br> <br>

    <div id="message"></div>
</div>

<script>
    function checkProgress() {
        let message = document.getElementById('message');

        fetch('{{ route('batch_progress', $batch_id) }}')
            .then(response => response.json())
            .then(data => {   
                let failed = data.data.failedJobs; 
                let remainingProcessedJobs = data.data.totalJobs - failed - data.data.processedJobs; 

                document.getElementById('total_jobs').innerText = data.data.totalJobs;
                document.getElementById('pending_jobs').innerText = data.data.pendingJobs;
                document.getElementById('proccessed_jobs').innerText = data.data.processedJobs;
                document.getElementById('failed_jobs').innerText = failed;
                document.getElementById('progress').innerText = data.data.progress;

                if (data.data.progress < 100 && remainingProcessedJobs > 0) {
                    message.innerHTML= '<span style="color:orange">Please wait ...</span>';
                    setTimeout(checkProgress, 2000);
                } else {
                    checkProgress();
                    message.innerHTML= '<span style="color:green">Batch processing completed!</span>';
                }
            })
            .catch(error => {
                message.innerHTML= '<span style="color:red">Error fetching progress</span>';
                console.error('Error fetching progress:', error);
            });
    }

    checkProgress();
</script>
</body>
</html>