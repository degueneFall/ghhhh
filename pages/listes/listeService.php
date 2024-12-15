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
    
    <title>Service</title>
    <style>
        @media print {
            .print-button, .btn, .sidebar, .alert, .card-header, .bx, .actions {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <?php 
    if (isset($_GET['delete']) && $_GET['delete'] == 1) { ?>
        <div class='alert alert-danger corner-radius container mt-4'>
            <p>Service supprimé avec succès</p>
        </div>
    <?php unset($_GET['delete']);
    } ?>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
        <div class='alert alert-success corner-radius container mt-4'>
            <p>Service modifié avec succès</p>
        </div>
    <?php unset($_GET['success']);
    } ?>

    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">
                Liste Service
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>code</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th class="actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../../bd/bd.php';
                        $stmt = $connexion->query("SELECT * FROM service");

                        while ($row = $stmt->fetch()) { ?>
                            <tr>
                                <td><?php echo $row["codeS"]; ?></td>
                                <td><?php echo $row["nomS"]; ?></td>
                                <td><?php echo $row["description"]; ?></td>
                                <td class="actions">
                                    <a class="btn btn-warning" href="../modification/modifierService.php?codeS=<?php echo $row['codeS']; ?>">
                                        <i class='bx bx-edit-alt'></i>
                                    </a>
                                    <a class="btn btn-danger" href="../../traitements/suppression/supprimerService.php?codeS=<?php echo $row['codeS']; ?>" onclick="return confirm('Vous êtes sur le point de supprimer, vous voulez vraiment supprimer?');">
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
