<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mk</title>
    <style>
        body{
            background: aqua;
        }
        table{
            background-color: white;
        }
        .Update
        {
            background-color: green; 
            color: white;
            border-radius: 4px;
            height: 22px;
            width: 80px;
            font-weight: bold;
            cursor: pointer;
        }
        .Delete
        {
            background-color: red; 
            color: white;
            border-radius: 4px;
            height: 22px;
            width: 80px;
            font-weight: bold;
            cursor: pointer;   
        }
    </style>
</head>
<body>
    
</body>
</html>


<?php 
include("connection.php");

$query = "SELECT * FROM kanna";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);

    
//echo $total;

if($total != 0) 
{
    ?>
    <h2 align="center"><mark>III- Computer Science student All Records</mark></h2>

     <center><table border="1" cellspacing="7" width="100%">
        <tr>
         <th width="4%" >ID</th>
         <th width="10%">First Name</th>
         <th width="10%">Larst Name</th>
         <th width="10%">gender</th>
         <th width="20%">Email</th>
         <th width="10%">Phone</th>
         <th width="20%">Address</th>
         <th width="15%">Operations</th>
        </tr>
        
   <?php
   while($result = mysqli_fetch_assoc($data))
   {
    echo "<tr>
               <td>".$result['id']."</td>
               <td>".$result['fname']."</td>
               <td>".$result['lname']."</td>
               <td>".$result['gender']."</td>
               <td>".$result['email']."</td>
               <td>".$result['phone']."</td>
               <td>".$result['address']."</td>

               <td><a href='update_design.php?id=$result[id]'><input
                         type='submit' value='Update' class='Update'></a>

               <a href='delete.php?id=$result[id]'><input
                         type='submit' value='Delete' class='Delete' onclick = 'return checkdeleted()'>
                         
                </a></td>

            </tr> 
            ";
   
  }
}
else
{
    echo " No Records found";
}
?>
</table>
</center>

<script>

    function checkdeleted()
    {
        return confirm('Are you sure want to delete this record?');
    }
</script>