
<?php 

include 'NavBar.php';
include 'library/DBConnection.php'; 

if(!isset($_SESSION['id'])){
    header("Location: index.php");
}


?>
    <div class="container">
        
        <h1>Insert Maromba</h1>
        <form action="InsertMaromba.php" class="needs-validatio" id="marombaForm"  method="POST">
            <div class="mb-3">
                <label for="maromba" class="form-label">Maromba Name</label>
                <input style="width:550px;" type="text" class="form-control" id="maromba" name="maromba" aria-describedby="marombaHelp" value="<?php if(isset($maromba)){ echo $maromba;}  ?>" >
                <!-- show error to user  -->
                <span class="text-danger" id='marombaError'>
                    <?= isset($error['maromba']) ? $error['maromba'] : ''?> 
                </span>
            </div>
            <div class="mb-3">
                <label for="id_instructor" class="form-label">Instructor</label><br />
                <select style="width:550px;" name="id_instructor" id="id_instructor">
                    <?php

                        $sql = "SELECT * FROM instructor";
                        $result = $conn->query($sql); 

                        while($instructor = $result->fetch_assoc())
                        {
                            echo "<option value='". $instructor['id_instructor'] ."'>" .$instructor['name'] ."</option>";  // displaying data in option menu
                        }	
                    ?>  
                </select>            
                <span class="text-danger" id='id_instructorError'><?= isset($error['id_instructor']) ? $error['id_instructor'] : '' ?> </span>
           </div>
            <div class="mb-3">
                <label for="typePlan" class="form-label">Type of Plan</label><br />
                <select style="width:550px;" name="typePlan" id="typePlan">
                    <option value="Student">Student</option>
                    <option value="Full">Full</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Monthly">Monthly</option>
                </select>
                <span class="text-danger">
                    <?= (isset($typePlan)) ? $typePlan : NULL ?>
                </span>
                <span class="text-danger" id='typePlanError'><?= isset($error['typePlan']) ? $error['typePlan'] : '' ?> </span>
           </div>
            <div class="mb-3">                
                <label for="status" class="form-label">Status</label><br />
                <select style="width:550px;" name="status" id="status">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Holidays">Holidays</option>
                </select>
                <?= (isset($status))? $status : NULL ?>
                <span class="text-danger" id="statusError"><?= isset($error['status']) ? $error['status'] : '' ?> </span>
           </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input style="width:550px;" type="date" class="form-control" id="start_date" name="start_date" value="<?= (isset($start_date))? $start_date : NULL ?>" aria-describedby="start_dateHelp">
                <span class="text-danger" id="start_dateError"><?= isset($error['start_date']) ? $error['start_date'] : '' ?> </span>
           </div>
           <div class="mb-3">
                <label for="expire_date" class="form-label">Expire Date</label>
                <input style="width:550px;" type="date" class="form-control" id="expire_date" name="expire_date" value="<?= (isset($expire_date))? $expire_date : NULL ?>" aria-describedby="expire_dateHelp">
                <span class="text-danger" id="expire_dateError"><?= isset($error['expire_date']) ? $error['expire_date'] : '' ?> </span>
           </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>