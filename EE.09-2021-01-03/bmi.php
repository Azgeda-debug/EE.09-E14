<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Twoje BMI</title>
    <link rel="stylesheet" type="text/css" href="styl3.css">
</head>
<body>
    <div id="logo">
        <img src="wzor.png" alt="wzór BMI">
    </div>
    <div id="baner">
        <h1>Oblicz swoje BMI</h1>
    </div>
    <div id="glowny">
    <table>
        <tr>
            <th>Interpretacja BMI</th>
            <th>Wartośc minimalna</th>
            <th>Wartość maksymalna</th>
        </tr>
        <?php skrypt1(); ?>
    </table>
    </div>
    <div id="lewy">
        <h2>Podaj wagę i wzrost</h2>
        <form action="bmi.php" method="post">
            Waga: <input type="number" name="waga" min="1"><br>
            Wzrost w cm: <input type="number" name="wzrost" min="1"><br>
            <input type="submit" value="Oblicz i zapamiętaj wynik">
        </form>
        <?php skrypt2(); ?>
    </div>
    <div id="prawy">
        <img src="rys1.png" alt="ćwiczenia">
    </div>
    <div id="stopka">
        Autor: 00000000000
        <a href="kwerendy.txt">Zobacz kwerendy</a>
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
        $query=mysqli_query($conn, "SELECT informacja, wart_min, wart_max FROM `bmi`;");
        while($result=mysqli_fetch_array($query))
        {
            echo '<tr><td>'.$result[0].'</td><td>'.$result[1].'</td><td>'.$result[2].'</td></tr>';
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
        if(!empty($_POST['waga']) && !empty($_POST['wzrost']))
        {
            $waga=$_POST['waga'];
            $wzrost=$_POST['wzrost'];
            $BMI=$waga/($wzrost*$wzrost)*10000;
            $przedzial=0;
            $data=date('Y-m-d');

            echo 'Twoja waga: '.$waga.' Twój wzrost: '.$wzrost.'<br>BMI wynosi: '.$BMI;

            if($BMI>=0 && $BMI<18)
            {
                $przedzial=1;
            }
            elseif($BMI>=19 && $BMI<=25)
            {
                $przedzial=2;
            }
            elseif($BMI>=26 && $BMI<=30)
            {
                $przedzial=3;
            }
            elseif($BMI>=31 && $BMI<=100)
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

?>