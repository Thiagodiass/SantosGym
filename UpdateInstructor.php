<?php
include 'library/DBConnection.php';


$sql = "SELECT * FROM instructor WHERE id_instructor=" . $_GET['id_instructor'];

$result = $conn->query($sql);


if($result->num_rows==0){
    header("Location: InstructorList.php");
}

$row=$result->fetch_assoc();


?>

<!DOCTYPE html>
<html>
<head>
<title>Update Instructor</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</head>
<body>
    <?php include 'NavBar.php' ?>
    <div class="container">
        
        <h1>Update Instructor</h1>
        <form action="EditInstructor.php" method="POST">
            <input type="hidden" value="<?=$_GET['id_instructor']?>" name="id_instructor">
            <div class="mb-3">
                <label for="name" class="form-label">Intructor Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="<?= $row['name'] ?>">
                <span class="text-danger">
                    <?= isset($error['name']) ? $error['name'] : ''?> 
                </span>
            </div>
            <div class="mb-3">
                <label for="modality" class="form-label">Modality</label>
                <input type="text" class="form-control" id="modality" name="modality" aria-describedby="modalityHelp" value="<?= $row['modality']?>">
                <span class="text-danger">
                    <?= isset($error['modality']) ? $error['modality'] : ''?> 
                </span>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label><br />
                <select style="width:550px;" name="status" id="typePlan">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Holidays">Holidays</option>
                </select>
                <?= (isset($status)) ? $status : NULL ?>
                <span class="text-danger">
                    <?= isset($error['status']) ? $error['status'] : '' ?>
                </span>
           </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    

   
</body>
</html>