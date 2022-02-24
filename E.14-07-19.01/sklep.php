<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Hurtownia</title>
    <link rel="stylesheet" type="text/css" href="styl1.css">
</head>
<body>
    <div id="logo">
        <img src="komputer.png" alt="hurtownia komputerowa">
    </div>
    <div id="lista">
        <ul>
            <li>Sprzęt</li>
            <ol>
                <li>Procesory</li>
                <li>Pamięć RAM</li>
                <li>Pamięć RAM</li>
                <li>Obudowy</li>
                <li>Karty graficzne</li>
                <li>Dyski twarde</li>
            </ol>
            <li>Oprogramowanie</li>
        </ul>
    </div>
    <div id="formularz">
        <h2>Hurtownia komputerowa</h2>
        <form action="sklep.php" method="post">
            Wybierz kategorię sprzętu 
            <input type="number" name="sprzet"> 
            <input type="submit" value="SPRAWDŹ">
        </form>
    </div>
    <div id="glowny">
        <h1>Podzespoły we wskazanej kategorii</h1>
        <?php skrypt1(); ?>
    </div>
    <div id="stopka">
        <h3>Hurtownia działa od poniedziałku do soboty w godzinach 7<sup>00</sup>- 16<sup>00</sup></h3>
        <a href="mailto:bok@hurtownia.pl">Napisz do nas</a>
        Partnerzy
        <a href="http://intel.pl/">Intel</a>
        <a href="http://amd.pl/">AMD</a>
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
        if(!empty($_POST['sprzet']))
        {
            $sprzet = $_POST['sprzet'];

            $query = mysqli_query($conn, "SELECT nazwa, opis, cena FROM `podzespoly` WHERE typy_id = $sprzet;");
            while($result = mysqli_fetch_array($query))
            {
                echo '<p>'.$result[0].' '.$result[1].' CENA: '.$result[2].'</p>';
            }
        }
        else
        {
            echo 'Wybierz poprawną kategorię sprzętu';
        }
    }
    mysqli_close($conn);
}

?>