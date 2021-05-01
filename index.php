<?php 
include 'library/DBConnection.php';


if(empty($_GET['searchInput'])){
    $sql = "SELECT * FROM gym INNER JOIN instructor where gym.id_instructor = instructor.id_instructor";
} else {

    $searchInput = filter_input(INPUT_GET, 'searchInput',  FILTER_SANITIZE_STRING);
    $searchType  = filter_input(INPUT_GET, 'searchType',  FILTER_SANITIZE_STRING);

    if( $searchType == 'maromba' || 
        $searchType == 'instructor' || 
        $searchType == 'typePlan' || 
        $searchType == 'status' ||
        $searchType == 'start_date' ||
        $searchType == 'expire_date'){

        if($searchType == 'instructor'){
            $sql = "SELECT * FROM gym INNER JOIN instructor WHERE instructor.id_instructor = gym.id_instructor and
            instructor.name LIKE '%$searchInput%'";
        } else if($searchType == 'maromba'){
            $sql = "SELECT * FROM gym INNER JOIN instructor WHERE instructor.id_instructor = gym.id_instructor and 
            gym.maromba LIKE '%$searchInput%'";
        } else if($searchType == 'typePlan'){
            $sql = "SELECT * FROM gym INNER JOIN instructor WHERE instructor.id_instructor = gym.id_instructor and 
            gym.typePlan LIKE '%$searchInput%'";
        } else if($searchType == 'status'){
            $sql = "SELECT * FROM gym INNER JOIN instructor WHERE instructor.id_instructor = gym.id_instructor and 
            gym.status LIKE '%$searchInput%'";
        } else if($searchType == 'start_date'){
            $sql = "SELECT * FROM gym INNER JOIN instructor WHERE instructor.id_instructor = gym.id_instructor and 
            gym.start_date LIKE '%$searchInput%'";
        } else if($searchType == 'expire_date'){
            $sql = "SELECT * FROM gym INNER JOIN instructor WHERE instructor.id_instructor = gym.id_instructor and 
            gym.expire_date LIKE '%$searchInput%'";
        }
    } else {
        echo 'Search Type doesn\'t exist!';
        $sql = "SELECT * FROM gym INNER JOIN instructor WHERE instructor.id_instructor = gym.id_instructor";
    }
}


$result = $conn->query($sql);


$sql1 = 'SELECT * FROM `instructor`';
$result1 = $conn->query($sql1);
$validInstructor = 'none';
if(!empty($result1)){
    $validInstructor = 'exist'; 
    // $instructor = $result1->fetch_assoc();
    // if(!empty($instructor)){
    //     
    // }
}

include 'NavBar.php';


?>
<div class="container">
    <h1>Santos Gym </h1>
        <form action='' method="GET">
            <div class="row ">
                <div class="col-5">
                    <div class="input-group mb-3">
                        <select class="form-select" id="inputGroupSelect04" name="searchType" aria-label="Example select with button addon">
                            <option selected>Choose...</option>
                            <option value="maromba">Maromba</option>
                            <option value="instructor">Instructor</option>
                            <option value="typePlan">Type of Plan</option>
                            <option value="status">Status</option>
                            <option value="start_date">Start date</option>
                            <option value="expire_date">Expire date</option>
                        </select>
                        <input class="form-control" type="text" name="searchInput">
                        <button class="btn btn-outline-secondary" type="submit" id="submit">Search</button>
                    </div>
                </div>
            </div>            
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Maromba</th>
                    <th scope="col">Instructor</th>
                    <th scope="col">Type of Plan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Start date</th>
                    <th scope="col">Expire Date</th>
                    <?php 
                        if($validInstructor == 'exist' && (isset($_SESSION) && isset($_SESSION['id']))) {
                            echo '<th scope="col"><a class="btn btn-success" href="NewMaromba.php" role="new">New</a></th>';
                        } else {
                            echo '<div class="alert alert-danger">';
                            echo    '<strong>Attention!</strong> It is Necessary to create the Instructor first.';
                            echo '</div>';
                        }
                    ?>                  
                <tr>
            </thead>
            <tbody>
            <?php 
            $instruc = "empty";
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<th scope='row'>".$row['id']."</th>";
                        echo "<td>".$row['maromba']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['typePlan']."</td>";
                        echo "<td>".$row['status']."</td>";
                        echo "<td>".$row['start_date']."</td>";
                        echo "<td>".$row['expire_date']."</td>";
                        if(isset($_SESSION) && isset($_SESSION['id'])) {
                            echo "<td><a class='btn btn-primary' href='UpdateMaromba.php?id=".$row['id']."' role='update'>Update</a></td>";
                            echo "<td><a class='btn btn-danger' href='Deletemaromba.php?id=".$row['id']."' role='delete'>Delete</a></td>";
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
