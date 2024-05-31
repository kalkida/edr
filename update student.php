
<?php 
include('sidebar.php');
?>

<style>
<?php include('css/add student.css'); ?>
</style>

<section>
<div id="maincontent">
        <div class=header><p class=con><b>Edit Employee Details</b></p></div>
</div>
    <div class="container">
        <div class="title"><b>Employee Details</b></div>
        <div class="content">
            <form action="" method="POST">
            <?php
include 'Connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $showquery = "SELECT * FROM employee WHERE EmpID = ?";
    $stmt = $con->prepare($showquery);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $arrdata = $result->fetch_assoc();
    $stmt->close();
}

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phno = $_POST['phno'];
    $dob = $_POST['dob'];
    $woreda = $_POST['woreda'];
    $gender = $_POST['gender'];
    $hno = $_POST['hno'];

    // Using prepared statements to avoid SQL injection
    $stmt = $con->prepare("UPDATE `employee` SET `EmpName` = ?, `EmpLname` = ?, `Age` = ?, `PhNumber` = ?, `Woreda` = ?, `Hno` = ?, `Sex` = ? WHERE EmpID = ?");
    $stmt->bind_param("ssssssss", $fname, $lname, $dob, $phno, $woreda, $hno, $gender, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data Updated Successfully');</script>";
    } else {
        echo "All fields are required";
    }

    $stmt->close();
}
?>
               <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" name="fname" value="<?php echo $arrdata['EmpName']; ?>" placeholder="Enter your name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Last Name</span>
                        <input type="text" name="lname" value="<?php echo $arrdata['EmpLname']; ?>" placeholder="Enter your username" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Age</span>
                        <input type="text" name="dob" value="<?php echo $arrdata['Age']; ?>" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="phno" value="<?php echo $arrdata['PhNumber']; ?>" placeholder="Enter your number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Woreda</span>
                        <input type="text" name="woreda" value="<?php echo $arrdata['Woreda']; ?>" placeholder="Enter DOB" required>
                    </div>
                    <div class="input-box">
                        <span class="details">House No</span>
                        <input type="text" name="hno" value="<?php echo $arrdata['Hno']; ?>" placeholder="Enter DOB" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Department</span>
                        <input type="text" name="did" value="<?php echo $arrdata['Department_Id']; ?>" placeholder="Enter DOB" disabled>
                    </div>
                </div>
                <label>
   
            <div class="gender-details">
            <input type="radio" name="gender" value="male" id="dot-1" required="required" />
            <input type="radio" name="gender" value="female" id="dot-2" required="required" />
            <span class="gender-title">Gender</span>
            <div class="category">
                <label for="dot-1">
                <span class="dot one"></span>
                <span>Male</span>
            </label>
            <label for="dot-2">
                <span class="dot two"></span>
                <span>Female</span>
            </label>
            </div>
            </div>
            <div class="button">
            <input type="submit" name="submit" value="Submit">
            </div>
       </form>
       </div>
   </div>
</section>
</body>
</html>