<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wycieszki i urlopy</title>
    <link rel="stylesheet" type="text/css" href="styl3.css">
</head>
<body>
    <div id="baner">
        <h1>BIURO PODRÓŻY</h1>
    </div>
    <div id="lewy">
        <h2>KONTAKT</h2>
        <a href="mailto:biuto@wycieczki.pl">napisz do nas</a>
        <p>telefon: 555666777</p>
    </div>
    <div id="srodkowy">
        <h2>GALERIA</h2>
        <?php skrypt1(); ?>
    </div>
    <div id="prawy">
        <h2>PROMOCJE</h2>
        <table>
            <tr>
                <td>Jesień</td>
                <td>Grupa 4+</td>
                <td>Grupa 10+</td>
            </tr>
            <tr>
                <td>5%</td>
                <td>10%</td>
                <td>15%</td>
            </tr>
        </table>
    </div>
    <div id="dane">
        <h2>LISTA WYCIECZEK</h2>
        <?php skrypt2(); ?>
    </div>
    <div id="stopka">
        <p>Stronę wykonał: 00000000000</p>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost','root','','egzamin3');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT nazwaPliku, podpis FROM `zdjecia` ORDER BY podpis ASC;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<img src="'.$result[0].'" alt="'.$result[1].'">';
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn = mysqli_connect('localhost','root','','egzamin3');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT id, dataWyjazdu, cel, cena FROM `wycieczki` WHERE dostepna = 1;");
        while($result = mysqli_fetch_array($query))
        {
            echo $result[0].'.'.$result[1].','.$result[2].', cena:'.$result[3].'<br>';
        }
    }
    mysqli_close($conn);
}

?>