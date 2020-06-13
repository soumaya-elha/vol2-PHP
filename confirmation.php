<?php 
    $id_reserv = $_GET['id'];
    $db = mysqli_connect("localhost","root","","db_gestionvols");
    $query1 = mysqli_query($db, "SELECT * FROM reservation WHERE idreservation = $id_reserv");
    if(mysqli_num_rows($query1) == 1){
        $fetch = mysqli_fetch_array($query1);
        $id_client = $fetch['idClient'];
        $id_Vol = $fetch['idVol'];

        $query2 = mysqli_query($db, "SELECT * FROM client WHERE idClient = $id_client");
        if(mysqli_num_rows($query2) == 1){
            $fetch = mysqli_fetch_array($query2);
            $id_client = $fetch['idClient'];
            $nom = $fetch['Nom'];
            $prenom = $fetch['Prenom'];
            $email = $fetch['Email'];
            $tel = $fetch['tel'];
            $cin = $fetch['CIN'];

            $query3 = mysqli_query($db, "SELECT * FROM vols WHERE idvol = $id_Vol");
            if(mysqli_num_rows($query3) == 1){
              $fetch = mysqli_fetch_array($query3);
              $depart = $fetch['depart'];
              $destination = $fetch['destination'];
              $date_depart = $fetch['date_depart'];
              $time = $fetch['time'];
              $prix = $fetch['prix'];
            }
        }

        
    }
    
?>

<?php include ('includes/nav.php'); ?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/confi_css.css">
<div class="row">
  <div class="col-75">
    <div class="container">
      <form >
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <p class="bl" ><?php echo $nom . " " . $prenom ?></p>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <p class="bl" ><?php echo $email ?></p>
            <label for="adr"><i class="fa fa-address-card-o"></i> Telephone</label>
            <p class="bl" ><?php echo $cin ?></p>
            <label for="city"><i class="fa fa-institution"></i>C.I.N </label>
            <p class="bl" ><?php echo $tel ?></p>

          </div>

         
          
        </div>
        <input class="btn">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Ticket N°  <span class="price" style="color:red"> <?php echo $id_reserv ?> </span></h4>
      <p class="black">Départ:  <span class="bl"><?php echo $depart ?></span></p>
      <p class="black">Destination: <span class="bl"><?php echo $destination ?></span></p>
      <p class="black">Date: <span class="bl"><?php echo $date_depart ?></span> à :<span><?php echo $time ?></span></p>
      <p class="black">Prix :<span class="bl"><?php echo $prix ?> DH</span> </p>
    </div>
  </div>
</div>


</body>
</html>













