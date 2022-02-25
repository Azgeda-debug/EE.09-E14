<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hurtownia komputerowa</title>
    <link rel="stylesheet" type="text/css" href="styl2.css">
</head>
<body>
    <div id="lista">
        <ul>
            <li>Producenci</li>
            <ol>
                <li>Intel</li>
                <li>AMD</li>
                <li>Motorola</li>
                <li>Corsair</li>
                <li>ADATA</li>
                <li>WD</li>
                <li>Kingstone</li>
                <li>Patriot</li>
                <li>Asus</li>
            </ol>
        </ul>
    </div>
    <div id="formularz">
        <h1>Dystrybucja sprzętu komputerowego</h1>
        <form action="hurtownia.php" method="post">
            Wybierz producenta 
            <input type="number" name="producent"> 
            <input type="submit" value="WYŚWIETL">
        </form>
    </div>
    <div id="logo">
        <img src="sprzet.png" alt="Sprzedajemy komputery">
    </div>
    <div id="glowny">
        <h1>Podzespoły wybranego producenta</h1>
        <?php skrypt1(); ?>
    </div>
    <div id="stopka">
        <h3>Zapraszamy od poniedziałku do soboty w godzinach 7<sup>00</sup>-16<sup>30</sup></h3>
        Strony partnerów:
        <a href="http://adata.pl/" target="_blank">ADATA</a>
        <a href="http://patriot.pl/" target="_blank">Patriot</a>
        <a href="mailto:biuro@hurt.pl">Napisz</a>
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
        if(!empty($_POST['producent']))
        {
            $producent = $_POST['producent'];

            $query = mysqli_query($conn, "SELECT nazwa, dostepnosc, cena FROM `podzespoly` WHERE producenci_id = $producent;");
            while($result = mysqli_fetch_array($query))
            {
                if($result[1] == 1)
                {
                    echo '<p>'.$result[0].' CENA: '.$result[2].' DOSTĘPNY</p>';
                }
                else
                {
                    echo '<p>'.$result[0].' CENA: '.$result[2].' NIEDOSTĘPNY</p>';
                }
            }
        }
        else
        {
            echo 'Wyierz producenta';
        }
    }
    mysqli_close($conn);
}

?>