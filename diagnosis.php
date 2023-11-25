
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    body{
        background:black;
    }
    .center{
        display:flex;
        justify-content:center;
        margin:2em;
    }
    .row{
        display:flex;
        flex-direction:row;
    }
    .predict-form{
        background:black;
        color:white;
        padding:2em;
        border:2px solid white;
        border-radius:.4em;
    }
    </style>    
</head>
<body>
    <div class="center">
        <div class="row">
            <div class="predict-form">
            <h2>Your Lung Cancer Diagnosis</h2>
<?php 
session_start(); // Start the session

// Check if diagnosis data is available in the session
if (isset($_SESSION['diagnosis'])) {
    echo $_SESSION['diagnosis']; // Display the diagnosis
} else {
    echo "Diagnosis data not found"; // Display a message if diagnosis data is not available
}
?>
<div>
<a href="/LungCancerprediction"style="border-radius:0;"class="mt-3 btn btn-outline-info"> Make another prediction</a>
</div>

        </div>
     
        </div>
    </div>
</body>
</html>