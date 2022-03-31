<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przychodnia</title>
    <link rel="stylesheet" type="text/css" href="przychodnia.css">
</head>
<body>
    <div id="baner">
        <h1>PRAKTYKA LEKARZA RODZINNEGO</h1>
    </div>
    <div id="lewy">
        <h3>LISTA PACJENTÓW</h3>
        <?php skrypt1(); ?><br><br>
        <form action="pacjent.php" method="post">
            <label for="id">Podaj id:</label><br>
            <input type="number" name="id" id="id">
            <input type="submit" value="Pokaż dane">
        </form>
        <h3>LEKARZE</h3>
        <ul>
            <li>pn - śr</li>
            <ol>
                <li>Anna Kwiatkowska</li>
                <li>Jan Kowalewski</li>
            </ol>
            <li>czw - pt</li>
            <ol>
                <li>Krzysztof Nowak</li>
            </ol>
        </ul>
    </div>
    <div id="prawy">
        <h2>INFORMACJE SZCZEGÓŁOWE O PACJENCIE</h2>
        <p>Brak wybranego pacjenta</p>
    </div>
    <div id="stopka">
        <p>utworzone przez: 00000000000</p>
        <a href="kwerendy.txt" download>Pobierz plik z kwerendami</a>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost','root','','przychodnia');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT id, imie, nazwisko FROM `pacjenci`;");
        while($result = mysqli_fetch_array($query))
        {
            echo $result[0].' '.$result[1].' '.$result[2].'<br>';
        }
    }
    mysqli_close($conn);
}

?>