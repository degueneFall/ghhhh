<?php
include '../../bd/bd.php';
$q = $connexion->query("SELECT * FROM agent WHERE idA='" . $_GET["idA"] . "'");

while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
    $nom = $row['nomA'];
    $prenom = $row['prenomA'];
    $salaire= $row['salaire'];
    $prime = $row['prime'];

}

if (isset($_POST['update'])) {

    $nom= $_POST['nom'];
    $prenom = $_POST['prenom'];
    $salaire= $_POST['salaire'];
    $prime = $_POST['prime'];




    $r = "UPDATE agent SET nomA='$nom',prenomA='$prenom',salaire='$salaire',prime='$prime' WHERE idA = '" . $_GET["idA"] . "'";
    $connexion->exec($r);

    if ($r) {
        $success = "Agent modifié avec succès...";
        header('Location: ../listes/listeAgent.php?success=1');
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
    <title>Agent</title>
</head>

<body>
  

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container'>
        <p>Agent ajouté avec succés</p>
    </div>
    <?php unset($_GET['success']);
    } ?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">
               Agent
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="nom" id="" class="form-control" value="<?php echo $nom; ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Prenom:</label>
                        <input type="text" name="prenom" id="" class="form-control" value="<?php echo $prenom; ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Salaire</label>
                        <input type="number" name="salaire" id="" class="form-control"
                            value="<?php echo $salaire; ?>">
                    </div>


                    <div class="form-group">
                        <label for="">prime</label>
                        <input type="number" name="prime" id="" class="form-control"
                            value="<?php echo $prime; ?>">
                    </div>
                    <button type="submit"  name="update">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>