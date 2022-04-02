<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Weterynarz</title>
    <link rel="stylesheet" type="text/css" href="weterynarz.css">
</head>
<body>
    <div id="baner">
        <h1>GABINET WETERYNARYJNY</h1>
    </div>
    <div id="lewy">
        <h2>PSY</h2>
        <?php skrypt1(); ?>
        <h2>KOTY</h2>
        <?php skrypt2(); ?>
    </div>
    <div id="srodkowy">
        <h2>SZCZEGÓŁOWA INFORMACJA O ZWIERZĘTACH</h2>
        <?php skrypt3(); ?>
    </div>
    <div id="prawy">
        <h2>WETERYNARZ</h2>
        <a href="logo.jpg"><img src="logo-mini.jpg" alt="logo-mini"></a>
        <p>Krzysztof Nowakowski, lekarz weterynarii</p>
        <h2>GODZINY PRZYJĘĆ</h2>
        <table>
            <tr>
                <td>Poniedziałek</td>
                <td>15:00 - 19:00</td>
            </tr>
            <tr>
                <td>Wtorek</td>
                <td>15:00 - 19:00</td>
            </tr>
        </table>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost', 'root', '', 'weterynarz');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT id, imie, wlasciciel FROM `zwierzeta` WHERE rodzaj = 1;");
        while($result = mysqli_fetch_array($query))
        {
            echo $result[0].' '.$result[1].' '.$result[2].'<br>';
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn = mysqli_connect('localhost', 'root', '', 'weterynarz');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT id, imie, wlasciciel FROM `zwierzeta` WHERE rodzaj = 2;");
        while($result = mysqli_fetch_array($query))
        {
            echo $result[0].' '.$result[1].' '.$result[2].'<br>';
        }
    }
    mysqli_close($conn);
}

function skrypt3()
{
       $conn = mysqli_connect('localhost', 'root', '', 'weterynarz');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT imie, telefon, szczepienie, opis FROM `zwierzeta`;");
        while($result = mysqli_fetch_array($query))
        {
            echo 'Pacjent: '.$result[0].'<br>Telefon właściciela: '.$result[1].' ostatnie szczepienie: '.$result[2].' informacje: '.$result[3].'<hr>';
        }
    }
    mysqli_close($conn); 
}

?>