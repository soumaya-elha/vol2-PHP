
<?php 
session_start();
include ('includes/nav.php'); ?>


<link rel="stylesheet" href="css/style.css">
<div class="header">
  <form action="index.php" method="post">
  <h1>Find your <span>Next tour!</span> </h1>
    <p>Where would you like to go?</p>
    <div class="font-box">

    <select name="depart" class="search-field skills" id="inputGroupSelect01">
        <option selected>From...</option>
        <option value="casablanca">casa blanca</option>
        <option value="fes">Fès</option>
        <option value="safi">Safi</option>
        <option value="dakhla">dakhla</option>
        <option value="Salé">Salé</option>
    </select>

    <select name="destination" class="search-field skills" id="inputGroupSelect01">
        <option selected>To...</option>
        <option value="casablanca">Casa blanca</option>
        <option value="fes">Fès</option>
        <option value="safi">safi</option>
        <option value="dakhla">dakhla</option>
        <option value="Salé">Salé</option>
    </select>

    <button class="search-btn" type="submit" name="submit">Search</button>

    </div>
  </form>
</div>

<center>
<h2>Available flights</h2>
<h5>Bootstrap heading Bootstrap heading</h5>
</center>
<table class="table table-bordered">

    <tr>

      <th scope="col">Depart</th>
      <th scope="col">Destianation</th>
      <th scope="col">date de depart</th>
      <th scope="col">Time</th>
      <th scope="col">Price</th>
      <th scope="col">nombre de Place</th>
      <th scope="col">Reservation</th>
    </tr>
                
    <?php 
            $db = mysqli_connect("localhost","root","","db_gestionvols");
            if (isset($_POST['submit'])){
                $depart = $_POST['depart'];
                $destination = $_POST['destination'];
                $query = mysqli_query($db, "SELECT * FROM Vols WHERE depart = '$depart' AND destination = '$destination' AND place_disponible > 0 "); 
      
                if (mysqli_num_rows($query) > 0 ) {
                while ($row = mysqli_fetch_array($query)){
                    $id = $row['idVol'];
                    $depart = $row['depart'];
                    $destination = $row['destination'];
                    $date = $row['date_depart'];
                    $time = $row['time'];
                    $prix = $row['prix'];
                    $nbrPlace = $row['place_disponible'];
    
     ?>
                <tbody>
                    <tr>
                      <td><?php echo $depart; ?></td>
                      <td><?php echo $destination;?></td>
                      <td><?php echo $date; ?></td>
                      <td><?php echo $time; ?></td>
                      <td><?php echo $prix;?>DH</td>
                      <td><?php echo $nbrPlace; ?></td>
                      <td><button type="button" class="btn btn-warning">
                      <a href="reservation.php?id=<?php echo $id; ?>">Reserver</a></button></td>  
                    </tr>
                  </tbody>
   <?php } }
     else { echo "<script> alert('Aucun resulta')</script>"; }
   }
   ?> 
   
     </table>

</body>
</html>