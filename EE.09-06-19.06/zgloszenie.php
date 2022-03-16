<?php

$conn = mysqli_connect('localhost','root','','ratownictwo');
if(!$conn)
{
    exit('Błąd połączenia z serwerem');
}
else
{
    if(!empty($_POST['zespol']) && !empty($_POST['dyspozytor']) && !empty($_POST['adres']))
    {
        $zespol = $_POST['zespol'];
        $dyspozytor = $_POST['dyspozytor'];
        $adres = $_POST['adres'];

        $czas = date('H:i:s');

        $query = mysqli_query($conn, " INSERT INTO `zgloszenia` (id, ratownicy_id, dyspozytorzy_id, adres, pilne,  czas_zgloszenia) VALUES (NULL, $zespol, $dyspozytor, '$adres', 0, '$czas');");
    }
}
mysqli_close($conn);

?>