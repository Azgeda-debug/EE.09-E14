<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restauracja Kulinaria.pl</title>
    <link rel="stylesheet" type="text/css" href="styl4.css">
</head>
<body>
    <div id="baner">
        <h2>Restauracja Kulinaria.pl Zaprasza!</h2>
    </div>
    <div id="lewy">
        <p>Dania mięsne zamówisz już od <?php skrypt1(); ?> złotych</p>
        <img src="menu.jpg" alt="Pyszne spaghetti"><br>
        <a href="menu.jpg" download>Pobierz obraz</a>
    </div>
    <div id="srodkowy">
        <h3>Przekąski</h3>
        <?php skrypt2(); ?>
    </div>
    <div id="prawy">
        <h3>Napoje</h3>
        <?php skrypt3(); ?>
    </div>
    <div id="stopka">
        Stronę internetową opracował: <i>00000000000</i>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost','root','','baza');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT MIN(cena) FROM `dania` WHERE typ = 2;");
        while($result = mysqli_fetch_array($query))
        {
            echo $result[0];
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn = mysqli_connect('localhost','root','','baza');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT id, nazwa, cena FROM `dania` WHERE typ = 3;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<p>'.$result[0].' '.$result[1].' '.$result[2].'</p>';
        }
    }
    mysqli_close($conn); 
}

function skrypt3()
{
    $conn = mysqli_connect('localhost','root','','baza');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT id, nazwa, cena FROM `dania` WHERE typ = 4;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<p>'.$result[0].' '.$result[1].' '.$result[2].'</p>';
        }
    }
    mysqli_close($conn);
}

?>