<?php
//connect to the database
include 'library/DBConnection.php';

//set up the sql string with prepared statements
if(empty($error)){
    $sql = "UPDATE gym 
            SET maromba=?, 
            id_instructor=?, 
            typePlan=?, 
            status=?, 
            start_date=?,
            expire_date=? 
            WHERE id=?";


    $stmt = $conn->prepare($sql);

    //the variables are at your own choice, 
    //they do not require to be the exact same as the columns in the database
    $stmt->bind_param("ssssssi", $maromba, 
    $id_instructor, $typePlan, $status, 
    $start_date,$expire_date, $id);

    //set up the variables
    $id = $_POST["id"];
    $maromba = $_POST["maromba"];
    $id_instructor = $_POST["id_instructor"];
    $typePlan = $_POST["typePlan"];
    $status = $_POST["status"];
    $start_date = $_POST["start_date"];
    $expire_date = $_POST["expire_date"];

    //execute the statement
    $stmt->execute();
    //close the connection
    $conn->close();
    //redirect back to index page
    header("Location: index.php");
}else{ 
    require_once('UpdateMaromba.php');
}
?>