<?php
if (isset($_POST['save'])) {
    include '../../bd/bd.php';

    $nomS = $_POST['nomS'];
    $description = $_POST['description'];
    

    $r = "INSERT INTO service (nomS,description) values ('$nomS','$description')";
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
                        <input type="text" name="nomS" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" name="description" id="" class="form-control">
                    </div>

                    <button type="submit"  name="save">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>