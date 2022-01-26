<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" type="text/css" href="styl5.css">
</head>
<body>
    <div id="pierwszy-baner">
        <img src="zad5.png" alt="logo lotnisko">
    </div>
    <div id="drugi-baner">
        <h1>Przyloty</h1>
    </div>
    <div id="trzeci-baner">
        <h3>przydatne linki</h3>
        <a href="kwerendy.txt" target="_blank">Pobierz...</a>
    </div>
    <div id="glowny">
        <table>
            <tr>
                <th>czas</th>
                <th>kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
            <?php skrypt1(); ?>
        </table>
    </div>
    <div id="pierwsza-stopka">
        <?php skrypt2(); ?>
    </div>
    <div id="druga-stopka">
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
        $query=mysqli_query($conn, "SELECT czas, kierunek, nr_rejsu, status_lotu FROM `przyloty` ORDER BY czas ASC;");
        while($result=mysqli_fetch_array($query))
        {
            echo '<tr><td>'.$result[0].'</td><td>'.$result[1].'</td><td>'.$result[2].'</td><td>'.$result[3].'</td></tr>';
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    if(!isset($_COOKIE['cookie']))
    {
        setcookie('cookie',time()+2*3600);
        echo '<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>';
    }
    else
    {
        echo '<p><i>Witaj ponownie na stronie lotniska</i></p>';
    }
}

?>