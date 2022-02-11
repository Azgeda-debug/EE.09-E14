<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Prognoza pogody Poznań</title>
    <link rel="stylesheet" type="text/css" href="styl4.css">
</head>
<body>
    <div id="lewy-baner">
        <p>maj, 2019 r.</p>
    </div>
    <div id="srodkowy-baner">
        <h2>Prognoza pogody Poznań</h2>
    </div>
    <div id="prawy-baner">
        <img src="logo.png" alt="prognoza">
    </div>
    <div id="lewy">
        <a href="kwerendy.txt">Kwerendy</a>
    </div>
    <div id="prawy">
        <img src="obraz.jpg" alt="Polska, Poznań">
    </div>
    <div id="glowny">
        <table>
            <tr>
                <th>Lp.</th>
                <th>DATA</th>
                <th>NOC - TEMPERATURA</th>
                <th>DZIEŃ - TEMPERATURA</th>
                <th>OPADY [mm/h]</th>
                <th>CIŚNIENIE [hPa]</th>
            </tr>
            <?php skrypt1(); ?>
        </table>
    </div>
    <div id="stopka">
        <p>Stronę wykonał: 00000000000</p>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost','root','','prognoza');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $numer = 1;

        $query = mysqli_query($conn, "SELECT * FROM `pogoda` WHERE miasta_id = 2 ORDER BY data_prognozy DESC;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<tr><td>'.$numer.'</td><td>'.$result[2].'</td><td>'.$result[3].'</td><td>'.$result[4].'</td><td>'.$result[5].'</td><td>'.$result[6].'</td></tr>';
            $numer++;
        }
    }
    mysqli_close($conn);
}

?>