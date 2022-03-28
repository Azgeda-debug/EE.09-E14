<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wynajmujemy samochody</title>
    <link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>
    <div id="baner">
        <h1>Wynajem Samochodów</h1>
    </div>
    <div id="lewy">
        <h2>DZIŚ POLECAMY TOYOTĘ ROCZNIK 2014</h2>
        <?php skrypt1(); ?>
        <h2>WSZYSTKIE DOSTĘPNE SAMOCHODY</h2>
        <?php skrypt2(); ?>
    </div>
    <div id="srodkowy">
        <h2>ZAMÓWIONE AUTA Z NUMERAMI TELEFONÓW KLIENTÓW</h2>
        <?php skrypt3(); ?>
    </div>
    <div id="prawy">
        <h2>NASZA OFERTA</h2>
        <ul>
            <li>Fiat</li>
            <li>Toyota</li>
            <li>Opel</li>
            <li>Mercedes</li>
        </ul>
        <p>Tu pobierzesz naszą <a href="komis.sql">bazę danych</a></p>
        <p>autor strony: 0000000000</p>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost','root','','wynajem');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT id, model, kolor FROM `samochody` WHERE marka = 'Toyota' AND rocznik = 2014;");
        while($result = mysqli_fetch_array($query))
        {
            echo $result[0].' Toyota: '.$result[1].'. Kolor: '.$result[2].'<br>';
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn = mysqli_connect('localhost','root','','wynajem');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT id, marka, model, rocznik FROM `samochody`;");
        while($result = mysqli_fetch_array($query))
        {
            echo $result[0].' '.$result[1].' '.$result[2].' '.$result[3].'<br>';
        }
    }
    mysqli_close($conn);
}

function skrypt3()
{
    $conn = mysqli_connect('localhost','root','','wynajem');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT samochody.id, samochody.model, zamowienia.telefon FROM `samochody` INNER JOIN zamowienia ON samochody.id = zamowienia.Samochody_id;");
        while($result = mysqli_fetch_array($query))
        {
            echo $result[0].' '.$result[1].' '.$result[2].'<br>';
        }
    }
    mysqli_close($conn); 
}


?>