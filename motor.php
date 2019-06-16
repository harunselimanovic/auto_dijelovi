<?php
include('header.html');
include('konekcija.php');
$upit_azuriraj = "Select * from dijelovi where kategorija = 'Motor'";
$dijelovi = mysqli_query($konekcija, $upit_azuriraj);
?>
<a class="nav-link" href="kategorije.php">Sve kategorije</a>
<a class="nav-link" href="motor.php">Motor kategorija</a>
<a class="nav-link" href="karoserija.php">Karoserija kategorija</a>
<div class="row">
    <div class="kategorije">

    <div class="lista-artikala">
<?php

        foreach ($dijelovi as $dio) {
        ?>
        <div class="artikal">
            <div class="artikal-box">
                <div class="artikal-slika"><img src="slike/<?php echo $dio['slika']; ?>"></div>
                <div class="artikal-ime"><?php echo $dio['ime']; ?></div>
                <div class="artikal-kategorija"><?php echo $dio['kategorija']; ?></div>
                <div class="artikal-cijena"><?php echo $dio['cijena']; ?></div>
            </div>
        </div>
            <?php
        }
        ?>
        </div>
    </div>
    </div>

<?php
include('footer.html');
?>