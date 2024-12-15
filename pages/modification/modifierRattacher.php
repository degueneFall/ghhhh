<?php
include '../../bd/bd.php';
$q = $connexion->query("SELECT * FROM rattacher WHERE numR='" . $_GET["numR"] . "'");

while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
    $dated= $row['dated'];
    $datef= $row['datef'];
    $budget=$row['budget'];
    $codeS = $row['codeS'];
    $codeM = $row['codeM'];
}

if (isset($_POST['update'])) {

    $dated= $_POST['dated'];
    $datef= $_POST['datef'];
    $budget=$_POST['budget'];
    $codeS = $_POST['codeS'];
    $codeM = $_POST['codeM'];

    $r = "UPDATE rattacher SET dated='$dated',datef='$datef',budget='$budget',codeS='$codeS',codeM='$codeM'  WHERE numR = '" . $_GET["numR"] . "'";
    $connexion->exec($r);

    if ($r) {
        $success = "modifié avec succès...";
        header('Location: ../listes/listeRattacher.php?success=1');
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
    <title>Rattacher</title>
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
              Rattacher
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Date début</label>
                        <input type="date" name="dated" id="" class="form-control"value="<?php echo $dated; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Date fin</label>
                        <input type="date" name="datef" id="" class="form-control"value="<?php echo $datef; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Budget</label>
                        <input type="number" name="budget" id="" class="form-control" value="<?php echo $budget; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">CodeS</label>
                        <select name="codeS" id="" class="form-control">
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

                    <div class="form-group">
                        <label for="">codeM</label>
                        <select name="codeM" id="" class="form-control" >
                            <?php
                            include '../../bd/bd.php';
                            $stmt = $connexion->query("SELECT * FROM ministere");
                            while ($row = $stmt->fetch()) { ?>
                            <option value="<?php echo $row["codeM"]; ?>" <?php if ($row["codeM"] == $codeM) echo "selected"; ?>>
                                <?php echo $row['nomM']; ?></option>
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