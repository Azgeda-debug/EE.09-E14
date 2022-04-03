<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Salon pielęgnacji</title>
    <link rel="stylesheet" type="text/css" href="salon.css">
</head>
<body>
    <div id="baner">
        <h1>SALON PIELĘGNACJI PSÓW I KOTÓW</h1>
    </div>
    <div id="lewy">
        <h3>SALON ZAPRASZA W DNIACH</h3>
        <ul>
            <li>Poniedziałek, 12:00 - 18:00</li>
            <li>Wtorek, 12:00 - 18:00</li>
        </ul>
        <a href="pies.jpg"><img src="pies-mini.jpg" alt="pies-mini"></a>
        <p>Umów się telefonicznie na wizytę lub po prostu przyjdź!</p>
    </div>
    <div id="srodkowy">
        <h3>PRZYPOMNIENIE O NASTĘPNEJ WIZYCIE</h3>
        <?php skrypt1(); ?>
    </div>
    <div id="prawy">
        <h3>USŁUGI</h3>
        <?php skrypt2(); ?>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost','root','','salon');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT imie, rodzaj, nastepna_wizyta, telefon FROM `zwierzeta` WHERE nastepna_wizyta != 'NULL';");
        while($result = mysqli_fetch_array($query))
        {
            if($result[1] == 1)
            {
                echo 'Pies: '.$result[0].'<br>Data następnej wizyty: '.$result[2].' telefon właściciela: '.$result[3].'<br>';
            }

            if($result[1] == 2)
            {
                echo 'Kot: '.$result[0].'<br>Data następnej wizyty: '.$result[2].' telefon właściciela: '.$result[3].'<br>';
            }
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn = mysqli_connect('localhost','root','','salon');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT nazwa, cena FROM `uslugi`;");
        while($result = mysqli_fetch_array($query))
        {
            echo $result[0].' '.$result[1].'<br>';
        }
    }
    mysqli_close($conn); 
}

?>