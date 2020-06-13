<?php
$db = new PDO("mysql:host=localhost;dbname=db_gestionvols","root","");

$do = isset($_GET['do']) ? $_GET['do'] : 'add';

    if ($do == 'add') {


?>

<?php include ('includes/nav.php'); ?>
<link rel="stylesheet" href="css/login-insc.css">
<div class= "header1">
    <h4 class="text-center"> Inscription</h4>
    <form class="login" action="?do=insert " method="POST">
        <div>
            <input class="form-control" type="text" name="user" placeholder="Username">
        </div>
        <div>
            <input class="form-control" type="text" name="email" placeholder="Email">
        </div>
        <div>
            <input class="form-control" type="password" name="password" placeholder="Mot de passe" >
        </div>
       
        <div>
            <input type="submit" class="btn" value="Inscrivez-Vous">
        </div>
    </form>
</div>

<?php } elseif ($do == 'insert') {

        // echo $_POST['username'] . " " . $_POST['password'] . " " . $_POST['email'] . " " . $_POST['fullname'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            echo '<h1 class="text-center">ADD Les Membres</h1>';
            echo '<div class="blank"></div>';

            $username   = $_POST['user'];
            $password   = $_POST['password'];
            $email      = $_POST['email'];
           

            
                $stmt = $db->prepare("INSERT INTO `users` ( username, password, email) VALUES (?, ?, ?)");
                $stmt->execute(array($username, $password, $email));
                $nombreModif = $stmt->rowCount();

                echo '<div class="alert alert-success" role="alert">L\'inscription est faite avec succes'. '</div>';
                echo '<div class="container text-center">';
                echo '<a class="btn btn-primary text-center" href="login.php">RETOUR</a>';
                echo '</div>';
            
        } 
    }
    ?>
