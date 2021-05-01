<?php 
//restrict the page to logged in users
include 'NavBar.php';
if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
//get the publishers
include 'library/DBConnection.php';
$sql = "SELECT * FROM instructor";
$result = $conn->query($sql);

?>
    <div class="container">
    
    <h1>Instructor List </h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Modality</th>
                    <th scope="col">Status</th>
                    <?php 
                        if(isset($_SESSION) && isset($_SESSION['id'])) {
                            echo '<th scope="col"><a class="btn btn-success" href="NewInstructor.php" role="new">New</a></th>';
                        }
                    ?>
                <tr>
            </thead>
            <tbody>
            <?php 
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<th scope='row'>".$row['id_instructor']."</th>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['modality']."</td>";
                        echo "<td>".$row['status']."</td>";
                        if(isset($_SESSION) && isset($_SESSION['id'])) {
                            echo "<td><a class='btn btn-primary' href='UpdateInstructor.php?id_instructor=".$row['id_instructor']."' role='update'>Update</a></td>";
                            echo "<td><a class='btn btn-danger' href='DeleteInstructor.php?id_instructor=".$row['id_instructor']."' role='delete'>Delete</a></td>";
                        }
                        echo "</tr>";
                    } 
                }
            ?>
            </tbody>
        </table>
    </div>
            
</body>
</html>
