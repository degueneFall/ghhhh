<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include'../../nav/sidebar.php'; ?>
    <link rel="stylesheet" href="../../CSS/sidebar.css">
    <link rel="stylesheet" href="../../CSS/formulaire.css">
    <link rel="stylesheet" href="../../CSS/liste.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Agent</title>
    <style>
        @media print {
            .print-button, .btn, .sidebar, .alert, .card-header ,.bx, th:nth-child(7), td:nth-child(7) {
                display: none;
            }
            .card-header{
                display: none;
            }
        }
    </style>
</head>

<body>
    <?php 
    if (isset($_GET['delete']) && $_GET['delete'] == 1) { ?>
        <div class='alert alert-danger corner-radius container mt-4'>
            <p> Suppression réussie!!!</p>
        </div>
    <?php unset($_GET['delete']);
    } ?>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
        <div class='alert alert-success corner-radius container mt-4'>
            <p>Modification réussie</p>
        </div>
    <?php unset($_GET['success']);
    } ?>
    
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                Liste Rattachement
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Date Début</th>
                            <th>Date Fin</th>
                            <th>Budget</th>
                            <th>CodeS</th>
                            <th>CodeM</th>
                            <th class="actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../../bd/bd.php';
                        $stmt = $connexion->query("SELECT * FROM rattacher");

                        while ($row = $stmt->fetch()) { ?>
                            <tr>
                                <td><?php echo $row["numR"]; ?></td>
                                <td><?php echo $row["dated"]; ?></td>
                                <td><?php echo $row["datef"]; ?></td>
                                <td><?php echo $row["budget"]; ?></td>
                                <td><?php echo $row["codeS"]; ?></td>
                                <td><?php echo $row["codeM"]; ?></td>
                                <td>
                                    <a class="btn btn-warning" href="../modification/modifierRattacher.php?numR=<?php echo $row['numR']; ?>">
                                        <i class='bx bx-edit-alt'></i>
                                    </a>
                                    <a class="btn btn-danger" href="../../traitements/suppression/supprimerRattacher.php?numR=<?php echo $row['numR']; ?>" onclick="return confirm('Vous êtes sur le point de supprimer, vous voulez vraiment supprimer?');">
                                        <i class='bx bx-trash'></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <button class="btn btn-primary print-button" onclick="window.print()">Imprimer</button>
    </div>
    
</body>

</html>