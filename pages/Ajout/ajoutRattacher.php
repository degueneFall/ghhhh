<?php
if (isset($_POST['save'])) {
    include '../../bd/bd.php';

    $dated= $_POST['dated'];
    $datef= $_POST['datef'];
    $budget=$_POST['budget'];
    $codeS = $_POST['codeS'];
    $codeM = $_POST['codeM'];



    $r = "INSERT INTO rattacher(dated,datef,budget,codeS,codeM) 
        values ('$dated','$datef','$budget','$codeS','$codeM')";
    $connexion->exec($r);
    if ($r) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?success=1');
        exit();
       
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rattacher</title>
    <?php include'../../nav/sidebar.php'    ?>
    <link rel="stylesheet" href="../../CSS/sidebar.css">
    <link rel="stylesheet" href="../../CSS/formulaire.css">
</head>
<body>
    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container mt-3'>
        <p> ajouté avec succés</p>
    </div>
    <?php unset($_GET['success']);
    } ?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">
              Rattacher
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Date début</label>
                        <input type="date" name="dated" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Date fin</label>
                        <input type="date" name="datef" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Budget</label>
                        <input type="number" name="budget" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">CodeS</label>
                        <select name="codeS" id="" class="form-control">
                            <?php
                            include '../../bd/bd.php';
                            $stmt = $connexion->query("SELECT * FROM service");
                            while ($row = $stmt->fetch()) { ?>
                            <option value="<?php echo $row["codeS"]; ?>">
                                <?php echo $row['nomS']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">codeM</label>
                        <select name="codeM" id="" class="form-control">
                            <?php
                            include '../../bd/bd.php';
                            $stmt = $connexion->query("SELECT * FROM ministere");
                            while ($row = $stmt->fetch()) { ?>
                            <option value="<?php echo $row["codeM"]; ?>">
                                <?php echo $row['nomM']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit"  name="save">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>