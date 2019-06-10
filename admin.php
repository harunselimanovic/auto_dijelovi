<?php
include('header.html');
include('konekcija.php');
$user = $_POST['user'];
$pass = $_POST['password'];

if(isset($_POST['dodaj'])) {
    $novi_dio = $_POST['auto_dio'];
    $kat = $_POST['kategorija'];
    $cijena = $_POST['cijena'];
    $slika = $_FILES['slika']['name'];
    $tempslike = $_FILES['slika']['tmp_name'];

    if(!empty($slika))
    {
        $lokacija = "slike/";
        move_uploaded_file($tempslike, $lokacija.$slika);
    }

    $dodaj_novi_dio = "INSERT into dijelovi(ime,cijena,kategorija,slika) values ('$novi_dio','$cijena','$kat','$slika')";
    $provjera = mysqli_query($konekcija, $dodaj_novi_dio);
}

$upit = "Select * from admin";
$podaci = mysqli_query($konekcija, $upit);

if(isset($_POST['azuriraj'])) {
    $novo_ime = $_POST['novo_ime'];
    $kategorija = $_POST['kategorija'];
    $cijena = $_POST['cijena'];
    $slika = $_POST['slika'];
    $azuriraj = "Update dijelovi set ime = '$novo_ime', cijena = '$cijena', kategorija = '$kategorija', slika = '$slika' where id=$id";
    $query = mysqli_query($konekcija,$azuriraj);
    if($query) {
        echo 'azurirano';
    }else {
        echo 'nije azurirano';
    }
}

if(isset($_POST['obrisi'])) {
    $id = $_POST['id'];
    $izbrisi = "Delete from dijelovi where id=$id";
    $query = mysqli_query($konekcija,$izbrisi);
    if($query) {
        echo 'izbrisano';
    }else {
        echo 'nije izbrisano';
    }
}

$postoji = false;
foreach ($podaci as $podatak) {
    if ($user == $podatak['username'] and $pass == $podatak['password']) {
        $postoji = true;
    }
}
if ($postoji && isset($_POST['prijava'])) {
?>
<div class="row">
Dobro dosli

    <ul class="lista-komandi">
        <li id="komanda1" class="komanda komanda-dodaj">
            <a href="#" onclick="myFunction1()">Dodaj</a>
            <div id="forma1" class="form-container">
            <form method="post" enctyp="multipart/form-data">
                
                Ime: <input type="text" name="auto_dio"/>
                
                Cijena: <input type="number" name="cijena"/>
                
                Kategorija: <input type="text" name="kategorija"/>
                
                <p class="unos-slike">Slika: <input type="file" name="slika"/></p>
                
                <input type="submit" class="unos-artikla" value="Dodaj" name="dodaj"/>
                
            </form>
        </div>
        </li>
        <li id="komanda2" class="komanda komanda-azuriraj"><a href="#" onclick="myFunction2()">Azuriraj</a>
        <div id="forma2" class="form-container">
        <?php
        $upit_azuriraj = "Select * from dijelovi";
        $dijelovi = mysqli_query($konekcija, $upit_azuriraj);

        foreach ($dijelovi as $dio) {
            ?>
            <form action="" method="post">
                <input type="text" value="<?php echo $dio['ime']; ?>" name="novo_ime">
                <input type="text" value="<?php echo $dio['kategorija']; ?>" name="kategorija">
                <input type="text" value="<?php echo $dio['cijena']; ?>" name="cijena">
                <input type="text" value="<?php echo $dio['slika']; ?>" name="slika">
                <input type="hidden" value="<?php echo $dio['id']; ?>" name="id">
                <input type="submit" value="Azuriraj" name="azuriraj"/>
            </form>
            <?php
        }
        ?>
        </div>
        </li>
        <li id="komanda3"  class="komanda komanda-obrisi"><a  onclick="myFunction3()" href="#">Obrisi</a>
        <div id="forma3" class="form-container">
            <?php
            $upit_azuriraj = "Select * from dijelovi";
            $dijelovi = mysqli_query($konekcija, $upit_azuriraj);

            foreach ($dijelovi as $dio) {
                ?>
                <form action="" method="post">
                    <span class="za-brisanje"><?php echo $dio['ime']; ?></span>
                    <span class="za-brisanje"><?php echo $dio['kategorija']; ?></span>
                    <span class="za-brisanje"><?php echo $dio['cijena']; ?></span>
                    <span class="za-brisanje"><?php echo $dio['slika']; ?></span>
                    <span class="za-brisanje"><?php echo $dio['id']; ?></span>
                    <input type="submit" value="Izbrisi" name="obrisi"/>
                </form>
                <?php
            }
            ?>
            </div>
        </li>
    </ul>
</div>
<?php
}else {
    if (isset($_POST['dodaj'])) {
        if (!$provjera) {
            echo "<h6>Nije dodano u bazu!</h6>";
        } else {
            echo "<h6>Uspješno dodan dio u bazu!</h6>";
        }
        echo "<a href=\"prijava.php\">Prijavi se ponovo</a>";
    } else {
        ?>
        <div class="row">
            <a href="prijava.php">Prijavi se ponovo</a>
        </div>
        <?php

    }
}
include('footer.html');
?>
