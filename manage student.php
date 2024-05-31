<?php 
include('sidebar.php');
?>

<style>
<?php include('css/update dep.css'); ?>
</style>

<section>
   <div id="maincontent">
        <div class=header><p class=con><b>Manage Employee</b></p></div>
   </div>
    <div class="card-body">
        <div class="box">
            <form action="" method="POST">
                <input type="text" name="getid" placeholder="Search by Employee Id">
                <input type="submit" name="searchbyid" value="search">
            </form>
        </div>
    
        <?php
            include 'Connection.php';
                if(isset($_POST['searchbyid'])){
                    $sid=$_POST['getid'];
                    $query="SELECT * FROM employee where EmpID='$sid' ";
                    $run=mysqli_query($con, $query);
        ?>

        <div class="main-div">
            <div class="center-div">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Employeet Name</th>
                                <th>Department</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                                    
                        <tbody>
                            <?php 
                                if(mysqli_num_rows($run) > 0){
                                    while($result=mysqli_fetch_array($run)){
                            ?>
                                        <tr>
                                            <td><?php echo $result['EmpID']; ?></td>
                                            <td><?php echo $result['EmpName']; ?></td>
                                            <td><?php echo $result['Department_Id']; ?></td>
                                            <td><a href="update student.php?id=<?php echo $result['EmpID']; ?>">edit</i></a></td>
                                            <td><a href="delete student.php?id=<?php echo $result['EmpID']; ?>">delete</a></td>
                                        </tr>
                                        <?php 
                                            }
                                            }
                                            else{
                                        ?>
                                        <tr>
                                            <td colspan=3>No Data Found</td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php
            }       
        ?>
    </div>
</section>
</body>
</html>