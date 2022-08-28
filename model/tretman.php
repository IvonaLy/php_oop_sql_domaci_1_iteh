<?php

    class Tretman{
        private $id;
        private $naziv;
        private $opis; 
        private $cena; 
        private $vreme; 



        public function __construct($id=null, $naziv=null,$opis=null, $vreme=null, $cena=null ){
            $this->id=$id;
            $this->naziv=$naziv;
            $this->vreme=$vreme;
            $this->cena=$cena;  
            $this->opis=$opis; 

        }
        public static function vratiSveTretmane($conn){
            $upit ="select * from tretman";

            return $conn->query($upit);
        }



    }




?>