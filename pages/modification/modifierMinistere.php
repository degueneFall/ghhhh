<?php
include '../../bd/bd.php';
$q = $connexion->query("SELECT * FROM ministere WHERE codeM='" . $_GET["codeM"] . "'");

while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
    $nomM = $row['nomM'];
}

if (isset($_POST['update'])) {

    $nomM= $_POST['nomM'];




    $r = "UPDATE ministere SET nomM='$nomM' WHERE codeM = '" . $_GET["codeM"] . "'";
    $connexion->exec($r);

    if ($r) {
        $success = "Ministere modifié avec succès...";
        header('Location: ../listes/listeMinistere.php?success=1');
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
    <title>Ministère</title>
</head>

<body>
  

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container'>
        <p>Mnistère ajouté avec succés</p>
    </div>
    <?php unset($_GET['success']);
    } ?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">
              Ministère
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="nomM" id="" class="form-control" value="<?php echo $nomM; ?>">
                    </div>
                   
                    <button type="submit"  name="update">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>