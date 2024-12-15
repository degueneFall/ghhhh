<?php
if (isset($_POST['save'])) {
    include '../../bd/bd.php';

    $dateAf = $_POST['dateAf'];
    $idA = $_POST['idA'];
    $codeS = $_POST['codeS'];


    $r = "INSERT INTO affecter(dateAf,idA,codeS) 
        values ('$dateAf','$idA','$codeS')";
    $connexion->exec($r);

    $location = $_SERVER['HTTP_REFERER'];
    if ($r) {
        $success = " ajouté avec succès...";
       
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affecter touuuuuuuuuuuuuuut</title>
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
               Affecter
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Date Affectation</label>
                        <input type="date" name="dateAf" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">idA</label>
                        <select name="idA" id="" class="form-control">
                            <?php
                            include '../../bd/bd.php';
                            $stmt = $connexion->query("SELECT * FROM agent");
                            while ($row = $stmt->fetch()) { ?>
                            <option value="<?php echo $row["idA"]; ?>">
                                <?php echo $row['prenomA']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">codeS</label>
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
                    <button type="submit"  name="save">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>