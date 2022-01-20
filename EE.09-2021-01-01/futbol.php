<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Rozgrywki futbolowe</title>
    <link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>
    <div id="baner">
        <h2>Światowe Rozgrywki piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko">
    </div>
    <div id="mecze">
        <?php skrypt1(); ?>
    </div>
    <div id="glowny">
        <h2>Reprezentacja Polski</h2>
    </div>
    <div id="lewy">
        <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
        <form action="futbol.php" method="post">
            <input type="number" name="pozycja">
            <input type="submit" value="Sprawdz">
        </form>
        <ul>
            <?php skrypt2(); ?>
        </ul>
    </div>
    <div id="prawy">
        <img src="zad1.png" alt="piłkarz">
        <p>Autor: 00000000000</p>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn=mysqli_connect('localhost','root','','egzamin');
    if(!$conn)
    {
        exit("Błąd połączenia z serwerem");
    }
    else
    {
        $query=mysqli_query($conn, "SELECT zespol1, zespol2, wynik, data_rozgrywki FROM `rozgrywka` WHERE zespol1='EVG';");
        while($result=mysqli_fetch_array($query))
        {
            echo '<div class="rozgrywki">
                <h3>'.$result[0].' - '.$result[1].'</h3>
                <h4>'.$result[2].'</h4>
                <p>w dniu: '.$result[3].'</p>
            </div>';
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn=mysqli_connect('localhost','root','','egzamin');
    if(!$conn)
    {
        exit("Błąd połączenia z serwerem");
    }
    else
    {
        $pozycja=$_POST['pozycja'];

        if(!empty($pozycja))
        {
            $query=mysqli_query($conn, "SELECT imie, nazwisko FROM `zawodnik` WHERE pozycja_id=$pozycja;");
            while($result=mysqli_fetch_array($query))
            {
                echo '<li><p>'.$result[0].' '.$result[1].'</p></li>';
            }
        }
        else
        {
            echo " ";
        }

    }
    mysqli_close($conn);
}

?>