<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Filmoteka</title>
    <link rel="stylesheet" type="text/css" href="styl3.css">
</head>
<body>
    <div class="gorny">
        <img src="klaps.png" alt="Nasze filmy">
    </div>
    <div class="gorny">
        <h1>BAZA FILMÓW</h1>
    </div>
    <div class="gorny">
        <form method="post">
            <select name="gatunek">
                <option value="1">Sci-Fi</option>
                <option value="2">animacja</option>
                <option value="3">dramat</option>
                <option value="4">horror</option>
                <option value="5">komedia</option>
            </select>
            <input type="submit" value="Filmy">
        </form>
    </div>
    <div  class="gorny">
        <img src="gwiezdneWojny.jpg" alt="szturmowcy">
    </div>
    <div class="glowny">
        <h2>Wybrano filmy:</h2>
        <?php skrypt1(); ?>
    </div>
    <div  class="glowny">
        <h2>Wszystkie filmy</h2>
        <?php skrypt2(); ?>
    </div>
    <div id="stopka">
        <p>Autor: 00000000000</p>
        <a href="kwerendy.txt">Zapytania do bazy</a>
        <a href="filmy.pl" target="_blank">Przejdź do filmy.pl</a>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost','root','','dane');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        if(!empty($_POST['gatunek']))
        {
            $gatunek = $_POST['gatunek'];
            
            $query = mysqli_query($conn, "SELECT tytul, rok, ocena FROM `filmy` WHERE gatunki_id = $gatunek;");
            while($result = mysqli_fetch_array($query))
            {
                echo '<p>Tytuł: '.$result[0].', Rok produkcji: '.$result[1].', Ocena: '.$result[2].'</p>';
            }
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn = mysqli_connect('localhost','root','','dane');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT filmy.id, filmy.tytul, rezyserzy.imie, rezyserzy.nazwisko FROM `filmy` INNER JOIN rezyserzy ON filmy.rezyserzy_id = rezyserzy.id;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<p>'.$result[0].'.'.$result[1].', reżyseria: '.$result[2].' '.$result[3].'</p>';
        }
    }
    mysqli_close($conn);
}

?>