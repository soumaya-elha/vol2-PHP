<?php
session_start();


$db = new PDO("mysql:host=localhost;dbname=db_gestionvols", "root", "");
include('includes/nav.php');

$do = isset($_GET['do']) ? $_GET['do'] : 'manage';
?>
<link rel="stylesheet" href="css/login-insc.css">
<?php
if ($do == 'manage') {
    $stmt = $db->prepare("SELECT * FROM vols WHERE display=1");
    $stmt->execute();
    $rows = $stmt->fetchAll();
?>
    <div class="container">
        <div class="table-responsive table-center text-center">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Depart</th>
                        <th scope="col">destination</th>
                        <th scope="col">Prix</th>
                        <th scope="col">date_depart</th>
                        <th scope="col">time</th>
                        <th scope="col">nombre de place</th>
                    </tr>
                </thead>
                <?php
                foreach ($rows as $row) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['depart'] ?></td>
                            <td><?php echo $row['destination'] ?></td>
                            <td><?php echo $row['prix'] ?> DH</td>
                            <td><?php echo $row['date_depart'] ?></td>
                            <td><?php echo $row['time'] ?></td>
                            <td><?php echo $row['place_disponible'] ?></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
<?php
}
?>
<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>