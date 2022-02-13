<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Gromady kręgowców</title>
    <link rel="stylesheet" type="text/css" href="style12.css">
</head>
<body>
    <div id="menu">
        <div id="linki">
        <a href="gromada-ryby.html">gromada ryb</a> 
        <a href="gromada-ptaki.html">gromada ptaków</a> 
        <a href="gromada-ssaki.html">gromada ssaków</a> 
        </div>
    </div>
    <div id="logo">
        <h2>GROMADY KRĘGOWCÓW</h2>
    </div>
    <div id="lewy-glowny">
        <?php skrypt1(); ?>
    </div>
    <div id="prawy-glowny">
        <h1>PTAKI</h1>
        <ol>
            <?php skrypt2(); ?>
        </ol>
        <img src="sroka.jpg" alt="Sroka zwyczajna, gromada ptaki">
    </div>
    <div id="stopka">
        Stronę o kręgowcach przygotował: 00000000000
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
        $query = mysqli_query($conn, "SELECT id, Gromady_id, gatunek, wystepowanie FROM `zwierzeta` WHERE Gromady_id = 4 OR Gromady_id = 5;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<p>'.$result[0].'. '.$result[2].'</p>';

            if($result[1] == 4)
            {
                echo '<p>Występowanie: '.$result[3].', gromada ptaki</p>';
            }
            elseif($result[1] == 5)
            {
                echo '<p>Występowanie: '.$result[3].', gromada ssaki</p>';
            }

            echo '<hr>';
        }
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
        $query = mysqli_query($conn, "SELECT gatunek, obraz FROM `zwierzeta` WHERE Gromady_id = 4;");
        while($result = mysqli_fetch_array($query))
        {
            echo '<li><a href="'.$result[1].'">'.$result[0].'</a></li>';
        }
    }
    mysqli_close($conn); 
}

?>