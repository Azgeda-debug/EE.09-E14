<?php

$conn = mysqli_connect('localhost','root','','dane');
if(!$conn)
{
    exit('Błąd połączenia z serwerem');
}
else
{
    if(!empty($_POST['tytul']) && !empty($_POST['gatunek']) && !empty($_POST['rok']) && !empty($_POST['ocena']))
    {
        $tytul = $_POST['tytul'];
        $gatunek = $_POST['gatunek'];
        $rok = $_POST['rok'];
        $ocena = $_POST['ocena'];

        $query = mysqli_query($conn, "INSERT INTO `filmy` (gatunki_id, tytul, rok, ocena) VALUES ($gatunek, '$tytul', $rok, $ocena);");
        echo 'Film '.$tytul.' został dodany do bazy.';
    }
}
mysqli_close($conn);

?>