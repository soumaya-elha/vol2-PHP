<?php
session_start();

$db = new PDO("mysql:host=localhost;dbname=db_gestionvols", "root", "");
include('includes/nav.php');

$myProfil = $_SESSION['id'];


$stmt = $db->prepare("SELECT username, email, fullname FROM users WHERE userID = ?");
$stmt->execute(array($myProfil));
$row = $stmt->fetch();

?>

<link rel="stylesheet" href="css/login-insc.css">
<div class= "header">
    <form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <h4 class="text-center"> Mon Profil</h4>
        <!-- <label for="name">Username</label> -->
        <input class="form-control" type="text" name="user" value="<?php echo $row['username'] ?>" placeholder="Username" autocomplete="off">
        <!-- <label for="email">E-Mail</label> -->
        <input class="form-control" type="text" name="email" value="<?php echo $row['email'] ?>" placeholder="Username" autocomplete="off">
        <!-- <label for="fullname">Fullname</label> -->
        <input class="form-control" type="text" name="fullname" value="<?php echo $row['fullname'] ?>" placeholder="Username" autocomplete="off">
        <input type="submit"  class="btn" value="login">       
    </form>
</div>
