<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wędkujemy</title>
    <link rel="stylesheet" type="text/css" href="styl_1.css">
</head>
<body>
    <div id="baner">
        <h1>Portal dla wędkarzy</h1>
    </div>
    <div id="lewy">
        <h2>Ryby drapieżne naszych wód</h2>
        <ul>
            <?php skrypt1(); ?>
        </ul>
    </div>
    <div id="prawy">
        <img src="ryba1.jpg" alt="Sum">
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>
    <div id="stopka">
        <p>Stronę wykonał: 00000000000</p>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost','root','','wedkowanie');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT nazwa, wystepowanie FROM `ryby` WHERE styl_zycia = 1;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<li>'.$result[0].', występowanie: '.$result[1].'</li>';
        }
    }
    mysqli_close($conn);
}

?>