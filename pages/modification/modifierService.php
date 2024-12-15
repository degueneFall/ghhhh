<?php
include '../../bd/bd.php';
$q = $connexion->query("SELECT * FROM service WHERE codeS='" . $_GET["codeS"] . "'");

while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
    $nomS = $row['nomS'];
    $description = $row['description'];
   

}

if (isset($_POST['update'])) {

    $nomS= $_POST['nomS'];
    $description = $_POST['description'];
   



    $r = "UPDATE service SET nomS='$nomS', description='$description' WHERE codeS = '" . $_GET["codeS"] . "'";
    $connexion->exec($r);

    if ($r) {
        $success = "Service modifié avec succès...";
        header('Location: ../listes/listeService.php?success=1');
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
    <title>Service</title>
</head>

<body>
  

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container'>
        <p>Service ajouté avec succés</p>
    </div>
    <?php unset($_GET['success']);
    } ?>
   <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">
               Service
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="nomS" id="" class="form-control" value="<?php echo $nomS; ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" name="description" id="" class="form-control"value="<?php echo $description; ?>">
                    </div>

                    <button type="submit"  name="update">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>