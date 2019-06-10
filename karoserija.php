<?php
include('header.html');
include('konekcija.php');
$upit_azuriraj = "Select * from dijelovi where kategorija = 'Karoserija'";
$dijelovi = mysqli_query($konekcija, $upit_azuriraj);
?>
    <a href="kategorije.php">Sve kategorije</a>
    <a href="motor.php">Motor kategorija</a>
    <a href="karoserija.php">Karoserija kategorija</a>

    <div class="row">

        <?php

        foreach ($dijelovi as $dio) {
            ?>
            <?php echo $dio['ime']; ?>
            <?php echo $dio['kategorija']; ?>
            <?php echo $dio['cijena']; ?>
            <?php echo $dio['slika']; ?>
            <?php
        }
        ?>
    </div>

<?php
include('footer.html');
?>