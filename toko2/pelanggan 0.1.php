<?php
$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "dbff";
$koneksi = new mysqli($host, $user, $password, $db);

$id = 0;
$namapelanggan = "";
$alamat = "";
$telp = "0";

if (isset($_GET["ubah"])) {
    $id = $_GET["ubah"];
    $sql = "SELECT * FROM pelanggan WHERE id=" . $id;
    $hasil = mysqli_query($koneksi, $sql);
    if (mysqli_num_rows($hasil) > 0) {
        $row = mysqli_fetch_array($hasil);
        $id = $row[0];
        $namapelanggan = $row[1];
        $alamat = $row[2];
        $telp = $row[3];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form action="" method="post">
            pelanggan:
            <input type="text" name="namapelanggan" placeholder="nama pelanggan" value="<?php echo $namapelanggan ?>">
            <br>
            alamat:
            <input type="text" name="alamat" placeholder="alamat pelanggan" value="<?php echo $alamat ?>">
            <br>
            telepon:
            <input type="number" name="telp" placeholder="telepon" value="<?php echo $telp ?>">
            <br>
            <input type="submit" name="simpan" value="simpan">
            id:
            <br>
            <input type="hidden" name="id" value="<?php echo $id ?>">


        </form>
    </div>

</body>

</html>




<?php
$namapelanggan = $_POST["namapelanggan"] ?? null;
$alamat = $_POST["alamat"] ?? null;
$telepon = $_POST["telp"] ?? null;

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    if ($id == 0) {
        $sql = "INSERT INTO pelanggan (namapelanggan, alamat, telp)VALUES('$pelanggan','$alamat',$telp}";
        $hasil = mysqli_query($koneksi, $sql);
    } else {
        $sql = "UPDATE pelanggan SET namapelanggan='$pelanggan',alamat='$alamat',telp=$telp WHERE id=$id";
        $hasil = mysqli_query($koneksi, $sql);
        header("location:http://localhost/andrekios/pelanggan.php");
    }
}

if (isset($_GET["hapus"])) {
    $id = $_GET["hapus"];
    $sql = "DELETE FROM pelanggan WHERE id=" . $id;
    $hasil = mysqli_query($koneksi, $sql);
}


//pelanggan
$sql = "SELECT * FROM pelanggan";
$hasil = mysqli_query($koneksi, $sql);




echo "<table border=2px>
<thead>
        <tr>
    <th>
        nama pelanggan
    </th>
    <th>
        alamat
    </th>
    <th>
        telp
    </th>
    <th>
        hapus
    </th>
    <th>
        ubah
    </th>
        </tr>
</thead>
<tbody>";
while ($row = mysqli_fetch_array($hasil)) {
    echo "<tr>";
    echo "<td>" . $row[1] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "<td>" . "<a href = '?hapus=" . $row[0] . "'>hapus </a>" . "<td/>";
    echo "<td>" . "<a href = '?ubah=" . $row[0] . "'>ubah </a>" . "<td/>";
    echo "</tr>";
}

echo "</tbody>
    </table>";
?>