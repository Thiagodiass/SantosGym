<?php
include 'library/DBConnection.php';


$sql = "SELECT * FROM gym WHERE id=".$_GET['id'];

$result = $conn->query($sql);


if($result->num_rows==0){
    header("Location: index.php");
}

$row=$result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
<title>Update Maromba</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</head>
<body>
    <?php include 'NavBar.php' ?>
    <?php 

        if(!isset($_SESSION['id'])) {
            header("Location: index.php");
        }
    ?>
    <div class="container">
        
        <h1>Update Maromba</h1>
        <form action="EditMaromba.php" method="POST">
            <input type="hidden" value="<?=$_GET['id']?>" name="id">
            <div class="mb-3">
                <label for="maromba" class="form-label">Maromba</label>
                <input style="width:550px;" type="text" class="form-control" id="maromba" name="maromba" aria-describedby="marombaHelp" value="<?= $row['maromba'] ?>">
            </div>
            <div class="mb-3">
                <label for="insctructor" class="form-label">Instructor</label><br />
                <select style="width:550px;" name="id_instructor" id="id_instructor"> 
                    <?php

                        $sql = "SELECT * FROM instructor";
                        $result = $conn->query($sql); 

                        while($instructor = $result->fetch_assoc())
                        {
                            echo '<option value="'.$instructor['id_instructor'].'">' .$instructor['name'] .'</option>';
                            
                        }
                        	
                    ?>  
                </select>                      
            </div>
            <div class="mb-3">
                <label for="typePlan" class="form-label">TypePlan</label><br />                
                <select style="width:550px;" name="typePlan" id="typePlan">
                    <option value="Student">Student</option>
                    <option value="Full">Full</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Monthly">Monthly</option>                    
                </select>                
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label><br />
                <select style="width:550px;" name="status" id="status">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Holidays">Holidays</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input style="width:550px;" type="date" class="form-control" id="start_date" name="start_date" aria-describedby="start_dateHelp" value="<?= $row['start_date']?>">
            </div>
            <div class="mb-3">
                <label for="expire_date" class="form-label">Expire Date</label>
                <input style="width:550px;" type="date" class="form-control" id="expire_date" name="expire_date" aria-describedby="expire_dateHelp" value="<?= $row['expire_date']?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</body>
</html>