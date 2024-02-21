<?php
    //koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "ttg");
//baca isi tempat sampah
$sql = mysqli_query($konek, "SELECT tinggi FROM tb_tinggi where id='1'");
$data = mysqli_fetch_array($sql);

$tinggi_max = 40; //tinggi dalam cm *tinggi tong sampah
$jari2 = 1; //jari2 tong sampah dalam meter
$phi = 3.14; // volume = phi * r^2 * tinggi (tinggi sampah)
// ukur tinggi sampah
$tinggi_sampah =($data['tinggi']-$tinggi_max) *-1+3;
//persentas tinggi sampah
$persentase_tinggi_sampah = ($tinggi_sampah/$tinggi_max)*100; //hasil persen
//hitung volume sampah
$volume = $phi * ($jari2 * $jari2) * ($tinggi_sampah/100) ; // satuan meter m3
?>

<div class="rectangle-11"></div>
        <p class="volume">Volume </p>
        <p class="sampah">Sampah</p>

<!-- pegangan -->
<div class="pegangan">
    <!-- pegangan2 -->

        <div class="pegangan2"></div>
        </div>
        <!-- penutup -->
        <div class="penutup"></div>
        <!-- body tempat sampah -->
        <div class="tempat-sampah">
            <div class="volume-sampah" style="width: 100%; height:<?php echo $persentase_tinggi_sampah; ?>%; color: white; text-align: center;">
        
            <?php

                echo "  " .($persentase_tinggi_sampah) . " %";

            ?>

        </div>
        </div>
        <p class=" tinggi-sampah ">
        <?php
                echo "  Tinggi Sampah : " .($tinggi_sampah) . " cm";
                

        ?>
        </p>