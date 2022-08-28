
<?php
    require "../dbbroker.php";
    include '../model/termin.php';
    
    if(isset($_POST["kozmeticariE"]) && isset($_POST["tretmaniE"]) && isset($_POST["datumE"]) && isset($_POST['terminZaIzmenu']) ){
         $termin = new Termin($_POST['terminZaIzmenu'],$_POST['datumE'],$_POST['kozmeticariE'],$_POST["tretmaniE"]);
         $status= Termin::promeniTermin($termin,$conn);
        
       
        
          if($status){
          
             echo 'Success';
          }else{
              echo $status;
              echo 'Failed';
          }
    }



    
?>