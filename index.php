<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ML</title>
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
    .input-section{
display:flex;
flex-direction:row;
/* justify-content:space-around; */
    }
input[type="radio"]{
    width:1em;
}
input[type="radio"]:hover {
background:blue;
}
</style>
</head>

<body>
    <div class="center">
        <div class="row">
        
        <form class="predict-form"action="predict.php" method="POST">
        <div style="border:1px solid white; padding:1em; border-radius:.3em; margin:1em;">
        <h2>Lung Cancer Prediction</h2>
        </div>

        <!-- Input 1 -->
        <div class="input-section m-1">
        <h5 >Select your Gender</h5>
        </div>
        <div class="input-section m-1">
        <label for="" class="m-2">Male</label>
        <input type="radio" name="gender" value="M">

        <label for="" class="m-2">Female</label>
        <input type="radio" name="gender" value="F">
        </div>
        <!-- End of input -->



        <!-- Input 2 -->
        <div class="input-section m-1">
        <h5 >Your age</h5>
        </div>
        <div class="input-section m-1">
        
        <input type="number" class="form-control" placeholder="Your age" name="age" value="M">

        </div>
        <!-- End of input -->


        <!-- Input 3 -->
        <div class="input-section mt-3 m-1">
        <h5 >Do you smoke?</h5>
        </div>
        <div class="input-section m-1">

        <label for="" class="m-2">Yes</label>
        <input type="radio" name="smoking" value="2">

        <label for="" class="m-2">No</label>
        <input type="radio" name="smoking" value="1">

        </div>
        <!-- End of input -->

          <!-- Input 4 -->
        <div class="input-section mt-3 m-1">
        <h5 >Do you have yellow fingers?</h5>
        </div>
        <div class="input-section m-1">

        <label for="" class="m-2">Yes</label>
        <input type="radio" name="yellowfingers" value="2">

        <label for="" class="m-2">No</label>
        <input type="radio" name="yellowfingers" value="1">

        </div>
        <!-- End of input -->


        <!-- Input 5  -->
        <div class="input-section mt-3 m-1">
        <h5 >Do you have anxiety?</h5>
        </div>
        <div class="input-section m-1">

        <label for="" class="m-2">Yes</label>
        <input type="radio" name="anxiety" value="2">

        <label for="" class="m-2">No</label>
        <input type="radio" name="anxiety" value="1">

        </div>
        <!-- End of input -->


        
        <!-- Input  6-->
        <div class="input-section mt-3 m-1">
        <h5 >Are you easily affected by peer pressure?</h5>
        </div>
        <div class="input-section m-1">

        <label for="" class="m-2">Yes</label>
        <input type="radio" name="peerpressure" value="2">

        <label for="" class="m-2">No</label>
        <input type="radio" name="peerpressure" value="1">

        </div>
        <!-- End of input -->


        <!-- Input 7  -->
        <div class="input-section mt-3 m-1">
        <h5 >Do you suffer from chronic diseases?</h5>
        </div>
        <div class="input-section m-1">

        <label for="" class="m-2">Yes</label>
        <input type="radio" name="chronic" value="2">

        <label for="" class="m-2">No</label>
        <input type="radio" name="chronic" value="1">
        </div>
        <!-- End of input -->

        <!-- Input 8  -->
        <div class="input-section mt-3 m-1">
        <h5 >Do you get fatigued easily and often?</h5>
        </div>
        <div class="input-section m-1">

        <label for="" class="m-2">Yes</label>
        <input type="radio" name="fatigue" value="2">

        <label for="" class="m-2">No</label>
        <input type="radio" name="fatigue" value="1">
        </div>
        <!-- End of input -->


        <!-- Input 9  -->
        <div class="input-section mt-3 m-1">
        <h5 >Are you allergic?</h5>
        </div>
        <div class="input-section m-1">

        <label for="" class="m-2">Yes</label>
        <input type="radio" name="allergy" value="2">

        <label for="" class="m-2">No</label>
        <input type="radio" name="allergy" value="1">
        </div>
        <!-- End of input -->

        <!-- Input 10  -->
        <div class="input-section mt-3 m-1">
        <h5 >Do you wheeze often?</h5>
        </div>
        <div class="input-section m-1">

        <label for="" class="m-2">Yes</label>
        <input type="radio" name="wheezing" value="2">

        <label for="" class="m-2">No</label>
        <input type="radio" name="wheezing" value="1">
        </div>
        <!-- End of input -->


       

        
        <!-- Input 11 -->
        <div class="input-section mt-3 m-1">
        <h5 >Do you drink alcohol?</h5>
        </div>
        <div class="input-section m-1">

        <label for="" class="m-2">Yes</label>
        <input type="radio" name="alcohol" value="2">

        <label for="" class="m-2">No</label>
        <input type="radio" name="alcohol" value="1">
        </div>
        <!-- End of input -->


        
        <!-- Input 12  -->
        <div class="input-section mt-3 m-1">
        <h5 >Do you cough a lot?</h5>
        </div>
        <div class="input-section m-1">

        <label for="" class="m-2">Yes</label>
        <input type="radio" name="coughing" value="2">

        <label for="" class="m-2">No</label>
        <input type="radio" name="coughing" value="1">
        </div>
        <!-- End of input -->

        
        <!-- Input 13 -->
        <div class="input-section mt-3 m-1">
        <h5 >Do you have shortness of breath?</h5>
        </div>
        <div class="input-section m-1">

        <label for="" class="m-2">Yes</label>
        <input type="radio" name="breath" value="2">

        <label for="" class="m-2">No</label>
        <input type="radio" name="breath" value="1">
        </div>
        <!-- End of input -->

        
        <!-- Input 14 -->
        <div class="input-section mt-3 m-1">
        <h5 >Do you have trouble swallowing?</h5>
        </div>
        <div class="input-section m-1">

        <label for="" class="m-2">Yes</label>
        <input type="radio" name="swallowing" value="2">

        <label for="" class="m-2">No</label>
        <input type="radio" name="swallowing" value="1">
        </div>
        <!-- End of input -->
        
        <!-- Input 15 -->
        <div class="input-section mt-3 m-1">
        <h5 >Do you have chest pain?</h5>
        </div>
        <div class="input-section m-1">

        <label for="" class="m-2">Yes</label>
        <input type="radio" name="chestpain" value="2">

        <label for="" class="m-2">No</label>
        <input type="radio" name="chestpain" value="1">
        </div>
        <!-- End of input -->

        <div style="display:flex;justify-content:center;"class="input-section mt-3 m-1">
        <button type="submit" style="border-radius:0;width:100%;" class="btn btn-primary">Predict</button>
        </div>    













        </div>
      </form>   
    </div>



   
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>