<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Forum o psach</title>
    <link rel="stylesheet" type="text/css" href="styl4.css">
</head>
<body>
    <div id="baner">
        <h1>Forum wielbicieli psów</h1>
    </div>
    <div id="lewy">
        <img src="obraz.jpg" alt="foksterier">
    </div>
    <div id="pierwszy-prawy">
        <h2>Zapisz się</h2>
        <form action="logowanie.php" method="post">
            login: <input type="text" name="login"><br>
            hasło: <input type="password" name="haslo"><br>
            powtórz hasło: <input type="password" name="powtorz_haslo"><br>
            <input type="submit" value="Zapisz">
        </form>
        <?php skrypt1(); ?>
    </div>
    <div id="drugi-prawy">
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych, co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </div>
    <div id="stopka">
        Stronę wykonał: 00000000000
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost','root','','psy');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        if(empty($_POST['login']) || empty($_POST['haslo']) || empty($_POST['powtorz_haslo']))
        {
            echo '<p> wypełnij wszystkie pola</p>';
        }
        else
        {
            $login = $_POST['login'];
            $haslo = $_POST['haslo'];
            $powtorz_haslo = $_POST['powtorz_haslo'];
            $blad = 0;

            $query = mysqli_query($conn, "SELECT login FROM `uzytkownicy`;");
            while($result = mysqli_fetch_array($query))
            {
                if($result['login'] == $login)
                {
                echo '<p> login występuje w bazie danych, konto nie zostało dodane</p>';
                $blad = 1;
                }
            }
                if($haslo != $powtorz_haslo)
                {
                    echo '<p> hasła nie są takie same, konto nie zostało dodane</p>';
                    $blad = 1;
                }
               
                if($blad == 0)
                {
                    $haslo = sha1($haslo);

                    $query = mysqli_query($conn, "INSERT INTO `uzytkownicy` VALUES (NULL, '$login', '$haslo');");
                    echo '<p> Konto zostało dodane</p>'; 
                }
        }
    }
    mysqli_close($conn);
}

?>