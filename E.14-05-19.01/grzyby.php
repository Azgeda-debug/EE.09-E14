<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Grzybobranie</title>
    <link rel="stylesheet" type="text/css" href="styl5.css">
</head>
<body>
    <div id="miniatura">
        <a href="borowik.jpg"><img src="borowik-miniatura.jpg" alt="Grzybobranie"></a>
    </div>
    <div id="tytul">
        <h1>Idziemy na grzyby!</h1>
    </div>
    <div id="lewy">
        <?php skrypt1(); ?>
    </div>
    <div id="prawy">
        <h2>Grzyby jadalne</h2>
        <?php skrypt2(); ?>
        <h2>Polecamy do sosów</h2>
        <?php skrypt3(); ?>
    </div>
    <div id="stopka">
        <p>Autor: 00000000000</p>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost','root','','dane2');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT nazwa_pliku, potoczna FROM `grzyby`;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<img src="'.$result[0].'" alt="'.$result[1].'" title="'.$result[1].'">';
        }
    }
}

function skrypt2()
{
    $conn = mysqli_connect('localhost','root','','dane2');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT nazwa, potoczna FROM `grzyby` WHERE jadalny = 1;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<p>'.$result[0].'('.$result[1].')</p>';
        }
    }
}

function skrypt3()
{
        $conn = mysqli_connect('localhost','root','','dane2');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT grzyby.nazwa, grzyby.potoczna, rodzina.nazwa FROM `grzyby` INNER JOIN rodzina ON grzyby.rodzina_id = rodzina.id WHERE potrawy_id = 1;");
        echo '<ol>';
        while($result = mysqli_fetch_array($query))
        {
            echo '<li>'.$result[0].'('.$result[1].'), rodzina: '.$result[2].'</li>';
        }
        echo '</ol>';
    }
}

?>