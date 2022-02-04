<?php

if(!empty($_POST['karetka']) && !empty($_POST['pierwszy']) && !empty($_POST['drugi']) && !empty($_POST['trzeci']))
{
    $karetka = $_POST['karetka'];
    $pierwszy = $_POST['pierwszy'];
    $drugi = $_POST['drugi'];
    $trzeci = $_POST['trzeci'];

    $conn = mysqli_connect('localhost','root','','ee09');
    if(!$conn)
    {
        exit('Błąd połączenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "INSERT INTO `ratownicy` VALUES (NULL, $karetka, '$pierwszy', '$drugi', '$trzeci');");
        echo 'Do bazy zostało wisane zapytanie: INSERT INTO `ratownicy` VALUES (NULL, '.$karetka.', '.$pierwszy.', '.$drugi.', '.$trzeci.');';
    }
    mysqli_close($conn);
}
else
{

}

?>