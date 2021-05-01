<?php

include 'library/DBConnection.php';

$error=[];

// https://www.php.net/manual/en/function.filter-input.php
// https://www.php.net/manual/en/filter.filters.php

//sanitizing is removing anything not adhering to the filter
//filter_input (TYPE OF INPUT, INPUT NAME , FILTER NAME/TYPE - see on PHP.net)
$maromba = filter_input(INPUT_POST, 'maromba',  FILTER_SANITIZE_STRING);
$id_instructor = filter_input(INPUT_POST, 'id_instructor',  FILTER_SANITIZE_STRING);
$typePlan = filter_input(INPUT_POST, 'typePlan',  FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status',  FILTER_SANITIZE_STRING);
$start_date = filter_input(INPUT_POST, 'start_date',  FILTER_SANITIZE_STRING);
$expire_date = filter_input(INPUT_POST, 'expire_date',  FILTER_SANITIZE_STRING);

//make input required
//checks to see if the $name is set (should be) or if it is empty
//if it is initialize the error array with a message
if(!isset($maromba) || empty($maromba)){
        $error['maromba'] = 'Maromba name is required';
}
if(!isset($id_instructor) || empty($id_instructor)){
        $error['id_instructor'] = 'Instructor name is required';
}
if(!isset($typePlan) || empty($typePlan)){
        $error['typePlan'] = 'Type of Plan name is required';
}
if(!isset($status) || empty($status) ){
        $error['status'] = 'Status is required';
}
if(!isset($start_date) || empty($start_date)){
        $error['start_date'] = 'Start date is required';
}
if(!isset($expire_date) || empty($expire_date)){
        $error['expire_date'] = 'Expire date is required';
}

//make sure the publisher exists before submitting it to the database
// $sql = "SELECT name FROM publisher";
// $result = $conn->query($sql);
// $publisher_exists=false;
// while($row= $result->fetch_assoc()){
//         if($publisher === $row['name']){
//                 $publisher_exists=true;
//         }
// }
// if($publisher_exists==false){
//         $error['publisher'] = 'Publisher doesn\'t exist';
// }

//if there are no errors and error array is empty
//send to database
if(empty($error)){
        //prepare and bind
        //everything has to be the exact same as it is in the database
        $sql = "INSERT INTO gym (`maromba`, `id_instructor`, `typePlan`, `status`, `start_date`, `expire_date`) 
        VALUES (?,?,?,?,?,?)";

        //prepared statement
        $stmt = $conn->prepare($sql);

        //the variables are at your own choice, 
        //they do not require to be the exact same as the columns in the database
        $stmt->bind_param("ssssss", $maromba, $id_instructor, $typePlan, $status, $start_date, $expire_date);

        //send to database
        $stmt->execute();
        $conn->close();

        header("Location: index.php");
}else{ 
        require_once('NewMaromba.php');
}
?>