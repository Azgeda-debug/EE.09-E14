<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Hurtownia papiernicza</title>
    <link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>
    <div id="baner">
        <h1>W naszej hurtowni kupisz najtaniej</h1>
    </div>
    <div id="lewy">
        <h3>Ceny wybranych artykułów w hurtowni:</h3>
        <table>
            <?php skrypt1(); ?>
        </table>
    </div>
    <div id="srodkowy">
        <h3>Ile będą kosztować Twoje zakupy?</h3>
        <form action="index.php" method="post">
            wybierz artykuł
            <select name="artykul">
                <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
                <option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
                <option value="Cyrkiel">Cyrkiel</option>
                <option value="Linijka 30 cm">Linijka 30 cm</option>
                <option value="Ekierka">Ekierka</option>
                <option value="Linijka 50 cm">Linijka 50 cm</option>
            </select>
            <br> liczba sztuk: <input type="number" name="sztuki" value="1"><br>
            <input type="submit" value="OBLICZ">
        </form>
        <?php skrypt2(); ?>
    </div>
    <div id="prawy">
        <img src="zakupy2.png" alt="hurtownia">
        <h3>Kontakt</h3>
        <p>telefon: <br> 111222333 <br> e-mail: <br> <a href="mailto:hurt@wp.pl">hurt@wp.pl</a></p>
    </div>
    <div id="stopka">
        <h4>Witrynę wykonał 00000000000</h4>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost','root','','sklep');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT nazwa, cena FROM `towary` LIMIT 4;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<tr><td>'.$result[0].'</td><td>'.$result[1].'</td></tr>';
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn = mysqli_connect('localhost','root','','sklep');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {

        if(!empty($_POST['artykul']))
        {
            $artykul = $_POST['artykul'];
            $sztuki = $_POST['sztuki'];
            $koszt = 0;

            $query = mysqli_query($conn, "SELECT cena FROM `towary` WHERE nazwa = '$artykul';");
            while($result = mysqli_fetch_array($query))
            {
                $koszt = $sztuki * $result[0];
                $koszt = round($koszt, 1);
                
                echo $koszt;
            }
        }
    }
    mysqli_close($conn);
}

?>