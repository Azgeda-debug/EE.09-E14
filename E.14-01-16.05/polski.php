<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Szkoła Ponadgimnazjalna</title>
    <link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>
    <div class="baner">
        <h1>Oceny uczniów: język polski</h1>
    </div>
    <div class="lewy">
        <h2>Lista uczniów:</h2>
        <ol>
            <?php skrypt1(); ?>
        </ol>
    </div>
    <div class="prawy">
        <h2>Uczeń: <?php skrypt2(); ?></h2>
        <p>Średnia ocen z języka polskiego: <?php skrypt3(); ?></p>
    </div>
    <div class="stopka">
        <h3>Zespół Szkół Ponadgimnazjalnych</h3>
        <p>Stronę opracował: 00000000000</p>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost', 'root', '', 'szkola');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT imie, nazwisko FROM `uczen`;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<li>'.$result[0].' '.$result[1].'</li>';
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn = mysqli_connect('localhost', 'root', '', 'szkola');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT imie, nazwisko FROM `uczen` WHERE id = 2;");
        while($result = mysqli_fetch_array($query))
        {
            echo $result[0].' '.$result[1]; 
        }
    }
    mysqli_close($conn);
}

function skrypt3()
{
    $conn = mysqli_connect('localhost', 'root', '', 'szkola');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT AVG(ocena.ocena) FROM `ocena` WHERE uczen_id = 2 AND przedmiot_id = 1;");
        while($result = mysqli_fetch_array($query))
        {
            echo $result[0]; 
        }
    }
    mysqli_close($conn);
}

?>