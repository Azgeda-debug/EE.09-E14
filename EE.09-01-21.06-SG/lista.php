<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Lista przyjaciół</title>
    <link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>
    <div id="baner">
        <h1>Portal Społecznościowy - moje konto</h1>
    </div>
    <div id="glowny">
        <h2>Moje zainteresowania</h2>
        <ul>
            <li>muzyka</li>
            <li>film</li>
            <li>komputery</li>
        </ul>
        <h2>Moi znajomi</h2>
        <?php skrypt(); ?>
    </div>
    <div id="lewa-stopka">
        Stronę wykonał: 00000000000
    </div>
    <div id="prawa-stopka">
        <a href="mailto:ja@portal.pl">napisz do mnie</a>
    </div>
</body>
</html>

<?php

function skrypt()
{
    $conn=mysqli_connect('localhost','root','','dane');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query=mysqli_query($conn, "SELECT imie, nazwisko, opis, zdjecie FROM `osoby` WHERE Hobby_id=1 OR Hobby_id=2 OR Hobby_id=6;");
        while($result=mysqli_fetch_array($query))
        {
            echo '<div class="zdjecie"><img src='.$result[3].' alt="przyjaciel"></div>';
            echo '<div class="opis"><h3>'.$result[0].' '.$result[1].'</h3><p>Ostatni wpis: '.$result[2].'</p></div>';
            echo '<div class="linia"><hr></div>';
        }
    }
    mysqli_close($conn);
}

?>