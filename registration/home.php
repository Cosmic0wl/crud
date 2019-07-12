<?php
ob_start();
session_start();
require_once 'dbconnect.php';
// if session is not set this will redirect to login page

// select logged-in users details 
$id = isset($_SESSION["user"]) ? $_SESSION["user"] : $_SESSION["admin"];
$res=mysqli_query($conn, "SELECT * FROM registrations WHERE userId=".$id);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
$img = $userRow['image'];
$user = $userRow['userName'];

?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome -
        <?php echo $userRow['userName' ]; ?>
    </title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
</head>

<body>
	<?php
	echo '
	<div class="container">
	<div class="media border p-3">
  <img src="'.$img.'" alt="John Doe" class="mr-3 rounded-circle" style="width:60px;">
  <div class="media-body">
    <h4 class="mt-0">'.$user.'<small> <a href="registration/logout.php?logout">Sign Out</a></small></h4> 
  </div>
</div>
</div>'
?>

</body>

</html>

<?php ob_end_flush(); ?>