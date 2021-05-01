<?php

session_start();
if(!isset($_SESSION['id_instructor'])){
    header("Location: index.php");
}

include 'library/DBConnection.php';
// sql to delete a record
$sql = "DELETE FROM instructor WHERE id_instructor=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("i", $id_instructor);
$id_instructor = $_GET['id_instructor'];
$stmt->execute();
$conn->close();
header("Location: InstructorList.php");
?>