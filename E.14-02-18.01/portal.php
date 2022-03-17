<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Ogłoszenia drobne</title>
    <link rel="stylesheet" type="text/css" href="styl2.css">
</head>
<body>
    <div id="baner">
        <h2>Ogłoszenia drobne</h2>
    </div>
    <div id="lewy">
        <h2>Ogłoszeniodawcy</h2>
        <?php skrypt(); ?>
    </div>
    <div id="prawy">
        <h2>Nasze kategorie</h2>
        <ul>
            <li>Książki</li>
            <li>Muzyka</li>
            <li>Multimedia</li>
        </ul>
        <img src="ksiazki.jpg" alt="uwolnij swoją książkę">
        <table>
            <tr>
                <td>Ile?</td>
                <td>Koszt</td>
                <td>Pormocja</td>
            </tr>
            <tr>
                <td>1-40</td>
                <td>1,20 PLN</td>
                <td rowspan="2">Subskrybuj newsletter upust 0,30 PLN na ogłoszenie</td>
            </tr>
            <tr>
                <td>41 i więcej</td>
                <td>0,70 PLN</td>
            </tr>
        </table>
    </div>
    <div id="stopka">
        Portal ogłoszenia drobne opracował: 00000000000
    </div>
</body>
</html>

<?php

function skrypt()
{
    $conn = mysqli_connect('localhost','root','','ogloszenia');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT uzytkownik.id, uzytkownik.imie, uzytkownik.nazwisko, uzytkownik.email, ogloszenie.tytul FROM `uzytkownik` INNER JOIN `ogloszenie` ON uzytkownik.id = ogloszenie.uzytkownik_id WHERE uzytkownik.id < 4 GROUP BY uzytkownik.id;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<h3>'.$result[0].' '.$result[1].' '.$result[2].'</h3><p>'.$result[3].'</p><p> Ogłoszenie: '.$result[4].'</p>';
        }
    }
    mysqli_close($conn);
}

?>