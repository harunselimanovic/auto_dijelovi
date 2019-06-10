<?php
include('header.html');
include('konekcija.php');
$user = $_POST['user'];
$pass = $_POST['password'];

$dodaj_novi_user = "INSERT into admin(username,password) values ('$user','$pass')";
$registracija = mysqli_query($konekcija, $dodaj_novi_user);

if(isset($_POST['registracija']) && $registracija) {
    echo 'Dodan novi user';
}else {
    echo 'Nije dodan novi user';
}
?>
<form method="post">
    <tr>
        <td>Korisničko ime:</td>
        <td><input type="text" name="user"/></td>
    </tr>
    <tr>
        <td>Šifra:</td>
        <td><input type="password" name="password"/></td>
    </tr>
    <tr>
        <td colspan="2" text-align="center"><input type="submit" value="Registruj se" name="registracija"/></td>
    </tr>
</form>
