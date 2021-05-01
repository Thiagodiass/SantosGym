<?php


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "santosgym";

$conn = new mysqli("localhost", "root", "root", "santosgym");


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

