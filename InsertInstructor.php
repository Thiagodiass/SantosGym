<?php

include 'library/DBConnection.php';

$error=[];

// https://www.php.net/manual/en/function.filter-input.php
// https://www.php.net/manual/en/filter.filters.php

//sanitizing is removing anything not adhering to the filter
//filter_input (TYPE OF INPUT, INPUT NAME , FILTER NAME/TYPE - see on PHP.net)
$name = filter_input(INPUT_POST, 'name',  FILTER_SANITIZE_STRING);
$modality = filter_input(INPUT_POST, 'modality',  FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status',  FILTER_SANITIZE_STRING);

//make input required
//checks to see if the $name is set (should be) or if it is empty
//if it is initialize the error array with a message
if(!isset($name) || empty($name)){
        $error['name'] = 'The Intructor name is required';
}
if(!isset($modality) || empty($modality)){
        $error['modality'] = 'Modality is required';
}
if(!isset($status) || empty($status)){
        $error['status'] = 'Status is required';
}
//if there are no errors and error array is empty
//send to database
if(empty($error)){
        //prepare and bind
        //everything has to be the exact same as it is in the database
        $sql = "INSERT INTO instructor (name, modality, status) 
        VALUES (?,?,?)";

        //prepared statement
        $stmt = $conn->prepare($sql);

        //the variables are at your own choice, 
        //they do not require to be the exact same as the columns in the database
        $stmt->bind_param("sss", $name, $modality, $status);

        //send to database
        $stmt->execute();
        $conn->close();

        header("Location: InstructorList.php");
}else{ 
        require_once('NewInstructor.php');
}




?>