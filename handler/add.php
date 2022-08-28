<?php
    include '../dbbroker.php';
    include '../model/termin.php';
    include '../model/tretman.php';
 

    if(isset($_POST["kozmeticari"]) && isset($_POST["datum"]) && isset($_POST["tretmani"]) ){
       
        
         $termin = new Termin(null,$_POST["datum"],$_POST["kozmeticari"],$_POST["tretmani"]);
        
        $status= Termin::dodajTermin($termin,$conn);
        
        
          if($status){
             echo 'Success';
          }else{
              echo $status;
              echo 'Failed';
          }
    }
 
  

?>