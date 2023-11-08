#
# This is a Plumber API. You can run the API by clicking
# the 'Run API' button above.
#
# Find out more about building APIs with Plumber here:
#
#    https://www.rplumber.io/
#



if (require("languageserver")) {
  require("languageserver")
} else {
  install.packages("languageserver", dependencies = TRUE,
                   repos = "https://cloud.r-project.org")
}

# Introduction ----

# We can create an API to access the model from outside R using a package
# called Plumber.

# STEP 1. Install and Load the Required Packages ----
library(readr)
## stats -----
if (require("stats")) {
  require("stats")
} else {
  install.packages("stats", dependencies = TRUE,
                   repos = "https://cloud.r-project.org")
}

## mlbench ----
if (require("mlbench")) {
  require("mlbench")
} else {
  install.packages("mlbench", dependencies = TRUE,
                   repos = "https://cloud.r-project.org")
}

## caret ----
if (require("caret")) {
  require("caret")
} else {
  install.packages("caret", dependencies = TRUE,
                   repos = "https://cloud.r-project.org")
}

## MASS ----
if (require("MASS")) {
  require("MASS")
} else {
  install.packages("MASS", dependencies = TRUE,
                   repos = "https://cloud.r-project.org")
}

## glmnet ----
if (require("glmnet")) {
  require("glmnet")
} else {
  install.packages("glmnet", dependencies = TRUE,
                   repos = "https://cloud.r-project.org")
}

## e1071 ----
if (require("e1071")) {
  require("e1071")
} else {
  install.packages("e1071", dependencies = TRUE,
                   repos = "https://cloud.r-project.org")
}

## kernlab ----
if (require("kernlab")) {
  require("kernlab")
} else {
  install.packages("kernlab", dependencies = TRUE,
                   repos = "https://cloud.r-project.org")
}

## rpart ----
if (require("rpart")) {
  require("rpart")
} else {
  install.packages("rpart", dependencies = TRUE,
                   repos = "https://cloud.r-project.org")
}
## plumber ----
if (require("plumber")) {
  require("plumber")
} else {
  install.packages("plumber", dependencies = TRUE,
                   repos = "https://cloud.r-project.org")
}



## caret ----
if (require("caret")) {
  require("caret")
} else {
  install.packages("caret", dependencies = TRUE,
                   repos = "https://cloud.r-project.org")
}

library(plumber)

# Create a REST API using Plumber ----
# REST API stands for Representational State Transfer Application Programming
# Interface. It is an architectural style and a set of guidelines for building
# web services that provide interoperability between different systems on the
# internet. RESTful APIs are widely used for creating and consuming web
# services.




loaded_lungcancer_model <- readRDS("./models/saved_lungcancer_model.rds")
#* @apiTitle Lung Cancer Prediction

#* @apiDescription Used to predict whether a patient has Lung cancer or not.
#* @param arg_gender
#* @param arg_age
#* @param arg_smoking
#* @param arg_yellowfingers 
#* @param arg_anxiety
#* @param arg_peerpressure,
#* @param arg_chronic
#* @param arg_fatigue
#* @param arg_allergy
#* @param arg_wheezing
#* @param arg_alcohol
#* @param arg_coughing
#* @param arg_breath
#* @param arg_swallowing
#* @param arg_chestpain

#* @get /lungcancer 


#Predict using a function
predict_lungcancer <-
  function(
    arg_gender,
    arg_age,
    arg_smoking,
    arg_yellowfingers, 
    arg_anxiety,
    arg_peerpressure,
    arg_chronic,
    arg_fatigue,
    arg_allergy,
    arg_wheezing,
    arg_alcohol,
    arg_coughing,
    arg_breath,
    arg_swallowing,
    arg_chestpain 
  ) {
    # Create a data frame using the arguments
    to_be_predicted <-
      data.frame(
        GENDER =         as.character(arg_gender)      ,
        AGE =            as.numeric(arg_age)           ,
        SMOKING =        as.numeric(arg_smoking)       ,
        YELLOW_FINGERS = as.numeric(arg_yellowfingers) ,
        ANXIETY =        as.numeric(arg_anxiety)       ,
        PEER_PRESSURE =  as.numeric(arg_peerpressure)  ,
        CHRONIC_DISEASE =  as.numeric(arg_chronic)       ,
        FATIGUE =        as.numeric(arg_fatigue)       ,
        ALLERGY =        as.numeric(arg_allergy)       ,
        WHEEZING =       as.numeric(arg_wheezing)      ,
        ALCOHOL_CONSUMING =  as.numeric(arg_alcohol)       ,
        COUGHING=        as.numeric(arg_coughing)      ,
        SHORTNESS_OF_BREATH = as.numeric(arg_breath)        ,
        SWALLOWING_DIFFICULTY= as.numeric(arg_swallowing)    ,
        CHEST_PAIN=      as.numeric(arg_chestpain)
      )
    
    # Make a prediction based on the data frame
    predict(loaded_lungcancer_model, to_be_predicted)
    
  }


