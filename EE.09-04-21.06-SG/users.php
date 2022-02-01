<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel administratora</title>
    <link rel="stylesheet" type="text/css" href="styl4.css">
</head>
<body>
    <div id="baner">
        <h3>Portal Społecznościowy - panel administratora</h3>
    </div>
    <div id="lewy">
        <h4>Uzytkownicy</h4>
        <?php skrypt1(); ?>
    </div>
    <div id="prawy">
        <h4>Podaj id użytkownika</h4>
        <form action="users.php" method="post">
            <input type="number" name="id">
            <input type="submit" value="ZOBACZ">
        </form>
        <hr>
        <?php skrypt2(); ?>
    </div>
   <div id="stopka">
        Stronę wykonał: 00000000000 
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn=mysqli_connect('localhost','root','','dane4');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query=mysqli_query($conn, "SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM `osoby` LIMIT 30;");
        while($result=mysqli_fetch_array($query))
        {
            $data = date('Y');
            $wiek = $data - $result[3];

            echo $result[0].' '.$result[1].' '.$result[2].' '.$wiek.'<br>';
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn=mysqli_connect('localhost','root','','dane4');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        if(!empty($_POST["id"]))
        {   
            $id = $_POST["id"];

            $query=mysqli_query($conn, "SELECT osoby.imie, osoby.nazwisko, osoby.rok_urodzenia, osoby.opis, osoby.zdjecie, hobby.nazwa FROM `osoby` INNER JOIN hobby ON osoby.Hobby_id=hobby.id WHERE osoby.id=$id;");
            while($result=mysqli_fetch_array($query))
            {
                echo '<h2>'.$id.'. '.$result[0].' '.$result[1].'</h2>
                     <img src="'.$result[4].'" alt="'.$id.'">
                     <p>Rok urodzenia: '.$result[2].'</p>
                     <p>Opis: '.$result[3].'</p>
                     <p>Hobby: '.$result[5].'</p>';
            }
        }
        else
        {

        }
    }
    mysqli_close($conn);
}

?>