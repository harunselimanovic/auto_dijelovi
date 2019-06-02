<?php
include('konekcija.php');
?>


<form action="" method="post">
    Ime: <input type="text" name="ime"><br>
    Kategorija: <input type="text" name="kategorija"><br>
    <input type="submit" value="Trazi">
</form>

<?php
$ime = $_POST['ime'];
$kategorija = $_POST['kategorija'];

if($ime && $kategorija) {
    $sql = "SELECT * FROM dijelovi WHERE `ime` = '$ime' AND `kategorija` = '$kategorija'";
    $result = mysqli_query($konekcija, $sql);
}elseif ($ime) {
    $sql = "SELECT * FROM dijelovi WHERE `ime` = '$ime'";
    $result = mysqli_query($konekcija, $sql);
}else {
    $sql = "SELECT * FROM dijelovi WHERE `kategorija` = '$kategorija'";
    $result = mysqli_query($konekcija, $sql);
}

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }


    foreach ($rows as $item) {
    }
} else {
    echo "Zao nam je nema rezultata!";
}

foreach ($rows as $item) {
    ?>
<img src="slike/<?php echo $item['slika']?>" alt="">
    <?php

}
?>

