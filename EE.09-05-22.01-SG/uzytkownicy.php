<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" type="text/css" href="styl5.css">
</head>
<body>
    <div id="lewy-baner">
        <h2>Nasze osiedle</h2>
    </div>
    <div id="prawy-baner">
        <?php skrypt1(); ?>
    </div>
    <div id="lewy">
        <h3>Logowanie</h3>
        <form action="uzytkownicy.php" method="post">
            login: <br> <input type="text" name="login"><br>
            hasło: <br> <input type="password" name="haslo"><br>
            <input type="submit" value="Zaloguj">
        </form>
    </div>
    <div id="prawy">
        <h3>Wizytówka</h3>
        <?php skrypt2(); ?>
    </div>
    <div id="stopka">
        Stronę wykonał: 00000000000
    </div>
</body>
</html>

<?php

function  skrypt1()
{
    $conn = mysqli_connect('localhost','root','','portal');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT COUNT(*) FROM `dane`;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<h5>Liczba użytkowników portalu: '.$result[0].'</h5>';
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn = mysqli_connect('localhost','root','','portal');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        if(!empty($_POST['login']) && !empty($_POST['haslo']))
        {
            $login = $_POST['login'];
            $haslo = $_POST['haslo'];
            $wiek = 0;
            $data = date('Y');

            $query = mysqli_query($conn, "SELECT haslo, login FROM `uzytkownicy` WHERE login = '$login';");
            while($result = mysqli_fetch_array($query))
            {
                if($_POST['login'] == $login)
                {
                    $haslo = sha1($haslo);
                    
                    if($haslo == $result['haslo'])
                    {
                        $query2 = mysqli_query($conn, "SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM `uzytkownicy` INNER JOIN dane ON uzytkownicy.id = dane.id WHERE uzytkownicy.login = '$login';");
                        while($result2 = mysqli_fetch_array($query2))
                        {
                            $wiek = $data - $result2[1];
                            echo '<div id="wizytowka">
                                <img src="'.$result2[4].'" alt="osoba">
                                <h4>'.$result2[0].' ['.$wiek.']</h4>
                                <p>hobby: '.$result2[3].'</p>
                                <h1><img src="icon-on.png" alt="serce"> '.$result2[2].'</h1>
                                <a href="dane.html"><input type="submit" value="Więcej informacji"></a>
                            </div>';
                        }
                    }
                    else
                    {
                        echo 'hasło nieprawidłowe';
                    }
                }
                else
                {
                    echo 'login nieprawidłowy';
                }
            }
        }
        else
        {
            echo 'Wprowadz wszystkie dane';
        }
    }
    mysqli_close($conn);
}

?>

