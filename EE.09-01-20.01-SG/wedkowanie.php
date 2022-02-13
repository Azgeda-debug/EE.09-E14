<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Klub wędkowania</title>
    <link rel="stylesheet" type="text/css" href="styl2.css">
</head>
<body>
    <div id="baner">
        <h2>Wędkuj z nami!</h2>
    </div>
    <div id="lewy">
        <img src="ryba2.jpg" alt="Szczupak">
    </div>
    <div id="prawy">
        <h3>Ryby spokojnego żeru(białe)</h3>
        <?php skrypt1(); ?>
        <ol>
            <li><a href="https://wedkuje.pl/" target="_blank">Odwiedź także</a></li>
            <li><a href="http://www.pzw.org.pl/" target="_blank">Polski Związek Wędkarski</a></li>
        </ol>
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
        $query = mysqli_query($conn, "SELECT id, nazwa, wystepowanie FROM `ryby` WHERE styl_zycia = 2;");
        while($result = mysqli_fetch_array($query))
        {
            echo $result[0].'. '.$result[1].', występuje w: '.$result[2].'<br>';
        }
    }
    mysqli_close($conn);
}

?>