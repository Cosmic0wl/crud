<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user' ]) ) {
 header("Location: login.php");
 exit;
}
// select logged-in users details 
$res=mysqli_query($conn, "SELECT * FROM registrations WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
$img = $userRow['image'];

?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome -
        <?php echo $userRow['userName' ]; ?>
    </title>
</head>

<body>
     <?php echo "<img src=".$img. ">"; ?>
         Hi
    <?php echo $userRow['userName' ]; ?>
    <a href="registration/logout.php?logout">Sign Out</a>
</body>

</html>

<?php ob_end_flush(); ?>