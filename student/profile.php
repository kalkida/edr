<style>
<?php include('\xampp\htdocs\SRMS\css\add student.css'); ?>
</style>


<?php
session_start();
include '\xampp\htdocs\SRMS\Connection.php';
$user=$_SESSION["AdminLoginId"];
$query="select * from employee where EmpID='$user' ";
$run=mysqli_query($con,$query);
$arrdata = mysqli_fetch_array($run);
?>

<div id="maincontent">
    <div class=header><p class=con><b>PROFILE</b></p></div>
</div>
    <div class="container">
        <div class="title"><b>Employee Details</b></div>
        <div class="content">
            <form action="" method="POST">
               <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" name="fname" value="<?php echo $arrdata['EmpName']; ?>" disabled>
                    </div>
                    <div class="input-box">
                        <span class="details">Last Name</span>
                        <input type="text" name="lname" value="<?php echo $arrdata['EmpLname']; ?>" disabled>
                    </div>
                    <div class="input-box">
                        <span class="details">Age</span>
                        <input type="text" name="email" value="<?php echo $arrdata['Age']; ?>" disabled>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="phno" value="<?php echo $arrdata['PhNumber']; ?>" disabled>
                    </div>
                    <div class="input-box">
                        <span class="details">Employee Id</span>
                        <input type="text" name="sid" value="<?php echo $arrdata['EmpID']; ?>" disabled>
                    </div>
                    <div class="input-box">
                        <span class="details">Woreda</span>
                        <input type="text" name="dob" value="<?php echo $arrdata['Woreda']; ?>" disabled>
                    </div>
                    <div class="input-box">
                        <span class="details">Department</span>
                        <input type="text" name="depart" value="<?php echo $arrdata['Department_Id']; ?>" disabled>
                    </div>

                    <div class="input-box">
                        <span class="details"><label>House No</label></span>
                        <input type="text" name="crs" value="<?php echo $arrdata['Hno']; ?>" disabled>
                        
                    </div>
                </div>
       </form>
       <div class="lin">
               <!-- <button class=btn><a href="std marks.php">View Marks</a></button> -->
               <button class=btn><a href="std Logout.php">Logout</a></button>
            </div>
        </div>
       </div>
       
       <style>
            .lin{
                float: right;
                display: flex;
                align-items: center;
                text-align: center;
                margin-top: 10%;
                margin-right: 20%;
            }

            a{
                display: block;
                color: white;
                text-decoration: none;
            }

            a:hover{
                color:black;
            }

            .btn{
                height: 35px;
                width: 150px;
                margin-left:30px;
                border-radius: 5px;
                border: none;
                color: #fff;
                font-size: 18px;
                font-weight: 500;
                letter-spacing: 1px;
                cursor: pointer;
                transition: all 0.3s ease;
                background: linear-gradient(135deg, #71b7e6, #00B0FF);
                }
        </style>
   
</section>
</body>
</html>