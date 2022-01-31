<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Video On Demand</title>
    <link rel="stylesheet" type="text/css" href="styl3.css">
</head>
<body>
    <div id="lewy-baner">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </div>
    <div id="prawy-baner">
        <table>
            <tr>
                <td>Kryminał</td>
                <td>Horror</td>
                <td>Przygodowy</td>
            </tr>
            <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>
        </table>
    </div>
    <div id="lista-polecamy">
        <h3>Polecam</h3> 
        <?php skrypt1(); ?>
    </div>
    <div id="lista-filmy-fantastyczne">
        <h3>Filmy fantastyczne</h3>
        <?php skrypt2(); ?>
    </div>
    <div id="stopka">
        <form action="video.php" method="post">
            Usuń film nr.: <input type="number" name="numer">
            <input type="submit" value="Usuń film">
        </form>
        Stronę wykonał: <a href="mailto:ja@poczta.com">00000000000</a>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn=mysqli_connect('localhost','root','','dane3');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query=mysqli_query($conn, "SELECT id, nazwa, opis, zdjecie FROM `produkty` WHERE id=18 OR id=22 OR id=23 OR id=25;");
        while($result=mysqli_fetch_array($query))
        {
           echo '<div class="film">
                <h4>'.$result[0].' '.$result[1].'</h4>
                <img src="'.$result[3].'" alt="film">
                <p>'.$result[2].'</p>
            </div>';
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn=mysqli_connect('localhost','root','','dane3');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query=mysqli_query($conn, "SELECT id, nazwa, opis, zdjecie FROM `produkty`WHERE Rodzaje_id=12;");
        while($result=mysqli_fetch_array($query))
        {
           echo '<div class="film">
                <h4>'.$result[0].' '.$result[1].'</h4>
                <img src="'.$result[3].'" alt="film">
                <p>'.$result[2].'</p>
            </div>';
        }
    }
    mysqli_close($conn);
}

function skrypt3()
{
    $conn=mysqli_connect('localhost','root','','dane3');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        if(!empty($_POST['numer']))
        {
            $numer=$_POST['numer'];

            $query=mysqli_query($conn, "DELETE FROM produkty WHERE id=$numer;");
        }
        else
        {

        }
    }
    mysqli_close($conn);
}

?>