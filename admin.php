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

    <ul>
        <li>
            <a href="#">Dodaj</a>
            <form method="post" enctype="multipart/form-data">
                <tr>
                    <td>Ime:</td>
                    <td><input type="text" name="auto_dio"/></td>
                </tr>
                <tr>
                    <td>Cijena:</td>
                    <td><input type="number" name="cijena"/></td>
                </tr>
                <tr>
                    <td>Kategorija:</td>
                    <td><input type="text" name="kategorija"/></td>
                </tr>

                <tr>
                    <td>Slika:</td>
                    <td><input type="file" name="slika"/></td>
                </tr>

                <tr>
                    <td colspan="2" text-align="center"><input type="submit" value="Dodaj" name="dodaj"/></td>
                </tr>
            </form>
        </li>
        <li>Azuriraj
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
        </li>
        <li>Obrisi
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
                    <input type="submit" value="Izbrisi" name="obrisi"/>
                </form>
                <?php
            }
            ?>
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
