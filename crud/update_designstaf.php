<?php include("connection.php");

$id =  $_GET['id'];
$query = "SELECT * FROM STAF WHERE id = '$id'";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>collage</title>
</head>

<body>
      <div class="container">
          <form action="#" method="POST">
        <div class="title">
            Update Staf Details
        </div>
        <div class="form">

        <div class="input_file">
                 <lable>Designation</lable>
                 <input type="text" value="<?php echo $result['Designation'];?>" class="input"  name="Designation" required>
            </div>

           <div class="input_file">
                 <lable>First Name</lable>
                 <input type="text" value="<?php echo $result['fname'];?>" class="input"  name="fname" required>
            </div>

            <div class="input_file">
                 <lable>Last Name</lable>
                 <input type="text" value="<?php echo $result['lname'];?>" class="input"  name="lname" required>
            </div>
            
            <div class="input_file">
                 <lable>Qulification</lable>
                 <input type="password" value="<?php echo $result['Qulification'];?>" class="input"  name="Qulification" required></input>
            </div>

            <div class="input_file">
                 <lable>Gender</lable>
                 <div class="custom_select" >

                 <select name="gender" required>
                    <option value="selected">Select</option>
                    
                    <option value="male"
                        <?php
                             if($result['gender'] == 'male')
                             {
                                echo "selected";
                             }
                        ?>
                        
                        >Male </option>

                    <option value="female"
                    <?php
                             if($result['gender'] == 'female')
                             {
                                echo "selected";
                             }
                        ?>
                    
                    >Female</option>
                 </select>
                 </div>
                         </div>

            <div class="input_file">
                 <lable>Phone Number</lable>
                 <input type="text" value="<?php echo $result['phone'];?>" class="input" name="phone" required>
            </div>
             
            <div class="input_file">
                 <lable>Address</lable>
                <textarea class="textarea"  name="address" required> <?php echo $result['address'];?> </textarea>
            </div>
                    
            <div class="input_file trems">
                 <lable class="check">
                    <input type="checkbox" required></input>
                    <span class="checkmark"></span>
                 </lable>
                <p>Agree to trems and conditions</p>
            </div>
            <div class="input_file">
                <input type="submit" value="Update Details" class="btn" name="update">
            </div>
        </div>   
      </div>
</form>
</body>

</html>

<?php 
   if($_POST['update'])
   {
     $Designation      = $_POST['Designation'];
     $fname            = $_POST['fname'];
     $lname            = $_POST['lname'];
     $Qulification     = $_POST['Qulification'];
     $gender           = $_POST['gender'];
     $phone            = $_POST['phone'];
     $address          = $_POST['address'];

     $query = "UPDATE staf set Designation='$Designation',fname='$fname',lname='$lname',Qulification='$Qulification'
     ,gender='$gender',phone='$phone',address='$address' WHERE id='$id'";
     $data = mysqli_query($conn,$query);
      
     if($data)
     {
        echo "record update";
        ?>
         <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/displaystaf.php"/>

        <?php

     }
     else
     {
       echo "not update";
     }
  }
?>