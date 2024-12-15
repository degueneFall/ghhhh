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
                        <input type="number" class="form-control" value="<?php if(isset($_POST['search'])){echo $_POST['search'];}  ?>" name="search" placeholder="Entrez le code du ministere" >
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
                                    <th>Code</th>
                                    <th>Nom</th>
                                    <th>Service</th>
                                    <th>Budget</th>
                                    <th>Date Debut</th>
                                    <th>Date Fin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../../bd/bd.php';

                                if(isset($_POST['search'])) {
                                    $filterValue = $_POST['search'];
                                    $query = "SELECT m.codeM, m.nomM, s.nomS, r.budget, r.dated, r.datef
                                              FROM ministere m
                                              LEFT JOIN rattacher r ON m.codeM = r.codeM
                                              LEFT JOIN service s ON r.codeS = s.codeS
                                              WHERE m.codeM = $filterValue";

                                    $result = $connexion->query($query)->fetchAll(PDO::FETCH_ASSOC);

                                    if($result) {
                                        foreach($result as $row) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['codeM'] ?></td>
                                                <td><?php echo $row['nomM'] ?></td>
                                                <td><?php echo $row['nomS'] ?></td>
                                                <td><?php echo $row['budget'] ?></td>
                                                <td><?php echo $row['dated'] ?></td>
                                                <td><?php echo $row['datef'] ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="6">Pas de résultat</td>
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
