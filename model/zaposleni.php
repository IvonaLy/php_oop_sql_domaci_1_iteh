<?php


    class Zaposleni{

        private $id;
        private $ime;
        private $prezime;
        private $email;
        private $sifra;


        public function __construct($id=null,$ime=null,$prezime=null,$email=null,$sifra=null)
        {
            $this->id=$id;
            $this->ime=$ime;
            $this->prezime=$prezime;
            $this->email=$email;
            $this->sifra=$sifra;
 
        }


        public static function login($kozmeticar, $conn){
            $upit = "Select * from zaposleni where email='$kozmeticar->email' and sifra= '$kozmeticar->sifra'";


            return $conn->query($upit);
        }

        public static function register($kozmeticar,$conn){
            $upit = "insert into zaposleni(ime,prezime,email,sifra) values('$kozmeticar->ime','$kozmeticar->prezime','$kozmeticar->email' ,'$kozmeticar->sifra') ";
        
            return $conn->query($upit);
    
        }
 

    }





?>