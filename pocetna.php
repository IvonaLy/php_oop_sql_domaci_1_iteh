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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        
                       
                             
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="searchbar">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
        </nav>


        <br><br><br>
           <div class="pocetna">
            <button type="button" class="btn btn-primary" onclick="sortirajPoCeni() " style="float:right"> <i class="fa fa-sort" aria-hidden="true"></i>   Sortiraj tretmane po ceni</button>

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal" id="dodajT">Dodaj</button>
                <table class="table table-striped" id="tabelaTretmana">
                    <thead>
                        <tr>
                        <th scope="col">Opcije</th>
                        <th scope="col">ID</th>
                        <th scope="col">Naziv</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Ime i prezime</th>
                       
                        <th scope="col">Opis</th>
                        <th scope="col">Cena</th>

                        </tr>
                    </thead>
                    <tbody id="teloTabele">
                    <?php
                        
                        while($red = $termini->fetch_array()): ?>

                            <tr>
                                <td> 
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="azuriraj1(<?php echo $red['idTe'];?>)">Izmeni</button>   
                                    <button type="button" class="btn btn-danger" onclick="obrisi(<?php echo $red['idTe']?>)">Obrisi</button>

                                </td> 
                                <th scope="row"><?php echo $red['idTe'];   ?></th>
                                <td><?php echo $red['naziv'];   ?></td>  
                                <td><?php echo $red['datumVreme'];   ?></td>  
                                <td><?php echo $red['ime']." ".$red['prezime'] ?></td>
                                 
                                <td><?php echo $red['opis']  ?></td> 
                                <td><?php echo $red['cena']  ?></td> 
                               


                            </tr>

                        <?php    
                                endwhile;
                        ?>



                    </tbody>
                    </table>
                    <!-- Sledeca linija koda nam treba da bismo cuvali podatak da li treba da soritamo rastuce ili opadajuce -->
                    <input type="hidden" id="poredak" value="asc"> 
                                     
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






 <!-- Modal za izmenu termina -->
 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Izmeni termin </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="promeniTermin" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                                   <input type="hidden" id="terminZaIzmenu" name="terminZaIzmenu">

                              
                                                                        

                            <div class="form-group">
                                    
                                    <label for="kozmeticariE">Odaberi zaposlenog</label><br>
                                      <select name="kozmeticariE" id="kozmeticariE">
                                      <?php
                                         $kozmeticari = Zaposleni::vratiSve($conn);  
                                        while($red = $kozmeticari->fetch_array()): 
                                      ?>
                                      
                                        <option value=<?php echo $red["id"]?>><?php echo $red["ime"]." ".$red["prezime"]?></option>


                                        <?php   endwhile;   ?>
                                      </select>
                                         
                              </div>

                              <div class="form-group">
                                      <label for="tretmaniE">Odaberi tretman</label><br>
                                      <select name="tretmaniE" id="tretmaniE">
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
                                                <input type="date" id="datumE" name="datumE" class="form-control"  required="required" />
                                            </div>
                                        </div>
                                </div>
  
         

                       
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
                            <button type="submit" class="btn btn-success" >Potvrdi</button>
                        </div>



                    </form>
                    </div>
              
           
                </div>
            </div>

 <!-- kraj Modala za izmenu termina -->







































      <script src="js/main.js"></script>      
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>