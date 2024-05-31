<?php
session_start();
include 'Connection.php';

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $sid = $_POST['sid'];
    $dob = $_POST['dob'];
    $cid = $_POST['did'];
    $gender = $_POST['gender'];
    $worda = $_POST['worda'];
    $hno = $_POST['hno'];

    // Using prepared statements to avoid SQL injection
    $stmt = $con->prepare("INSERT INTO `employee`(`EmpID`, `EmpName`, `EmpLname`, `Age`, `PhNumber`, `Woreda`, `Department_id`, `Hno`, `Sex`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $sid, $fname, $lname, $dob, $phno, $worda, $cid, $hno, $gender);

    if ($stmt->execute()) {
        $_SESSION['status'] = "**Data Added Successfully";
    } else {
        $_SESSION['status'] = "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>


<?php 
include('sidebar.php');
?>

<style>
<?php include('css/add student.css'); ?>
</style>



<section>
<div id="maincontent">
        <div class=header><p class=con><b>Add Employees</b></p></div>
</div>
    <div class="container">
        <div class="title"><b>Employees Details</b></div>
        <?php
         if(isset($_SESSION['status'])){
         ?>
         <p style="color: #006622; margin: 3% 0 5% 28%; font-size: 16px"><?php echo $_SESSION['status'];?></p>
         <?php
            unset($_SESSION['status']);
         }
         ?>
        <div class="content">
            <form action="" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" name="fname" placeholder="Enter First name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Last Name</span>
                        <input type="text" name="lname" placeholder="Enter last username" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="phno" placeholder="Enter phone number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Id</span>
                        <input type="text" name="sid" placeholder="Enter Id" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Age</span>
                        <input type="text" name="dob" placeholder="Enter Age" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Woreda</span>
                        <input type="text" name="worda" placeholder="Enter Woreda" required>
                    </div>
                    <div class="input-box">
                        <span class="details">House No</span>
                        <input type="text" name="hno" placeholder="Enter hno" required>
                    </div>

                    <div class="input-box">
                        <span class="details"><label>Department:</label></span>
                        <?php
                            $query= "select * from department";
                            $run=mysqli_query($con,$query);
                            $num=mysqli_num_rows($run);
                        ?>
                        <select class="form-control" name="did" required>
                        <option value="">--Select--</option>
                        <?php
                            while($result=mysqli_fetch_array($run)){
                        ?>
                        <option value="<?php echo $result["Department_Id"] ?>"><?php echo $result["Department_Id"] ?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="gender-details">
                <span class="gender-title">Sex</span><br>
                <div class="category">
                     <label><input type="radio" name="gender" value="male" required>Male</label>
                     <label><input type="radio" name="gender" value="female">Female</label>
                </div>
            </div>
            <div class="button">
            <input type="submit" name="submit" value="Register">
            </div>
        </form>
        </div>
    </div>
</section>


</body>
</html>
