<?php
include('konekcija.php');

$sql = "SELECT * FROM dijelovi";
$result = mysqli_query($konekcija, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }

    foreach ($rows as $item) {
        echo $item['id'];
    }
} else {
    echo "Zao nam je nema rezultata!";
}

?>
