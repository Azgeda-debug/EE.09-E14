<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styl1.css">
</head>
<body>
    <div id="baner">
        <h1>Portal Ogłoszeniowy</h1>
    </div>
    <div id="lewy">
        <h2>Kategorie ogłoszeń</h2>
        <ol>
            <li>Książki</li>
            <li>Muzyka</li>
            <li>Filmy</li>
        </ol>
        <img src="ksiazki.jpg" alt="Kupię / sprzedam książkę">
        <table>
            <tr>
                <td>Liczba ogłoszeń</td>
                <td>Cena ogłoszenia</td>
                <td>Bonus</td>
            </tr>
            <tr>
                <td>1-10</td>
                <td>1 PLN</td>
                <td rowspan="3">Subskrypcja newslettera to upust 0,20 PLN na ogłoszenie</td>
            </tr>
            <tr>
                <td>11-50</td>
                <td>0,80 PLN</td>
            </tr>
            <tr>
                <td>51 i więcej</td>
                <td>0,60 PLN</td>
            </tr>
        </table>
    </div>
    <div id="prawy">
        <h2>Ogłoszenia kategorii książki</h2>
        <?php skrypt(); ?>
    </div>
    <div id="stopka">
        Portal ogłoszeniowy opracował: 00000000000
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
        $query = mysqli_query($conn, "SELECT id, tytul, tresc from ogloszenie WHERE kategoria = 1;");
        $query2 = mysqli_query($conn, "SELECT telefon FROM uzytkownik inner JOIN ogloszenie On uzytkownik.id = ogloszenie.uzytkownik_id ;");
        while ($result = mysqli_fetch_array($query)) 
        {
            $result2 = mysqli_fetch_array($query2);
            echo '<h3>'.$result[0].' '.$result[1].'</h3><p>'.$result[2].'</p><p>Telefon kontaktowy: '.$result2[0].'</p>';
        }
    }
    mysqli_close($conn);
}

?>