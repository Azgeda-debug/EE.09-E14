<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Poradnia</title>
    <link rel="stylesheet" type="text/css" href="poradnia.css">
</head>
<body>
    <div id="baner">
        <h1>PORADNIA SPECJALISTYCZNA</h1>
    </div>
    <div id="lewy">
        <h3>LEKARZE SPECJALIŚCI</h3>
        <table>
            <tr>
                <td colspan="2">Poniedziałek</td>
            </tr>
            <tr>
                <td>Anna Kowalska</td>
                <td>otolaryngolog</td>
            </tr>
            <tr>
                <td colspan="2">Wtorek</td>
            </tr>
            <tr>
                <td>Jan Nowak</td>
                <td>kardiolog</td>
            </tr>
        </table>
        <h3>LISTA PACJENTÓW</h3>
        <?php skrypt1(); ?><br><br>
        <form action="pacjent.php" method="post">
            <label for="id">Podaj id:</label><br>
            <input type="text" name="id" id="id">
            <input type="submit" value="Pokaż szczegóły">
        </form>
    </div>
    <div id="prawy">
        <h2>KARTA PACJENTA</h2>
        <?php skrypt2(); ?>
    </div>
    <div id="stopka">
        <p>utworzone przez: 0000000000</p>
        <a href="kwerendy.txt" download>Kwerendy do pobrania</a>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn = mysqli_connect('localhost','root','','poradnia');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "SELECT id, imie, nazwisko, choroba FROM `pacjenci`;");
        while($result = mysqli_fetch_array($query))
        {
            echo $result[0].' '.$result[1].' '.$result[2].' '.$result[3].'<br>';
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn = mysqli_connect('localhost','root','','poradnia');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        if(!empty($_POST['id']))
        {
            $id = $_POST['id'];

            $query = mysqli_query($conn, "SELECT imie, nazwisko, leki_przepisane, opis FROM `pacjenci` WHERE id = $id;");
            while($result = mysqli_fetch_array($query))
            {
                echo '<p>Imię i nazwisko: '.$result[0].' '.$result[1].'</p><p>Przepisane leki: '.$result[2].'</p><p>Opis choroby: '.$result[3].'</p><br>';
            }
        }
    }
    mysqli_close($conn);
}

?>