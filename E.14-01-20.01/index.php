<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Nasz sklep komputerowy</title>
    <link rel="stylesheet" type="text/css" href="styl8.css">
<body>
    <div id="menu">
        <a href="index.php">Główna</a>
        <a href="procesory.html">Procesory</a>
        <a href="ram.html">RAM</a>
        <a href="grafika.html">Grafika</a>
    </div>
    <div id="logo">
        <h2>Podzespoły komputerowe</h2>
    </div>
    <div id="glowny">
        <h1>Dzisiejsze promocje</h1>
        <table>
            <tr>
                <th>NUMER</th>
                <th>NAZWA PODZESPOŁU</th>
                <th>OPIS</th>
                <th>CENA</th>
            </tr>
            <?php skrypt1(); ?>
        </table>
    </div>
    <div class="stopka">
        <img src="scalak.jpg" alt="promocje na procesory">
    </div>
    <div class="stopka">
        <h4>Nasz Sklep Komputerowy</h4>
        <p>Współpracujemy z hurtownią <a href="http://www.edata.pl/" target="_blank">edata</a></p>
    </div>
    <div class="stopka">
        <p>zadzwoń: 601 602 603</p>
    </div>
    <div class="stopka">
        <p>Stronę wykonał: 00000000000</p>
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
        $query = mysqli_query($conn, "SELECT id, nazwa, opis, cena FROM `podzespoly` WHERE cena < 1000;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<tr><td>'.$result[0].'</td><td>'.$result[1].'</td><td>'.$result[2].'</td><td class="prawa">'.$result[3].'</td></tr>';
        }
    }
    mysqli_close($conn);
}

?>