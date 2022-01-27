<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Odloty samolotów</title>
    <link rel="stylesheet" type="text/css" href="styl6.css">
</head>
<body>
    <div id="lewy-baner">
        <h2>Odloty z lotniska</h2>
    </div>
    <div id="prawy-baner">
        <img src="zad6.png" alt="logotyp">
    </div>
    <div id="glowny">
        <h4>tabela odlotów</h4>
        <table>
            <tr>
                <th>lp.</th>
                <th>numer rejsu</th>
                <th>czas</th>
                <th>kierunek</th>
                <th>status</th>
            </tr>
            <?php skrypt1(); ?>
        </table>
    </div>
    <div id="lewa-stopka">
        <a href="kw1.jpg" target="_blank">Pobierz obraz</a>
    </div>
    <div id="srodkowa-stopka">
            <?php skrypt2(); ?>
    </div>
    <div id="prawa-stopka">
        Autor: 00000000000
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn=mysqli_connect('localhost','root','','egzamin');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query=mysqli_query($conn, "SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM `odloty` ORDER BY czas DESC;");
        while($result=mysqli_fetch_array($query))
        {
            echo '<tr><td>'.$result[0].'</td><td>'.$result[1].'</td><td>'.$result[2].'</td><td>'.$result[3].'</td><td>'.$result[4].'</td></tr>';
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    if(!isset($_COOKIE['cookie']))
    {
        setcookie('cookie',time()+3600);
        echo '<p><i>Dzień dobry! Sprawdź regulamin naszej strony</i></p>';
    }
    else
    {
        echo '<p><b>Miło nam, że znowu nas odwiedziłeś</b></p>';
    }
}   

?>