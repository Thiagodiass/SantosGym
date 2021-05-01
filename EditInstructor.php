<?php
//connect to the database
include 'library/DBConnection.php';
$error = [];

$name = filter_input(INPUT_POST, 'name',  FILTER_SANITIZE_STRING);
$modality = filter_input(INPUT_POST, 'modality',  FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status',  FILTER_SANITIZE_STRING);


if(!isset($name) || empty($name)){
        $error['name'] = 'The Instructor name is required';
}
if(!isset($modality) || empty($modality)){
        $error['modality'] = 'Modality is required';
}
if(!isset($status) || empty($status)){
    $error['status'] = 'Status is required';
}

//set up the sql string with prepared statements
$sql = "UPDATE instructor 
        SET name=?, 
            modality=?,
            status=? 
        WHERE id_instructor=?";


$stmt = $conn->prepare($sql);

//the variables are at your own choice, 
//they do not require to be the exact same as the columns in the database
$stmt->bind_param("sssi", $name, $modality, $status, $id_instructor);

//set up the variables
$id_instructor = $_POST["id_instructor"];
$modality = $_POST["modality"];
$status = $_POST["status"];
$name = $_POST["name"];

//execute the statement
$stmt->execute();
//close the connection
$conn->close();
//redirect back to Pub list page
header("Location: InstructorList.php");
?>