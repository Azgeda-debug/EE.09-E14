<?php

    if(!empty($_POST['imie']) && !empty($_POST['adres']) && !empty($_POST['adres']))
    {
        $imie=$_POST['imie'];
        $nazwisko=$_POST['nazwisko'];
        $adres=$_POST['adres'];

        $conn=mysqli_connect('localhost','root','','wedkowanie');
        if(!$conn)
        {
            exit('Błąd połączenia z serwerem');
        }
        else
        {
            $query=mysqli_query($conn, "INSERT INTO karty_wedkarskie VALUES (NULL, '$imie', '$nazwisko', '$adres', Null, NULL);");
        }
        mysqli_close($conn);
    }
    else
    {   
        echo 'Musisz podać wszystkie dane';
    }

?>