<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sklep papierniczy</title>
    <link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>
    <div id="baner">
        <h1>W naszym sklepie internetowym kupisz najtaniej</h1>
    </div>
    <div id="lewy">
        <h3>Promocja 15% obejmuje artykuły:</h3>
        <ul>
            <?php skrypt1(); ?>
        </ul>
    </div>
    <div id="srodkowy">
        <h3>Cena wybranego artykułu w promocji</h3>
        <form action="index.php" method="post">
            <select name="towar">
                <option value="Gumka do mazania">Gumka do mazania</option>
                <option value="Cienkopis">Cienkopis</option>
                <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
                <option value="Markery 4 szt.">Markery 4 szt.</option>
            </select>
            <input type="submit" value="WYBIERZ">
        </form>
        <?php skrypt2(); ?>
    </div>
    <div id="prawy">
        <h3>Kontakt</h3>
        <p>telefon 123123123 <br> e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
        <img src="promocja2.png" alt="promocja">
    </div>
    <div id="stopka">
        <h4>Autor strony 00000000000</h4>
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
        $query = mysqli_query($conn, "SELECT nazwa FROM `towary` WHERE promocja = 1;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<li>'.$result[0].'</li>';
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
        if(!empty($_POST['towar']))
        {
            $towar = $_POST['towar'];
            $cena = 0;

            $query = mysqli_query($conn, "SELECT cena FROM `towary` WHERE nazwa = '$towar';");
            while($result = mysqli_fetch_array($query))
            {
                $cena = $result[0]*0.85;
                $cena = round($cena, 2);
                echo $cena;
            }
        }
    }
    mysqli_close($conn);
}

?>