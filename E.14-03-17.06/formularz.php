<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sklep muzyczny</title>
    <link rel="stylesheet" type="text/css" href="muzyka.css">
</head>
<body>
    <div id="baner">
        <h1>SKLEP MUZYCZNY</h1>
    </div>
    <div id="lewy">
        <h2>NASZA OFERTA</h2>
        <ol>
            <li>Instrumenty muzyczne</li>
            <li>Sprzęt audio</li>
            <li>Płyty CD</li>
        </ol>
    </div>
    <div id="prawy">
        <?php skrypt(); ?>
    </div>
</body>
</html>

<?php

function skrypt()
{
    
    if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['adres']) && !empty($_POST['telefon']) && !empty($_POST['login']) && !empty($_POST['haslo']))
    {
        $conn = mysqli_connect('localhost','root','','sklep');
        if(!$conn)
        {
            exit('Błąd połączenia z serwerem');
        }
        else
        {
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $adres = $_POST['adres'];
            $telefon = $_POST['telefon'];
            $login = $_POST['login'];
            $haslo = $_POST['haslo'];
    
            echo 'Konto  '.$imie.' '.$nazwisko.' zostało zarejestrowane w sklepie muzycznym';
            $query = mysqli_query($conn, "INSERT INTO `uzytkownicy` VALUES (NULL, '$imie', '$nazwisko', '$adres', '$telefon');");
            $query2 = mysqli_query($conn, "INSERT INTO `konta` VALUES (NULL, '$login', '$haslo');");
        }
        mysqli_close($conn);
    }
}

?>