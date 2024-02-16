<?php
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "ttg");

//baca nilai tinggi yang dikirim oleh nodeMCU
$tinggi = $_GET['tinggi'];

//simpan / update ke tabel tb_volume filed tinggi
mysqli_query($konek, "UPDATE tb_volume SET tinggi='$tinggi'");
?>