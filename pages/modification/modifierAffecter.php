<?php
include '../../bd/bd.php';
$q = $connexion->query("SELECT * FROM affecter WHERE numA='" . $_GET["numA"] . "'");

while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
    $dateAf= $row['dateAf'];
    $idA = $row['idA'];
    $codeS= $row['codeS'];
}
if (isset($_POST['update'])) {

    $dateAf = $_POST['dateAf'];
    $idA = $_POST['idA'];
    $codeS = $_POST['codeS'];

    $r = "UPDATE affecter SET dateAf='$dateAf',idA='$idA',codeS='$codeS' WHERE numA = '" . $_GET["numA"] . "'";
    $connexion->exec($r);

    if ($r) {
        $success = "modifié avec succès...";
        header('Location: ../listes/listeAffecter.php?success=1');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include'../../nav/sidebar.php'    ?>
    <link rel="stylesheet" href="../../CSS/sidebar.css">
    <link rel="stylesheet" href="../../CSS/formulaire.css">
    <title>Affecter</title>
</head>

<body>
  

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container'>
        <p> Ajouté avec succés</p>
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
                        <input type="date" name="dateAf" id="" class="form-control "value="<?php echo $dateAf; ?>">
                    </div>

                    <div class="form-group">
                        <label for="">idA</label>
                        <select name="idA" id="" class="form-control">
                            <?php
                            include '../../bd/bd.php';
                            $stmt = $connexion->query("SELECT * FROM agent");
                            while ($row = $stmt->fetch()) { ?>
                            <option value="<?php echo $row["idA"]; ?>"<?php if ($row["idA"] == $idA) echo "selected"; ?>>
                                <?php echo $row['prenomA']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">codeS</label>
                        <select name="codeS" id="" class="form-control" >
                            <?php
                            include '../../bd/bd.php';
                            $stmt = $connexion->query("SELECT * FROM service");
                            while ($row = $stmt->fetch()) { ?>
                            <option value="<?php echo $row["codeS"]; ?>"<?php if ($row["codeS"] == $codeS) echo "selected"; ?>>
                                <?php echo $row['nomS']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit"  name="update">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>