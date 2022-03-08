<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>  
    <div id="baner">
        <h2>Miejska Biblioteka Publiczna w Książkowicach</h2>
    </div>
    <div id="lewy">
        <h2>Dodaj czytelnika</h2>
        <form action="biblioteka.php" method="post">
            imię: <input type="text" name="imie"><br>
            nazwisko: <input type="text" name="nazwisko"><br>
            rok urodzenia: <input type="number" name="rok"><br>
            <input type="submit" value="DODAJ">
        </form>
        <?php skrypt1(); ?>
    </div>
    <div id="srodkowy">
        <img src="biblioteka.png" alt="biblioteka">
        <h4>ul. Czytelnicza 25 <br> 12-120 Książkowice <br> tel.: 123123123 <br> e-mail: <a href="mailto:biuro@bib.pl">biuro@bib.pl</a></h4>
    </div>
    <div id="prawy">
        <h3>Nasi czytelnicy:</h3>
        <ul>
            <?php skrypt2(); ?>
        </ul>
    </div>
    <div id="stopka">
        <p>Projekt witryny: 00000000000</p>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost','root','','biblioteka');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['rok']))
        {
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $rok = $_POST['rok'];
            $kod = $imie[0].$imie[1].$rok[2].$rok[3].$nazwisko[0].$nazwisko[1];

            $kod = strtolower($kod);

            echo 'Czytelnik '.$nazwisko.' został dodany do bazy danych';

            $query = mysqli_query($conn, "INSERT INTO `czytelnicy` VALUES (NULL, '$imie', '$nazwisko', '$kod');");
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn = mysqli_connect('localhost','root','','biblioteka');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT imie, nazwisko FROM `czytelnicy`;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<li>'.$result[0].' '.$result[1].'</li>';
        }
    }
    mysqli_close($conn);
}

?>