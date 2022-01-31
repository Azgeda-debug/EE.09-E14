<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Warzywniak</title>
    <link rel="stylesheet" type="text/css" href="styl2.css">
</head>
<body>
    <div id=lewy-baner>
        <h1>Internetowy sklep z eko-warzywami</h1>
    </div>
    <div id="prawy-baner">
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <li><a href="https://terapiasokami.pl/" target="_blank">soki</a></li>
        </ol>
    </div>
    <div id="glowny">
        <?php skrypt1() ?>
    </div>
    <div id="stopka">
        <form action="sklep.php" method="post">
            Nazwa: <input type="text" name="nazwa">
            Cena: <input type="text" name="cena">
            <input type="submit" value="Dodaj produkt">
        </form>
        <?php skrypt2(); ?>
        Stronę wykonał: 00000000000
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn=mysqli_connect('localhost','root','','dane2');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query=mysqli_query($conn, "SELECT nazwa, ilosc, opis, cena, zdjecie FROM `produkty` WHERE Rodzaje_id=1 or Rodzaje_id=2;");
        while($result=mysqli_fetch_array($query))
        {
            echo '<div class="produkt">
                <img src="'.$result[4].'" alt="warzywniak">
                <h5>'.$result[0].'</h5>
                <p>opis: '.$result[2].'</p>
                <p>na stanie: '.$result[1].'</p>
                <h2>'.$result[3].' zł</h2>
            </div>';
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn=mysqli_connect('localhost','root','','dane2');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        if(!empty($_POST['nazwa']) && !empty($_POST['cena']))
        {
            $nazwa = $_POST['nazwa'];
            $cena = $_POST['cena'];

            $query=mysqli_query($conn, "INSERT INTO produkty VALUES (NULL, 1, 4, '$nazwa', 10, '', '$cena', 'owoce.jpg');");
        }
        else
        {

        }

    }
    mysqli_close($conn);
}

?>