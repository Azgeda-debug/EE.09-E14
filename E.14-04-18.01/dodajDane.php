<?php

$conn = mysqli_connect('localhost','root','','ogloszenia');
if(!$conn)
{
    exit('Błąd połączenia z serwerem');
}
else
{
    if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['tel']) && !empty($_POST['email']))
    {
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];

        $query = mysqli_query($conn, " INSERT INTO `uzytkownik` VALUES (NULL, '$imie', '$nazwisko', '$tel', '$email');");
    }
}
mysqli_close($conn);

?>