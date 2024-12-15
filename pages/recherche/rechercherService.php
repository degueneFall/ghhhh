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
                        <input type="text" class="form-control" value="<?php if(isset($_POST['search'])){echo $_POST['search'];}  ?>" name="search" placeholder="Entrez le code du Service" >
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
                             <th>Description</th>

                         </tr>
                          </thead>
                          <tbody>
                          <?php
include '../../bd/bd.php';

if(isset($_POST['search']))
{
    $filtervalue = $_POST['search'];
    $filterdata = ("SELECT * FROM service
    WHERE  codeS =$filtervalue
    ");

    $filterdata_run = $connexion->prepare($filterdata);
    $filterdata_run->execute(); 

    $result = $filterdata_run->fetchAll(PDO::FETCH_ASSOC); 

    if($result){
        foreach($result as $row){
            ?>
            <tr>
                
                <td><?php echo $row['codeS'] ?></td>
                <td><?php echo $row['nomS'] ?></td>
                <td><?php echo $row['description'] ?></td>
             
             
            </tr>
            <?php
        }
    }
    else{
        ?>
        <tr>
            <td colspan="6" >Pas de resultat</td>
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