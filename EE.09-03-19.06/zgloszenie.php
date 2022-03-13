<?php

if(!empty($_POST['lowisko']) && !empty($_POST['data']) && !empty($_POST['sedzia']))
{
    $lowisko = $_POST['lowisko'];
    $data = $_POST['data'];
    $sedzia = $_POST['sedzia'];

    $conn = mysqli_connect('localhost','root','','wedkarstwo');
    if(!$conn)
    {
        exit('Błąd połaczenia z serwerem');
    }
    else
    {
        $query = mysqli_query($conn, "INSERT INTO `zawody_wedkarskie` VALUES (NULL, 0, $lowisko, '$data', '$sedzia');");
    }
    mysqli_close($conn);
}

?>