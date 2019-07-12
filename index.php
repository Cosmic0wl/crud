<?php require_once 'actions/db_connect.php'; 
  include 'registration/home.php';
  if ( isset($_SESSION['user'])=="" && isset($_SESSION['admin'])=="") {
 header("Location: registration/login.php");
 exit;
}

?> 


<!DOCTYPE html>
<html>
<head>
   <title>PHP CRUD</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

   <style type ="text/css">
       .manageUser {
           width : 50%;
           margin: auto;
       }

        table {
           width: 100%;
            margin-top: 20px;
       }

   </style>

</head>
<body>
<?php if(isset($_SESSION["admin"])) {?>
<div class="manageUser">
   <table  class="table">
       <thead>
           <tr>
               <th scope="col">Name</th>
               <th scope="col">Date of birth</th>
               <th scope="col">Option</th>
           </tr>
       </thead>
       <tbody>
          <?php
           $sql = "SELECT * FROM user WHERE active = 0";
           $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo  "<tr>
                       <td>" .$row['first_name']." ".$row['last_name' ]."</td>
                       <td>" .$row['date_of_birth']."</td>
                       <td>
                           <a href='update.php?id=" .$row['id']."'><button class='btn btn-primary' type='button'>Edit</button></a>
                           <a href='delete.php?id=" .$row['id']."'><button class='btn btn-primary' type='button'>Delete</button></a>
                       </td>
                   </tr>" ;
               }
           } else  {
               echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
           }
            ?>  
       </tbody>
   </table>

   <a href= "create.php"><button class="btn btn-primary" type="button" >Add User</button></a>
</div>


<?php } ?>

<?php if(isset($_SESSION["user"])) {?>
<div class="manageUser">
   <table  class="table">
       <thead>
           <tr>
               <th scope="col">Name</th>
               <th scope="col">Date of birth</th>
           </tr>
       </thead>
       <tbody>
          <?php
           $sql = "SELECT * FROM user WHERE active = 0";
           $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo  "<tr>
                       <td>" .$row['first_name']." ".$row['last_name' ]."</td>
                       <td>" .$row['date_of_birth']."</td>
                   </tr>" ;
               }
           } else  {
               echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
           }
            ?>  
       </tbody>
   </table>


</div>


<?php } ?>



</body>
</html>
