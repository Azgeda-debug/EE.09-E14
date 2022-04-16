<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Szkoła Podstawowa</title>
    <link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>
    <div class="baner">
        <h1>Oceny uczniów: biologia</h1>
    </div>
    <div class="lewy">
        <h2>Uczeń: <?php skrypt1(); ?></h2>
        <p>Najwyższa ocena z biologii: <?php skrypt2(); ?></p>
    </div>
    <div class="prawy">
        <h3>Nazwiska i numery PESEL uczniów:</h3>
        <ul>
            <?php skrypt3(); ?>
        </ul>
    </div>
    <div class="stopka">
        <h3>Szkoła Podstawowa</h3>
        <p>Stronę opracował: 0000000000</p>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost','root','','szkola');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT imie, nazwisko FROM `uczen` WHERE id = 1;");
        while($result = mysqli_fetch_array($query))
        {
            echo $result[0].' '.$result[1];
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn = mysqli_connect('localhost','root','','szkola');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT MAX(ocena) FROM `ocena` WHERE przedmiot_id = 4 AND uczen_id = 1;");
        while($result = mysqli_fetch_array($query))
        {
            echo $result[0];
        }
    }
    mysqli_close($conn);
}

function skrypt3()
{
       $conn = mysqli_connect('localhost','root','','szkola');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT nazwisko, PESEL FROM `uczen`;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<li>'.$result[0].' '.$result[1].'</li>';
        }
    }
    mysqli_close($conn); 
}

?>