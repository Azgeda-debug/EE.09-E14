<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Odżywianie zwierząt</title>
    <link rel="stylesheet" type="text/css" href="styl4.css">
</head>
<body>
    <div id="baner">
        <h2>DRAPIEŻNIKI I INNE</h2>
    </div>
    <div id="formularz">
        <h3>Wybierz styl życia:</h3>
        <form action="index.php" method="post">
            <select name="styl">
                <option value="1">Drapieżniki</option>
                <option value="2">Roślinożerne</option>
                <option value="3">Padlinożerne</option>
                <option value="4">Wszytkożerne</option>
            </select>
            <input type="submit" value="Zobacz">
        </form>
    </div>
    <div id="lewy">
        <h3>Lista zwierząt</h3>
        <?php skrypt1(); ?>
    </div>
    <div id="srodkowy">
        <?php skrypt2(); ?>
    </div>
    <div id="prawy">
        <img src="drapieznik.jpg" alt="Wilki">
    </div>
    <div id="stopka">
        <a href="pl.wikipedia.org" target="_blank">Poczytaj o zwierzętach na Wikipedii</a>
        autor strony: 0000000000
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost','root','','baza');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, " SELECT zwierzeta.gatunek, odzywianie.rodzaj FROM `zwierzeta` INNER JOIN odzywianie ON zwierzeta.Odzywianie_id = odzywianie.id;");
        echo '<ul>';
        while($result = mysqli_fetch_array($query))
        {
            echo '<li>'.$result[0].' '.$result[1].'</li>';
        }
        echo '</ul>';
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn = mysqli_connect('localhost','root','','baza');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        if(!empty($_POST['styl']))
        {
            $styl = $_POST['styl'];

            if($styl == 1)
            {
                echo '<h3>Drapieżnik</h3>';
            }
            if($styl == 2)
            {
                echo '<h3>Roślonożerne</h3>';
            }
            if($styl == 3)
            {
                echo '<h3>Padlinożerne</h3>';
            }
            if($styl == 4)
            {
                echo '<h3>Wszystkożerne</h3>';
            }

            $query = mysqli_query($conn, "SELECT id, gatunek, wystepowanie FROM `zwierzeta` WHERE Odzywianie_id = $styl;");
            while($result = mysqli_fetch_array($query))
            {
                echo $result[0].'.'.$result[1].', '.$result[2].'<br>';
            }
        }
    }
    mysqli_close($conn);
}

?>