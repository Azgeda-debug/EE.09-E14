<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dane o zwierzętach</title>
    <link rel="stylesheet"  type="text/css" href="styl3.css">
</head>
<body>
    <div id="baner">
        <h1>ATLAS ZWIERZĄT</h1>
    </div>
    <div id="formularz">
        <h2>Gromady</h2>
        <ol>
            <li>Ryby</li>
            <li>Płazy</li>
            <li>Gady</li>
            <li>Ptaki</li>
            <li>Ptaki</li>
        </ol>
        <form action="index.php" method="post">
            Wybierz gromadę <input type="number" name="gromada">
            <input type="submit" value="Wyświetl">
        </form>
    </div>
    <div id="lewy">
        <img src="zwierzeta.jpg" alt="dzikie zwierzęta">
    </div>
    <div id="srodkowy">
        <?php skrypt1(); ?>
    </div>
    <div id="prawy">
        <h2>Wszystkie zwierzęta w bazie</h2>
        <?php skrypt2(); ?>
    </div>
    <div id="stopka">
        <a href="atlas-zwierzat.pl" target="_blank">Poznaj inne strony o zwierzętach</a>
        autor Atlasu zwierząt: 00000000000
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
        if(!empty($_POST['gromada']))
        {
            $gromada = $_POST['gromada'];

            if($gromada == 1)
            {
                echo '<h2>RYBY</h2>';
            }
            elseif($gromada == 2)
            {
                echo '<h2>PŁAZY</h2>';
            }
            elseif($gromada == 3)
            {
                echo '<h2>GADY</h2>';
            }

            elseif($gromada == 4)
            {
                echo '<h2>PTAKI</h2>';
            }

            elseif($gromada == 5)
            {
                echo '<h2>SSAKI</h2>';
            }

            $query = mysqli_query($conn, " SELECT gatunek, wystepowanie FROM `zwierzeta` WHERE Gromady_id = $gromada;");
           while($result = mysqli_fetch_array($query))
            {
                echo '<p>'.$result[0].', '.$result[1].'</p>';
            }

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
        $query = mysqli_query($conn, "SELECT zwierzeta.id, zwierzeta.gatunek, gromady.nazwa FROM `zwierzeta` INNER JOIN gromady ON zwierzeta.Gromady_id = gromady.id");
        while($result = mysqli_fetch_array($query))
         {
             echo $result[0].', '.$result[1].', '.$result[2].'<br>';
         }  
    }
    mysqli_close($conn);
}

?>