<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Nasze hobby</title>
    <link rel="stylesheet" type="text/css" href="hobby.css">
</head>
<body>
    <div id="baner">
        <h1>FORUM HOBBYSTYCZNE</h1>
    </div>
    <div id="lewy">
        <?php skrypt(); ?>
    
    </div>
    <div id="prawy">
        <h3>TEMATY NA FORUM</h3>
        <ul>
            <li>Hodowla zwierząt</li>
            <ul>
                <li>psy</li>
                <li>koty</li>
            </ul>
            <li>Muzyka</li>
            <li>Gry komputerowe</li>
        </ul>
    </div>
</body>
</html>

<?php

function skrypt()
{
    if(!empty($_POST['nick']) && !empty($_POST['hobby']) && !empty($_POST['plec']) && !empty($_POST['login']) && !empty($_POST['haslo']) && !empty($_POST['check']))
    {
        $conn = mysqli_connect('localhost','root','','Forum');
        if(!$conn)
        {
            exit('Błąd połączenia z serwerem');
        }
        else
        {
            $nick = $_POST['nick'];
            $hobby = $_POST['hobby'];
            $plec = $_POST['plec'];
            $zawod = $_POST['zawod'];
            $login = $_POST['login'];
            $haslo = $_POST['haslo'];
            $check = $_POST['check'];

            echo 'Konto '.$nick.' zostało zarejestrowane na forum hobbystycznym';
            $query = mysqli_query($conn, "INSERT INTO `uzytkownicy` VALUES (NULL, '$nick', '$hobby', '$zawod', '$plec');");
            $query2 = mysqli_query($conn, "INSERT INTO  `konta` VALUES (NULL, '$login', '$haslo');");

        }
        mysqli_close($conn);
    }
}

?>