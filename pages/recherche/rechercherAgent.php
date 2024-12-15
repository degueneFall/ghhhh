<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <?php include'../../nav/sidebar.php'?>
    <link rel="stylesheet" href="../../CSS/sidebar.css">
  
    <title>Document</title>
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" value="<?php if(isset($_POST['search'])){echo $_POST['search'];}  ?>" name="search" placeholder="Entrez l'ID de l'agent" >
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-dark">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Salaire</th>
                                    <th>Prime</th>
                                    <th>Service</th>
                                    <th>Date Affectation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../../bd/bd.php';

                                if(isset($_POST['search'])) {
                                    $filterValue = $_POST['search'];

                                    // Requête SQL avec une jointure externe (LEFT JOIN)
                                    $query = "SELECT a.idA, a.nomA, a.prenomA, a.salaire, a.prime, s.nomS, af.dateAf
                                              FROM agent a
                                              LEFT JOIN affecter af ON a.idA = af.idA
                                              LEFT JOIN service s ON af.codeS = s.codeS
                                              WHERE a.idA = $filterValue";

                                    $result = $connexion->query($query)->fetchAll(PDO::FETCH_ASSOC);

                                    if($result) {
                                        foreach($result as $row) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['idA'] ?></td>
                                                <td><?php echo $row['nomA'] ?></td>
                                                <td><?php echo $row['prenomA'] ?></td>
                                                <td><?php echo $row['salaire'] ?></td>
                                                <td><?php echo $row['prime'] ?></td>
                                                <td><?php echo $row['nomS'] ?></td>
                                                <td><?php echo $row['dateAf'] ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="7">Pas de résultat</td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
