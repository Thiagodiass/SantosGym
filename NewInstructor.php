
<?php 

include 'NavBar.php';
    
if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
?>
    <div class="container">
        
        <h1>Insert Intructor</h1>
        <form action="InsertInstructor.php" class="needs-validatio" novalidate method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Instructor Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="<?php if(isset($name)){ echo $name;}  ?>" >
                <!-- show error to user  -->
                <span class="text-danger">
                    <?= isset($error['name']) ? $error['name'] : ''?> 
                </span>
            </div>
            <div class="mb-3">
                <label for="modality" class="form-label">Modality</label>
                <input type="text" class="form-control" id="modality" name="modality" value="<?= (isset($modality)) ? $modality : NULL ?>" aria-describedby="modalityHelp">
                <span class="text-danger"><?= isset($error['modality']) ? $error['modality'] : '' ?> </span>
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