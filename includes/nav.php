<!DOCTYPE html>
<html lang="en">

<head>



  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="images/logo.png" alt="">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link " href="index.php">Acceuil</a>
        
        <?php
        // echo $row;
        if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
          echo '<a class="nav-item nav-link " href="profil.php">Profil</a>';
          if (isset($_SESSION['admin'])) {
            echo '<a class="nav-item nav-link " href="admin.php">Admin</a>';
          }
          echo '<a class="nav-item nav-link" href="logout.php">deconnecter</a>';
        } else {
          echo '<a class="nav-item nav-link " href="login.php">login</a>';
          echo '<a class="nav-item nav-link" href="inscription.php">Inscription</a>';
        }
        ?>
      </div>
    </div>
  </nav>
