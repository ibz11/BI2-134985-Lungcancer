# Consider a library as the location where packages are stored.
# Execute the following command to list all the libraries available in your
# computer:
.libPaths()

# One of the libraries should be a folder inside the project if you are using
# renv

# Then execute the following command to see which packages are available in
# each library:
lapply(.libPaths(), list.files)



###Install language server

if (require("languageserver")) {
  require("languageserver")
} else {
  install.packages("languageserver", dependencies = TRUE,
                   repos = "https://cloud.r-project.org")
}

# Introduction ----
#The algorithm that is used is the KNN algorithm with caret

# STEP 1. Install and Load the Required Packages below ----
library(readr)
## stats ----
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

# Read the dataset with spaces in column names
lung_cancer <- read_csv("data/survey lung cancer.csv",
                        
                        col_types = cols(
                          GENDER = col_character(),
                          AGE = col_integer(),
                          SMOKING = col_integer(),
                          YELLOW_FINGERS = col_integer(),
                          ANXIETY = col_integer(),
                          PEER_PRESSURE = col_integer(),
                          CHRONIC_DISEASE = col_integer(),
                          FATIGUE = col_integer(),
                          ALLERGY = col_integer(),
                          WHEEZING = col_integer(),
                          ALCOHOL_CONSUMING = col_integer(),
                          COUGHING = col_integer(),
                          SHORTNESS_OF_BREATH = col_integer(),
                          SWALLOWING_DIFFICULTY = col_integer(),
                          CHEST_PAIN = col_integer(),
                          LUNG_CANCER = col_factor(levels = c("YES", "NO"))
                        ))

data(lung_cancer)
# Split the dataset
set.seed(7)
train_index <- createDataPartition(lung_cancer$LUNG_CANCER, p = 0.8, list = FALSE)
lung_cancer_train <- lung_cancer[train_index, ]
lung_cancer_test <- lung_cancer[-train_index, ]

# Train the model
train_control <- trainControl(method = "cv", number = 5)
lung_caret_model_knn <- train(LUNG_CANCER ~ ., data = lung_cancer_train,
                              method = "knn", metric = "Accuracy",
                              preProcess = c("center", "scale"),
                              trControl = train_control)

# Display model details
print(lung_caret_model_knn)

# Make predictions
predictions <- predict(lung_caret_model_knn, lung_cancer_test)

# Evaluate the model
confusion_matrix <- confusionMatrix(predictions, lung_cancer_test$LUNG_CANCER)
print(confusion_matrix)

# Save and load the model
saveRDS(lung_caret_model_knn, "./models/saved_lungcancer_model.rds")
loaded_lungcancer_model <- readRDS("./models/saved_lungcancer_model.rds")
print(loaded_lungcancer_model)

# Create a data frame for predictions
to_be_predicted <- data.frame(
  GENDER = 'M',
  AGE = 32,
  SMOKING = 2,
  YELLOW_FINGERS = 1,
  ANXIETY = 2,
  PEER_PRESSURE = 1,
  CHRONIC_DISEASE = 2,
  FATIGUE = 1,
  ALLERGY = 2,
  WHEEZING = 2,
  ALCOHOL_CONSUMING = 2,
  COUGHING=2,
  SHORTNESS_OF_BREATH = 1,
  SWALLOWING_DIFFICULTY = 1,
  CHEST_PAIN = 2
)

to_be_predicted_two <- data.frame(
  GENDER = 'M',
  AGE = 32,
  SMOKING = 1,
  YELLOW_FINGERS = 1,
  ANXIETY = 1,
  PEER_PRESSURE = 1,
  CHRONIC_DISEASE = 1,
  FATIGUE = 1,
  ALLERGY = 1,
  WHEEZING = 1,
  ALCOHOL_CONSUMING = 1,
  COUGHING=1,
  SHORTNESS_OF_BREATH = 1,
  SWALLOWING_DIFFICULTY = 1,
  CHEST_PAIN = 1
)
#colnames(lung_cancer)
#str(lung_cancer)

# Make predictions with the loaded model
predictions_to_be_predicted <- predict(loaded_lungcancer_model, newdata = to_be_predicted)
print(predictions_to_be_predicted)


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
        GENDER = arg_gender,
        AGE = arg_age,
        SMOKING = arg_smoking,
        YELLOW_FINGERS = arg_yellowfingers,
        ANXIETY = arg_anxiety,
        PEER_PRESSURE = arg_peerpressure,
        CHRONIC_DISEASE = arg_chronic,
        FATIGUE = arg_fatigue,
        ALLERGY = arg_allergy,
        WHEEZING = arg_wheezing,
        ALCOHOL_CONSUMING = arg_alcohol,
        COUGHING=arg_coughing,
        SHORTNESS_OF_BREATH =arg_breath,
        SWALLOWING_DIFFICULTY=arg_swallowing,
        CHEST_PAIN=arg_chestpain
      )
    
    # Make a prediction based on the data frame
    predict(loaded_lungcancer_model, to_be_predicted)
    
  }





# We can now call the function predict_lungcancer() instead of calling the
# predict() function directly


predict_lungcancer('F',32,1,2,2,1,1,2,1,2,1,1,2,1,2)










