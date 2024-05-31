<?php 
include('sidebar.php');
?>

<style>
<?php include('css/dashboard.css'); ?>
</style>

<section>
    <div id="maincontent">
        <div class=header><p class=wel>Welcome Admin<p></div>
        <div class=header><p class=con><b>Dashboard</b></p></div>
    </div>
    <main>
            <div class="cards">
               <div class="card-single">
                    <div>
                        <?php 
                            include 'Connection.php';
                            $query = "select * from employee";
                            $run= mysqli_query($con, $query);
                            $num=mysqli_num_rows($run);
                            echo '<h1>'.$num.'</h1>';
                        ?>
                        <span><b>Total Employees</b></span>
                    </div> 
                    <div>
                        <span class="fas fa-user-graduate"></span>
                    </div>
                </div> 
                
                <div class="card-single">
                  <div>
                        <?php 
                            include 'Connection.php';
                            $query = "select * from department";
                            $run= mysqli_query($con, $query);
                            $num=mysqli_num_rows($run);
                            echo '<h1>'.$num.'</h1>';
                        ?>
                        <span><b>Departments</b></span>
                    </div> 
                    <div>
                        <span class="fas fa-university"></span>
                    </div>
                </div> 
                
                <div class="card-single">
                    <div>
                       <?php 
                            include 'Connection.php';
                            $query = "select * from members";
                            $run= mysqli_query($con, $query);
                            $num=mysqli_num_rows($run);
                            echo '<h1>'.$num.'</h1>';
                        ?>
                        <span><b>Memebers</b></span>
                    </div> 
                    <div>
                        <span class="fas fa-book"></span>
                    </div>
                </div> 
            </div>
        </main>

</section>
  </body>
</html>

