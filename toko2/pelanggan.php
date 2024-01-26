<form action="" method="post">
    pelanggan:
    <input type="text" name="namapelanggan" placeholder="nama pelanggan">
    <br>
    alamat:
    <input type="text" name="alamat" placeholder="harga barang">
    <br>
    telepon:
    <input type="number" name="telp" placeholder="telepon">
    <br>
    <input type="submit" name="simpan" value="simpan">
</form>


<?php
$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "dbff";
$koneksi = new mysqli($host, $user, $password, $db);

if (isset($_POST["simpan"])) {
    $namapelanggan = $_POST["namapelanggan"];
    $alamat = $_POST["alamat"];
    $telepon = $_POST["telp"];

    $ql = "INSERT INTO pelanggan (namapelanggan,alamat,telp) VALUES ('$namapelanggan','$alamat',$telp)";
    $hasil = mysqli_query($koneksi, $ql);
}


$ql = "SELECT * FROM pelanggan";
$hasil = mysqli_query($koneksi, $ql);


echo "<table border=2px>
<thead>
        <tr>
    <th>
        barang
    </th>
    <th>
        harga
    </th>
        </tr>
</thead>
<tbody>";
while ($row = mysqli_fetch_array($hasil)) {
    echo "<tr>";
    echo "<td>" . $row[1] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "</tr>";
}

echo "</tbody>
    </table>";
?>