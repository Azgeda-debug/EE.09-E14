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
            <input type="number">
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
        <?php skrypt2(); ?>
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

function skrypt2()
{
    $conn = mysqli_connect('localhost','root','','przychodnia');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        if(!empty($_POST['id']))
        {
            $id = $_POST['id'];

            $query = mysqli_query($conn, "SELECT imie, nazwisko, choroby_przewlekle, uczulenia FROM `pacjenci` WHERE id = $id;");
            while($result = mysqli_fetch_array($query))
            {
                echo '<p>Imię i nazwisko: '.$result[0].' '.$result[1].'</p><p>Choroby przewlekłe: '.$result[2].'</p><p>Uczulenia: '.$result[3].'</p>';
            }
        }
    }
    mysqli_close($conn);
}

?>