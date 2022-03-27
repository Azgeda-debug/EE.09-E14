<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Komis Samochodowy</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="baner">
        <h1>SAMOCHODY</h1>
    </div>
    <div id="lewy">
        <h2>Wykaz samochodów</h2>
        <ul>
            <?php skrypt1(); ?>
        </ul>
        <h2>Zamówienia</h2>
        <ul>
            <?php skrypt2(); ?>
        </ul>
    </div>
    <div id="prawy">
        <h2>Pełne dane: Fiat <?php skrypt3(); ?> </h2>
    </div>
    <div id="stopka">
        <table>
            <tr>
                <td><a href="kwerendy.txt">Kwerendy</a></td>
                <td>Autor: 0000000000</td>
                <td><img src="auto.png" alt="komis samochodowy"></td>
            </tr>
        </table>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost','root','','komis');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT id, marka, model FROM `samochody`;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<li>'.$result[0].' '.$result[1].' '.$result[2].'</li>';
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn = mysqli_connect('localhost','root','','komis');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT Samochody_id, Klient FROM `zamowienia`;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<li>'.$result[0].' '.$result[1].'</li>';
        }
    }
    mysqli_close($conn);
}

function skrypt3()
{
    $conn = mysqli_connect('localhost','root','','komis');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT * FROM `samochody` WHERE marka = 'Fiat';");
        while($result = mysqli_fetch_array($query))
        {
            echo '<br>'.$result[0].'/'.$result[1].'/'.$result[2].'/'.$result[3].'/'.$result[4].'/'.$result[5].'/';
        }
    }
    mysqli_close($conn);
}

?>