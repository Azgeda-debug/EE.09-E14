<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>piłka nożna</title>
    <link rel="stylesheet" type="text/css" href="styl2.css">
</head>
<body>
    <div id="baner">
        <h3>Reprezentacja polski w piłce nożnej</h3>
        <img src="obraz1.jpg" alt="reprezentacja">
    </div>
    <div id="lewy">
        <form action="liga.php" method="post">
            <select name="pozycja">
                <option value="1">Bramkarze</option>
                <option value="2">Obrońcy</option>
                <option value="3">Pomocnicy</option>
                <option value="4">Napastnicy</option>
            </select>
            <input type="submit" value="Zobacz">
        </form>
        <img src="zad2.png" alt="piłka">
        <p>Autor: 00000000000</p>
    </div>
    <div id="prawy">
        <ol>
            <?php skrypt1(); ?>
        </ol>
    </div>
    <div id="glowny">
        <h3>Liga mistrzów</h3>
    </div>
    <div id="liga">
        <?php skrypt2(); ?>
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
        $pozycja=@$_POST['pozycja'];

        if(!empty($pozycja))
        {
            $query=mysqli_query($conn, "SELECT imie, nazwisko FROM `zawodnik` WHERE pozycja_id=$pozycja;");
            while($result=@mysqli_fetch_array($query))
            {
                echo '<li><p>'.$result[0].' '.$result[1].'</p></li>';
            }
        }
        else
        {
            echo ' ';
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
        $query=mysqli_query($conn, "SELECT zespol, punkty, grupa FROM `liga` ORDER BY punkty DESC; ");
        while($result=mysqli_fetch_array($query))
        {
            echo '<div class="druzyna">
                <h2>'.$result[0].'</h2>
                <h1>'.$result[1].'</h1>
                <p>grupa: '.$result[2].'</p>
            </div>';
        }
    }
    mysqli_close($conn);
}

?>