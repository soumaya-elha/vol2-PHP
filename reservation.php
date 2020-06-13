
<?php 

$db = mysqli_connect("localhost", "root", "", "db_gestionvols");

  $idVol = $_GET['id'];
//   $idClient = $_GET['idClient'];
$query1 = mysqli_query($db, "SELECT * from vols where idVol = '$idVol' ");

if ($row = mysqli_fetch_array($query1)) {
}

if (isset($_POST['reserver'])){
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $cin = $_POST['cin'];
  $phone = $_POST['phone'];

  $query1 = mysqli_query($db, "INSERT INTO client values('', '$nom', '$prenom', '$email', '$cin', '$phone')");

  if($query1){
    $last_id = mysqli_insert_id($db);
    $query2 = mysqli_query($db, "INSERT INTO reservation values('', '$last_id', '$idVol', now()) ");
  }
  if($query2){
    $reserv_id = mysqli_insert_id($db);
  }
  $query3 = mysqli_query($db, " UPDATE vols SET place_disponible = place_disponible - 1 where idVol = '$idVol'  " );

 
  header("Location: confirmation.php?id=$reserv_id");
}

?>

<?php include ('includes/nav.php'); ?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/reservation.css">  
  <div class="header">
  <form action="" method="post">
   <div class="font-box">

   <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">idVol</th>
      <th scope="col">Depart</th>
      <th scope="col">Destination</th>
      <th scope="col">Date depart</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['idVol'];?></th>
      <td><?php echo $row['depart'];?></td>
      <td><?php echo $row['destination'];?></td>
      <td><?php echo $row['date_depart'];?></td>
      <td><?php echo $row['prix'];?></td>
    </tr>
  </tbody>
</table>

    <h4>Insert Information </h4>
    <div class="font">
      <input type="text" class="search-field skills" name="nom" placeholder="Name customer">
      <input type="text" class="search-field skills" name="prenom" placeholder="first name">
    </div>

    <div class="font">
      <input type="text" class="search-field ski" name="email" placeholder="Email Adresse">
    </div>

    <div class="font">
      <input type="text" class="search-field ski" name="cin" placeholder="Phone nember">
    </div>

    <div class="font">
      <input type="text" class="search-field ski" name="phone" placeholder="CIN">
    </div>

    <div class="font">
    <button class="search-btn" type="submit" name="reserver" >  Confirmer</button>
   
    </div>
    </div>
  </form>
</div>


  
</body>
</html>


