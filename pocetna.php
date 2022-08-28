<?php
    include 'dbbroker.php'; 

    include 'model/termin.php'; 
    include 'model/tretman.php';
    include 'model/zaposleni.php';


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
           <div class="pocetna">

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal" id="dodajT">Dodaj</button>
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



 <!-- Modal za rezervisanje novog termina -->
 <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rezervisi novi termin </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="rezervisi" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                           

                                        

                            <div class="form-group">
                                    
                                    <label for="kozmeticari">Odaberi zaposlenog</label><br>
                                      <select name="kozmeticari" id="kozmeticari">
                                      <?php
                                         $kozmeticari = Zaposleni::vratiSve($conn);  
                                        while($red = $kozmeticari->fetch_array()): 
                                      ?>
                                      
                                        <option value=<?php echo $red["id"]?>><?php echo $red["ime"]." ".$red["prezime"]?></option>


                                        <?php   endwhile;   ?>
                                      </select>
                                         
                              </div>

                              <div class="form-group">
                                      <label for="tretmani">Odaberi tretman</label><br>
                                      <select name="tretmani" id="tretmani">
                                      <?php
                                         $tretmani = Tretman::vratiSveTretmane($conn);  
                                        while($red = $tretmani->fetch_array()):
                                      ?>
                                      
                                        <option value=<?php echo $red["idTr"]?>><?php echo $red["naziv"]?></option>


                                        <?php   endwhile;   ?>
                                      </select>
                                </div>

 
                                <div class="form-group">
                                        <label for="message-text" class="col-form-label">Datum rezervacije</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon01"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="date" id="datum" name="datum" class="form-control"  required="required" />
                                            </div>
                                        </div>
                                </div>
   
         

                       
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
                            <button type="submit" class="btn btn-success" id="addButton">Potvrdi</button>
                        </div>



                    </form>
                    </div>
              
           
                </div>
            </div>

 <!-- kraj Modala za rezervisanje novog termina -->











































      <script src="js/main.js"></script>      
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>