<?php
if (isset($_POST['save'])) {
    include '../../bd/bd.php';

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $salaire = $_POST['salaire'];
    $prime = $_POST['prime'];


    $r = "INSERT INTO agent (nomA,prenomA,salaire,prime) 
        values ('$nom','$prenom','$salaire','$prime')";
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
    <title>Agent</title>
    <?php include'../../nav/sidebar.php'    ?>
    <link rel="stylesheet" href="../../CSS/sidebar.css">
    <link rel="stylesheet" href="../../CSS/formulaire.css">
</head>
<body>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container mt-3'>
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
                        <input type="text" name="nom" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Prenom</label>
                        <input type="text" name="prenom" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Salaire</label>
                        <input type="number" name="salaire" id="" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="">Prime</label>
                        <input type="number" name="prime" id="" class="form-control">
                    </div>
                    <button type="submit"  name="save">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>