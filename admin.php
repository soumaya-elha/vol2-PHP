<?php
session_start();

if (isset($_SESSION['admin'])) {
    $db = new PDO("mysql:host=localhost;dbname=db_gestionvols", "root", "");
    include('includes/nav.php');

    $do = isset($_GET['do']) ? $_GET['do'] : 'manage';
?>
    <link rel="stylesheet" href="css/login-insc.css">
    <?php
    if ($do == 'manage') {
        $stmt = $db->prepare("SELECT * FROM vols");
        $stmt->execute();
        $rows = $stmt->fetchAll();
    ?>
        <div class="table-responsive table-center text-center">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Depart</th>
                        <th scope="col">Arrivee</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Date</th>
                        <th scope="col">time</th>
                        <th scope="col">Controle</th>
                    </tr>
                </thead>
                <?php
                foreach ($rows as $row) {
                ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $row['idVol'] ?></th>
                            <td><?php echo $row['depart'] ?></td>
                            <td><?php echo $row['destination'] ?></td>
                            <td><?php echo $row['prix'] ?></td>
                            <td><?php echo $row['date_depart'] ?></td>
                            <td><?php echo $row['time'] ?></td>
                            <td>
                                <a href="?do=edit&id=<?php echo $row['idVol'] ?>" class="btn btn-success">Modifier</i></a>
                                <a href="?do=delete&id=<?php echo $row['idVol'] ?>" class="btn btn-danger confirm">Supprimer</i></a>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
            <a href="?do=add" class="btn btn-primary"><i class="fas fa-plus"></i>Ajouter un vol</a>
        </div>
    <?php
    } elseif ($do == 'add') {
    ?>
        <div class="container">
            <form action="?do=insert" method="POST">
                <div class="form-group">
                    <input name="depart" type="text" class="form-control" placeholder="Depart" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <input name="destination" type="text" class="form-control" placeholder="destination" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <input name="prix" type="text" class="form-control" placeholder="prix" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <input name="date_depart" type="text" class="form-control" value="0000-00-00" placeholder="AAAA-MM-JJ" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <input name="time" type="text" class="form-control" value="00:00:00" placeholder="HH:MM:SS" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Ajouter le vol" class="btn btn-primary">
                </div>
            </form>
        </div>
        <?php

    } elseif ($do == 'insert') {
        $depart = $_POST['depart'];
        $arrive = $_POST['destination'];
        $prix   = $_POST['prix'];
        $date   = $_POST['date_depart'];
        $time   = $_POST['time'];
        $stmt   = $db->prepare("INSERT INTO vols (depart, destination, prix, date_depart, time) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(array($depart, $arrive, $prix, $date, $time));
        header("location: admin.php");
        exit();
    } elseif ($do == 'edit') {
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
        $stmt = $db->prepare("SELECT * FROM vols WHERE idVol = ? LIMIT 1");
        $stmt->execute(array($id));
        $row = $stmt->fetch();
        $count = $stmt->rowCount();
        if ($count > 0) {
        ?>
            <div class="container">
                <form action="?do=update" method="POST">
                    <input type="hidden" name="idVol" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <input name="depart" type="text" class="form-control" value="<?php echo $row['depart'] ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input name="destination" type="text" class="form-control" value="<?php echo $row['destination'] ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input name="prix" type="text" class="form-control" value="<?php echo $row['prix'] ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input name="date_depart" type="text" class="form-control" value="<?php echo $row['date_depart'] ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input name="time" type="text" class="form-control" value="<?php echo $row['time'] ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input name="display" type="number" class="form-control" value="<?php echo $row['display'] ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </form>
            </div>
<?php
        }
    } elseif ($do == 'update') {
        $id         = $_POST['idVol'];
        $depart     = $_POST['depart'];
        $arrive    = $_POST['destination'];
        $prix       = $_POST['prix'];
        $date       = $_POST['date_depart'];
        $time      = $_POST['time'];
        $display    = $_POST['display'];

        $stmt = $db->prepare("UPDATE vols SET depart=?, destination =?, prix=?, date_depart=? , time=?, display=? WHERE idVol=?");
        $stmt->execute(array($depart, $arrive, $prix, $date, $time, $display, $id));
        header("location: admin.php");
        exit();
    } elseif ($do == "delete") {
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

        $stmt = $db->prepare("DELETE FROM vols WHERE idVol = ?");
        $stmt->execute(array($id));
        $count = $stmt->rowCount();
        header("location: admin.php");
        exit();
    }
}
?>
<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>