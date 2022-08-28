<?php
    include 'dbbroker.php';
    include 'model/termin.php';
    $termini = Termin::vratiSveTermine($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .pocetna{
            padding: 10%;
        }
    </style>
</head>
<body>
           <div class="pocetna">

                <button type="button" class="btn btn-success">Dodaj</button>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Naziv</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Ime i prezime</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Opis</th>
                        <th scope="col">Opcije</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                        while($red = $termini->fetch_array()): ?>

                            <tr>
                                <th scope="row"><?php echo $red['idTe'];   ?></th>
                                <td><?php echo $red['naziv'];   ?></td>  
                                <td><?php echo $red['datumVreme'];   ?></td>  
                                <td><?php echo $red['ime']." ".$red['prezime'] ?></td>
                                <td><?php echo $red['cena']  ?></td> 
                                <td><?php echo $red['opis']  ?></td> 
                                <td> 
                                    <button type="button" class="btn btn-primary">Izmeni</button>   
                                    <button type="button" class="btn btn-danger" onclick="obrisi(<?php echo $red['idTe']?>)">Obrisi</button>

                                </td> 


                            </tr>

                        <?php    
                                endwhile;
                        ?>



                    </tbody>
                    </table>

           </div>

      <script src="js/main.js"></script>      
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>