<?php
    include 'dbbroker.php';
    include 'model/zaposleni.php';

    session_start();
    if(isset($_POST['login']) ){ //kada korisnik klikne dugme login
        //preuzimamo podatke iz forme 
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $kozmeticar = new Zaposleni(null,null,null,$email,$pass);

        $status = Zaposleni::login($kozmeticar,$conn);

        if($status){
            echo "ULOGOVAN";
            
            header('Location: pocetna.php'); //ako je korisnik ulogovan mozemo da ga posaljemo na glavnu stranicu
        }else{
            echo "GRESKA";
        }


    }

    if(isset($_POST['register']) ){ //kada korisnik klikne dugme register
        //preuzimamo podatke iz forme 
        $email = $_POST['emailR'];
        $pass = $_POST['passR']; 
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];


       
            $kozmeticar = new Zaposleni(null,$ime,$prezime,$email,$pass);

            $status = Zaposleni::register($kozmeticar,$conn);
    
            if($status){
                echo "Registrovan";
              
                header('Location: index.php'); //ako je korisnik ulogovan mozemo da ga posaljemo na login stranicu
            }else{
                echo "GRESKA";
            }
       

       


    }












?>