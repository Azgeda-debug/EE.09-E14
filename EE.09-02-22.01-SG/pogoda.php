<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Prognoza pogody Wrocław</title>
    <link rel="stylesheet" type="text/css" href="styl2.css">
</head>
<body>
    <div id="lewy-baner">
        <img src="logo.png" alt="meteo">
    </div>
    <div id="srodkowy-baner">
        <h1>Prognoza dla Wrocławia</h1>
    </div>
    <div id="prawy-baner">
        <p>maj, 2019 r.</p>
    </div>
    <div id="glowny">
        <table>
            <tr>
                <th>DATA</th>
                <th>TEMPERATURA W NOCY</th>
                <th>TEMPERATURA W DZIEŃ</th>
                <th>OPADY [mm/h]</th>
                <th>CIŚNIENIE [hPa]</th>
            </tr>
            <?php skrypt1(); ?>
        </table>
    </div>
    <div id="lewy">
        <img src="obraz.jpg" alt="Polska, Wrocław">
    </div>
    <div id="prawy">
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
    $conn = mysqli_connect('localhost','root','','prognoza');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT * FROM `pogoda` WHERE miasta_id=1 ORDER BY data_prognozy ASC;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<tr><td>'.$result[2].'</td><td>'.$result[3].'</td><td>'.$result[4].'</td><td>'.$result[5].'</td><td>'.$result[6].'</td></tr>';
        }
    }
    mysqli_close($conn);
}

?>