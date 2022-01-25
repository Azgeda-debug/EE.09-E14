<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Twój wskaźnik BMI</title>
    <link rel="stylesheet" type="text/css" href="styl4.css">
</head>
<body>
    <div id="baner">
        <h2>Oblicz wskaźnik BMI</h2>
    </div>
    <div id="logo">
        <img src="wzor.png" alt="liczymi BMI">
    </div>
    <div id="lewy">
        <img src="rys1.png" alt="zrzuć kalorie!">
    </div>
    <div id="prawy">
        <h1>Podaj dane</h1>
        <form action="waga.php" method="post">
            Waga: <input type="number" name="waga"><br>
            Wzrost[cm]: <input type="number" name="wzrost"><br>
            <input type="submit" value="Licz BMI i zapisz wynik">
        </form>
        <?php skrypt1(); ?>
    </div>
    <div id="glowny">
        <table>
            <tr>
                <th>lp.</th>
                <th>Interpretacja</th>
                <th>zaczyna się od...</th>
            </tr>
            <?php skrypt2(); ?>
        </table>
    </div>
    <div id="stopka">
        Autor: 00000000000
        <a href="kw2.jpg">Wynik działania kwerendy 2</a>
    </div>
</body>
</html>

<?php

function skrypt1()
{
    $conn=mysqli_connect('localhost','root','','egzamin');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        if(!empty($_POST['waga']) && !empty($_POST['wzrost']))
        {
            $waga=$_POST['waga'];
            $wzrost=$_POST['wzrost'];
            $BMI=$waga/($wzrost*$wzrost)*10000;
            $przedzial=0;
            $data=date('Y-m-d');

            echo 'Twóa waga: '.$waga.' Twój wzrost: '.$wzrost.'<br>BMI wynosi: '.$BMI;

            if($BMI>=0 && $BMI<19)
            {
                $przedzial=1;
            }
            elseif($BMI>=19 && $BMI<26)
            {
                $przedzial=2;
            }
            elseif($BMI>=26 && $BMI<31)
            {
                $przedzial=3;
            }
            elseif($BMI>=31)
            {
                $przedzial=4;
            }

            $query=mysqli_query($conn, "INSERT INTO wynik VALUES (NULL, $przedzial, '$data', $BMI);");
        }
        else
        {
            echo ' ';
        }
    }
    mysqli_close($conn);
}

function skrypt2()
{
    $conn=mysqli_connect('localhost','root','','egzamin');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query=mysqli_query($conn, " SELECT id, informacja, wart_min FROM `bmi`;");
        while($result=mysqli_fetch_array($query))
        {
            echo '<tr><td>'.$result[0].'</td><td>'.$result[1].'</td><td>'.$result[2].'</td></tr>';
        }
    }
    mysqli_close($conn);
}

?>