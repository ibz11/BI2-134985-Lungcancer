<?php
session_start();
# *****************************************************************************
# Lab 14: Consume data from the Plumber API Output (using PHP) ----
#
# Course Code: BBT4206
# Course Name: Business Intelligence II
# Semester Duration: 21st August 2023 to 28th November 2023
#
# Lecturer: Allan Omondi
# Contact: aomondi [at] strathmore.edu
#
# Note: The lecture contains both theory and practice. This file forms part of
#       the practice. It has required lab work submissions that are graded for
#       coursework marks.
#
# License: GNU GPL-3.0-or-later
# See LICENSE file for licensing information.
# *****************************************************************************

// Full documentation of the client URL (cURL) library: https://www.php.net/manual/en/book.curl.php

// STEP 1: Set the API endpoint URL
// $apiUrl = 'http://127.0.0.1:5022/diabetes';
$apiUrl = 'http://127.0.0.1:4029/lungcancer';

// Initiate a new cURL session/resource
$curl = curl_init();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
 
// STEP 2: Set the values of the parameters to pass to the model ----
/*
// The prediction should be "positive" for diabetes
$arg_pregnant = 1;
$arg_glucose = 148;
$arg_pressure = 72;
$arg_triceps = 35;
$arg_insulin = 0;
$arg_mass = 33.6;
$arg_pedigree = 0.627;
$arg_age = 50;
*/ 









// The prediction should be "negative" for diabetes
$arg_pregnant = 1;
$arg_glucose = 85;
$arg_pressure = 66;
$arg_triceps = 29;
$arg_insulin = 0;
$arg_mass = 26.6;
$arg_pedigree = 0.351;
$arg_age = 31;



$gender=$_POST['gender'];
$age=$_POST['age'];
$smoking=$_POST['smoking'];
$yellowfingers=$_POST['yellowfingers'];
$anxiety=$_POST['anxiety'];
$peerpressure=$_POST['peerpressure'];
$chronic=$_POST['chronic'];
$fatigue=$_POST['fatigue'];
$allergy=$_POST['allergy'];
$wheezing=$_POST['wheezing'];
$alcohol=$_POST['alcohol'];
$coughing=$_POST['coughing'];
$breath=$_POST['breath'];
$swallowing=$_POST['swallowing'];
$chestpain=$_POST['chestpain'];



$params = array(
                'arg_gender' => $gender, 
                'arg_age' => $age,
                'arg_smoking' => $smoking, 
                'arg_yellowfingers' => $yellowfingers,
                'arg_anxiety' => $anxiety,
                'arg_chronic' => $chronic,
                'arg_peerpressure' => $peerpressure,
                'arg-chronic' => $chronic,
                'arg_fatigue' => $fatigue,
                'arg_allergy' => $allergy,
                'arg_wheezing' => $wheezing,
                'arg_alcohol' => $alcohol,
                'arg_coughing' => $coughing,
                'arg_breath' => $breath,
                'arg_swallowing' => $swallowing,
                'arg_chestpain' => $chestpain,
                

             

               
            );

// STEP 3: Set the cURL options
// CURLOPT_RETURNTRANSFER: true to return the transfer as a string of the
// return value of curl_exec() instead of outputting it directly.
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$apiUrl = $apiUrl . '?' . http_build_query($params);
curl_setopt($curl, CURLOPT_URL, $apiUrl);

// For testing:
// echo "The generated URL sent to the API is:<br>".$apiUrl."<br><br>";

// Make a GET request
$response = curl_exec($curl);

// Check for cURL errors
if (curl_errno($curl)) {
    $error = curl_error($curl);
    // Handle the error appropriately
    die("cURL Error: $error");
}

// Close cURL session/resource
curl_close($curl);

// Process the response
// echo "<br>The predicted output in JSON format is:<br>" . var_dump($response) . "<br><br>";

// Decode the JSON into normal text
$data = json_decode($response, true);

// echo "<br>The predicted output in decoded JSON format is:<br>" . var_dump($data) . "<br><br>";
$diagnosis;
// Check if the response was successful
if (isset($data['0'])) {
    // API request was successful
    // Access the data returned by the API
	// echo "The predicted Lung Cancer status is:<br>";
	echo $data[0];
    if($data[0]=="YES"){
        // echo "<br><br>Unfortunately,You have Lung cancer. Please consult a doctor.";
        // $diagnosis=$data[0];
        $_SESSION['diagnosis']="<h3>Unfortunately,😔 You have Lung cancer. Please consult a doctor.</h3>";
    }
    if($data[0]=="NO")
    {
    // echo "<br><br> Congratulations!! You DO NOT HAVE Lung Cancer";
    $_SESSION['diagnosis']="<h3>Congratulations!! 🎉 You DO NOT HAVE Lung Cancer</h3>";
    }
    header('Location: diagnosis.php');
    // Process the data
	// foreach($data as $repository) {
	// 	echo $repository['0'],$repository['1'],$repository['2'],"<br>";
	// }
} else {
    // API request failed or returned an error
    // Handle the error appropriately
    echo "API Error: " . $data['message'];
}
}






// REQUIRED LAB WORK SUBMISSION:
/*
Create a form in the web user interface to post the parameter values
(e.g., $arg_pregnant, $arg_glucose, etc.) instead of setting them manually
in Line 22-49.
*/
?>